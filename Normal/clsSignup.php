<?php
	class signin
	{
		private $db_host = "82.180.152.153";
        private $db_user = "u420857906_admin";
        private $db_pass = "xinchaoNha@132$";
        private $db_name = "u420857906_PTUDW";

        public function connect()
        {
            $conn = mysql_connect($this->db_host, $this->db_user, $this->db_pass);

            if(!$conn)
			{
				echo 'Lỗi, không thể kết nối với database!';
				exit();
			}
			else
			{
				mysql_select_db($this->db_name);
                mysql_query('SET NAMES UTF8');
				return $conn;
			}
        }
		
		public function closeDB($conn)
		{
			mysql_close($conn);	
		}
		
		public function mysignup($user, $pass)
		{
			$conn = $this->connect();
			$pass = SHA1($pass);
			if($user != '' && $pass != '')
			{
				$sql = "SELECT maTK, tenTK, matKhau, ten, phanQuyen FROM taiKhoan WHERE tenTK = '$user' AND matKhau = '$pass' LIMIT 1";
				$result = mysql_query($sql, $conn);
				$row = mysql_num_rows($result);
				
				if($row == 1)
				{
					session_start();
					while($account = mysql_fetch_array($result))
					{
						$_SESSION["id"] = $account["maTK"];	
						$_SESSION["user"] = $account["tenTK"];	
						$_SESSION["pass"] = $account["matKhau"];	
						$_SESSION["ten"] = $account["ten"];	
						$_SESSION["quyen"] = $account["phanQuyen"];
						
					}
					echo "<script> window.location.replace('index.php')</script>";
				}
				else
				{
					echo "<script> alert('Thông tin chưa đúng')</script>";
				}		
			}
			else
			{
				echo "<script> alert('Không được để trống!')</script>";	
			}
			$this->closeDB($conn);		
		}

		public function themTK($sql)
        {
            $conn = $this->connect();
			
			$result = mysql_query($sql, $conn);
			if($result)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			
			$this->closeDB($conn);
        }
		public function laygiatri($sql,$maKH)
		{
			
			 if($maKH<0)
			 {
				return 0;
			 }
			 else
			 {
				  $link=$this->connect();
				 $ketqua=mysql_query($sql,$link);
				 $i=mysql_num_rows($ketqua);
				 $giatri="";
				 if($i>0)
				 {
					
				 while($row=mysql_fetch_array($ketqua))
					 {
						
						 $giatri=$row[0];
						 
					 }
					 return $giatri;
				 }
			 }
		}
		public function thanhtien($sql,$maKH)
		{
			if($maKH<0)
			{
				return 0;
			}
			else
			{
			$link=$this->connect();
			$kq=mysql_query($sql,$link);
			$i=mysql_num_rows($kq);
			if($i>0)
			{
				$thanhtien=0;
				while($row=mysql_fetch_array($kq))
				{
					
					$id=$row['maSP'];
					$tensp=$row['tenSP'];
					$mota=$row['moTa'];
					$gia=$row['gia'];
					$soluong=$row['soluong'];
					$hinh=$row['hinhAnh'];
					$tongtien=$gia*$soluong;
					$thanhtien+=$tongtien;
					
				}
				echo  $thanhtien;
			}
			else
			{
				echo 'Không có dữ liệu';
			}
			$this->closeDB($link);
			}
		}
		public function ouput_checkout($sql,$maKH)
		{
			if($maKH<0)
			{
				echo 'Chưa có sản phẩm nào';
				return 0;
			}
			else
			{
			$link=$this->connect();
			$kq=mysql_query($sql,$link);
			$i=mysql_num_rows($kq);
			if($i>0)
			{
				
				while($row=mysql_fetch_array($kq))
				{
					
					$id=$row['maSP'];
					$tensp=$row['tenSP'];
					$mota=$row['moTa'];
					$gia=$row['gia'];
					$soluong=$row['soluong'];
					$hinh=$row['hinhAnh'];
					
					echo '<li class="item first">
                        <div class="item-inner"><a class="product-image" title="'.$tensp.'" href="./shopping_cart.php"><img alt="'.$tensp.'" src="./images/book/'.$hinh.'"></a>
                          <div class="product-details">
                            <div class="access"><a class="btn-remove1" title="Remove This Item" href="?layid='.$id.'">Remove</a> <a class="btn-edit" title="Edit item" href="./shopping_cart.php"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                            <!--access--> <strong>'.$soluong.'</strong> x <span class="price">'.$gia.'.000 đ</span>
                            <p class="product-name"><a href="product_detail.php?layid='.$id.'">'.$tensp.'</a></p>
                          </div>
                        </div>
                      </li>
					  </ul>
                    <div class="actions">
                      <button class="btn-checkout" title="Checkout" type="button"><a href="shopping_cart.php"><span style="color:white;">Thanh toán</span></a></button>
                    </div>';
				}
				
			}
			else
			{
				echo 'Không có dữ liệu';
			}
			$this->closeDB($link);
			}
		}
	}
?>