<?php
include_once ("clsConnect.php");
class myOrder extends connectDB
{
	public function themsuaxoa($sql)
	{
		$link=$this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
		}
		$this->closeDB($link);
	}	

	public function  showOrdersAdmin($order_id=0)
        {
            $conn = $this->connect();
			if($order_id > 0)
			{
				$sql = "SELECT * FROM donHang hd LEFT JOIN chiTietDH c ON hd.maDH = c.maDonHang WHERE hd.maDH = {$order_id}";
			}
			else
			{
				$sql = "SELECT * FROM donHang hd LEFT JOIN chiTietDH c ON hd.maDH = c.maDonHang";
			}
			
			$result = mysql_query($sql,$conn);
			
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}
			
			$rows = mysql_num_rows($result);
						
			if ($rows > 0) {
				echo "
				<table data-toggle='table' data-url=''  data-show-refresh='true' data-show-toggle='true' data-show-columns='true' data-search='true' data-pagination='true' data-sort-name='name' data-sort-order='desc'>
				<thead>
					<tr>
					<th data-field='state' data-checkbox='true' >Item ID</th>
					<th data-field='maDH'>Mã đơn hàng</th>
					<th data-field='maTaiKhoan' data-sortable='true'>Khách hàng</th>
					<th data-field='trangThai'>Trạng thái</th>
					<th data-field='tongTien' data-sortable='true'>Tổng tiền</th>
					<th data-field='thanhToan' data-sortable='true'>Thanh toán</th>
					<th data-field='thoiGianMua' data-sortable='true'>Thời gian mua</th>
					<th data-field='thoiGianHuy' data-sortable='true'>Thời gian huỷ</th>
					<th data-field='quocgia' data-sortable='true'>Quốc gia</th>
					<th data-field='thanhpho' data-sortable='true'>Thành phố</th>
					<th data-field='quan' data-sortable='true'>Quận</th>
					<th data-field='phuong' data-sortable='true'>Phường</th>
					<th data-field='diachigiaohang'>Địa chỉ</th>
					</tr>
				</thead>
				<tbody>";
			  while($order = mysql_fetch_array($result)) 
			  {
				$subTotal = 0;
				if($order['thanhPho'] == 'TP Hồ Chí Minh')
				{
					$subTotal = $order['tongTien'] + 30;
				}
				else
				{
					$subTotal = $order['tongTien'];
				}
				echo "<tr>
					<td></td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['maDH']}</a>
					</td>
					<td>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['maTaiKhoan']}</a></td>
					<td>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>
							{$order['trangThai']}
						</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$subTotal}.000</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['thanhToan']}</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['thoiGianMua']}</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['thoiGianHuy']}</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['quocgia']}</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['thanhpho']}</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['quan']}</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['phuong']}</a>
					</td>
					<td class='text-center'>
						<a href='updateOrder.php?order_id={$order['maDH']}' class='text-color'>{$order['diachigiaohang']}</a>
					</td>
				</tr>";
			  }
			 	echo "</tbody>
  				</table>";
			} else {
			  echo "Không có dữ liệu!";
			}
			
			$this->closeDB($conn);
        }
}
?>