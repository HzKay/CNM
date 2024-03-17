<?php 
include_once ("clsConnect.php");
class giohang extends connectDB
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
	public function chitietsp($sql)
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
				$soluong=$row['soLuong'];
				$hinh=$row['hinhAnh'];
				$tacgia=$row['tenTG'];
				$danhGia = $row['danhGia']*20;
				echo '
					<div class="product-essential">
		<form action="#" method="post" id="product_addtocart_form">
			<input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
				<div class="product-img-box col-sm-5 col-xs-12 bounceInRight animated">
			<div class="new-label new-top-left"> New </div>
			<div class="product-image">
				<div class="large-image"> <a href="./images/book/'.$hinh.'" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img alt="Thumbnail" src="./images/book/'.$hinh.'"> </a> </div>
				
			</div>
			<!-- end: more-images --> 
			</div>
			<div class="product-shop col-sm-7 col-xs-12 bounceInUp animated">
			<div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
			<div class="product-name">
				<h1>'.$tensp.'</h1>
			</div>
				<div class="short-description">Tác giả:'.$tacgia.' </div>
			<div class="ratings">
				<div class="rating-box">
				<div style="width:'.$danhGia.'%" class="rating"></div>
				</div>
				<p class="rating-links"> <a href="#">1 Đánh giá </a> <span class="separator">|</span> <a href="#">Thêm đánh giá</a> </p>
			</div>
			<p class="availability in-stock pull-right"><span>In Stock</span></p>
			<div class="price-block">
				<div class="price-box">
				
				<p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> '.$gia.'.000 đ </span> </p>
				</div>
			</div>
			<div class="add-to-box">
				<div class="add-to-cart">
				<label for="qty">Số lượng:</label>
				<div class="pull-left">
					<div class="custom pull-left">
					
					<button onClick="increase()";  class="increase items-count" type="button" id="btnsl" name="btnsl" ><i class="icon-plus">&nbsp;</i></button>
					<input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
					
					<button onClick="decrease()"; class="reduced items-count" type="button" id="btnsl" name="btnsl" ><i class="icon-minus">&nbsp;</i></button>
					</div>
				</div>
	
					<a href="./shopping_cart.php?layid='.$id.'"> <button class="button btn-cart" title="Add to Cart" type="submit" id="nut" name="nut" value="Add to Cart"><i class="icon-basket"></i> </button></a>
				
				</div>
				<div class="email-addto-box">
				</div>
			</div>
			</div>
			
		</form>
		</div>
		<div class="product-collateral col-sm-12 col-xs-12 bounceInUp animated">
		<div class="add_info">
			<ul id="product-detail-tab" class="nav nav-tabs product-tabs">
			<li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô tả sản phẩm </a> </li>
			
			<li> <a href="#reviews_tabs" data-toggle="tab">Đánh giá</a> </li>
			
			</ul>
			<div id="productTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="product_tabs_description">
				<div class="std">
				<p>'.$mota.'</p>
				
				</div>
			</div>
			<div class="tab-pane fade" id="product_tabs_tags">
				<div class="box-collateral box-tags">
				<div class="tags">
					<form id="addTagForm" action="#" method="get">
					<div class="form-add-tags">
						<label for="productTagName">Add Tags:</label>
						<div class="input-box">
						<input class="input-text" name="productTagName" id="productTagName" type="text">
						<button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span> </button>
						</div>
						
					</div>
					</form>
				</div>
				
				
				</div>
			</div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		
		$this->closeDB($link);
	}
	public function xuatsp($sql)
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
				$soluong=$row['soLuong'];
				$hinh=$row['hinhAnh'];
					echo ' <div class="item">
				<div class="item-inner">
				<div class="item-img">
					<div class="item-img-info"> <a class="product-image" title="'.$tensp.'" href="product_detail.php?layid='.$id.'"> <img alt="'.$tensp.'" src="./images/book/'.$hinh.'"></a>
					<div class="item-box-hover">
						<div class="box-inner">                                        
									<div class="actions">
									<div class="add_cart">
										<form method="POST">
										<a href="./shopping_cart.php?layid='.$id.'"> <button class="button btn-cart" type="submit" id="nut" name="nut" value="Thêm vào giỏ hàng"><span>Add to Cart</span></button></a>
										</form>
									</div>
									<div class="product-detail-bnt"><a href="quick_view.php?layid='.$id.'" class="button detail-bnt"><span>Quick View</span></a></div> 
										</div>
									</div>
							</div>
							</div>
						</div>
						<div class="item-info">
							<div class="info-inner">
							<div class="item-title"> <a title="'.$tensp.'" href="product_detail.php?layid='.$id.'">'.$tensp.'</a> </div>
							<div class="item-content">
								<div class="rating">
								<div class="ratings">
									<div class="rating-box">
									<div style="width:30%" class="rating"></div>
									</div>
									<p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
								</div>
								</div>
								<div class="item-price">
								<div class="price-box">
									
						<p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> '.$gia.'.000 đ </span> </p>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		$this->closeDB($link);
	}

	public function quick_view($sql)
	{
		$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id=$row['maSP'];
				$tensp=$row['tenSP'];
				$mota=$row['moTa'];
				$gia=$row['gia'];
				$soluong=$row['soLuong'];
				$hinh=$row['hinhAnh'];
				$tacgia=$row['tenTG'];
				echo ' <form action="#" method="post" id="product_addtocart_form">
			<input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
				<div class="product-img-box col-sm-5 col-xs-12 bounceInRight animated">
			<div class="new-label new-top-left"> New </div>
			<div class="product-image">
				<div class="large-image"> <a href="./images/book/'.$hinh.'" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="./images/book/'.$hinh.'" alt = "Thumbnail"> </a> </div>
				
			</div>
			
			</div>
			<div class="product-shop col-sm-7 col-xs-12 bounceInUp animated">
			<div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
			<div class="product-name">
				<h1>'.$tensp.'</h1>
			</div>
			<div class="short-description"> 
				'.$mota.'
			</div>
			<div class="ratings">
				<div class="rating-box">
				<div style="width:60%" class="rating"></div>
				</div>
				<p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
			</div>
			<p class="availability in-stock pull-right"><span>In Stock</span></p>
			<div class="price-block">
				<div class="price-box">
				
				<p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> '.$gia.'.000 đ </span> </p>
				</div>
			</div>
			<div class="add-to-box">
				<div class="add-to-cart">
				<label for="qty">Qty:</label>
				<div class="pull-left">
					<div class="custom pull-left">
					
					<button  onClick="increase()"; class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
					<input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
					
					<button  onClick="decrease()"; class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
					
					</div>
				</div>

					<button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="submit" id="nut" name="nut" value="Add to Cart"><span><i class="icon-basket"></i> Add to Cart</span></button>

				</div>
				
			</div>
			</div>
			</form>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		
		$this->closeDB($link);
	}
	public function load_DS_giohang($sql)
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
				$tongtien=$gia*$soluong;
				
				echo '<tr class="first odd">
					<td class="image"><a class="product-image" title="'.$tensp.'" href="product_detail.php?layid='.$id.'"><img width="75" alt="'.$tensp.'" src="./images/book/'.$hinh.'"></a></td>
					<td><h2 class="product-name"> <a href="product_detail.php?layid='.$id.'">'.$tensp.'</a> </h2></td>
					<td class="a-center hidden-table"><a title="Edit item parameters" class="edit-bnt" href="#"></a></td>
					<td class="a-center hidden-table"><span class="cart-price"> <span class="price">'.$gia.'.000 đ</span> </span></td>
					<td class="a-center movewishlist"><input maxlength="12" class="input-text qty" title="Qty" size="4" value="'.$soluong.'" name="cart[10522][qty]"></td>
					<td class="a-center movewishlist"><span class="cart-price"> <span class="price">'.$tongtien.'.000 đ</span> </span></td>
					<td class="a-center last"><a class="button remove-item" title="Remove item" href="delete_product.php?layid='.$id.'"><span><span>Remove item</span></span></a></td>
				</tr>';
			}
		}
		else
		{
			echo '<tr class="first odd">
			<td colspan="8">Không có sản phẩm</td>
			</tr>';
		}
		$this->closeDB($link);
	}
	public function thanhtien_giohang($sql)
	{
		
		$link=$this->connect();
		$kq=mysql_query($sql,$link);
		$i=mysql_num_rows($kq);
		$tongtien=0;

		if($i>0)
		{
			while($row=mysql_fetch_array($kq))
			{
				$mota=$row['moTa'];
				$gia=$row['gia'];
				$soluong=$row['soluong'];
				
				$thanhtien=$gia*$soluong;
				$tongtien+=$thanhtien;
				
			}
			
			echo '<td class="a-right"><strong><span class="price">'.$tongtien.'.000 đ</span></strong></td>
				';
		}
		else
		{
			echo '
					<td class="a-right"><strong><span class="price">0.000 đ</span></strong></td>
				';
			$tongtien = 0;
		}
		$this->closeDB($link);
		return $tongtien;
	}

	public function addtocart()
	{
		$link=$this->connect();
			return $link;
		
		
	}
	public function output_SP_checkout($sql)
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
				$hinh=$row['hinhAnh'];
				echo '<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
			<div class="item-inner">
				<div class="item-img">
				<div class="item-img-info"> <a href="product_detail.php?layid='.$id.'" title="'.$tensp.'" class="product-image"> <img src="./images/book/'.$hinh.'" alt="'.$tensp.'"> </a>
					<div class="new-label new-top-left">New</div>
					<div class="item-box-hover">
					<div class="box-inner">
						<div class="actions">
						<div class="add_cart">
							<a href="#?layid='.$id.'"><button class="button btn-cart" type="submit" id="nut" name="nut" value="Add to Cart"><span>Add to Cart</span></button></a>
						</div>
						<div class="product-detail-bnt"><a href="quick_view.php?layid='.$id.'" class="button detail-bnt"><span>Quick View</span></a></div>
						
					</div>
					</div>
				</div>
				</div>
				<div class="item-info">
				<div class="info-inner">
					<div class="item-title"> <a href="product_detail.php?layid='.$id.'" title="'.$tensp.'"> '.$tensp.' </a> </div>
					<div class="item-content">
					<div class="rating">
						<div class="ratings">
						<div class="rating-box">
							<div class="rating" style="width:80%"></div>
						</div>
						<p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
						</div>
					</div>
					<div class="item-price">
						<div class="price-box"> <span class="regular-price" id="product-price-1"> <span class="price">'.$gia.'.000 đ</span> </span> </div>
					</div>
					</div>
				</div>
				</div>
			</div>
			</li>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		$this->closeDB($link);
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
	public function subtotal($sql,$maKH)
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
			return  $thanhtien;
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
					';
			}
			echo'</ul>
				<div class="actions">
					<button class="btn-checkout" title="Checkout" type="button"><a href="shopping_cart.php"><span style="color:white;">Thanh toán</span></a></button>
				</div>';
			
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		$this->closeDB($link);
		}
	}
	public function diachiGH($sql)
	{
		$link=$this->connect();
		$kq=mysql_query($sql,$link);
		$i=mysql_num_rows($kq);
		if($i>0)
		{
			while($user=mysql_fetch_array($kq))
			{
				$id=$user['maTK'];
				$hoTen = $user['ho'] . ' ' . $user['ten'];
				$sdt = $user['sdt'];
				$quocgia=$user['quocgia'];
				$tp=$user['tinh_thanhpho'];
				$quan=$user['quan_huyen'];
				$phuong=$user['phuong_xa'];
				$diachi=$user['diaChi'];
			}
		}

		echo'<div class="col-sm-4">
			<div class="shipping">
			<h3>Địa chỉ giao hàng</h3>
			<div class="shipping-form">
				<!-- <form id="shipping-zip-form" method="post" action="./class/clsgiohang.php" enctype="multipart/form-data">-->
				<ul class="form-list">
				<li>
					<label for="postcode">Họ tên người nhận</label>
					<div class="input-box">
						<input type="text" name="txtten" value="'. $hoTen .'" id="txtten" class="input-text validate-postcode" placeholder="Nhập họ tên người nhận" >
					</div>
					</li>
					<li>
					<label for="postcode">Số điện thoại</label>
					<div class="input-box">
						<input type="text" name="sdt" id="sdt" class="input-text validate-postcode" value="'.$sdt.'" placeholder="Ví dụ:038712xxxx(10 ký tự số)">
					</div>
					</li>
					<li>
					<label class="required" for="country"><em>*</em>Quốc gia</label>
					<div class="input-box">
						<select title="Country" class="validate-select" id="country" name="country_id">
							<option value="'.$quocgia.'" selected="selected">'.$quocgia.'</option>
							<option value="Anh" >Anh</option>
						</select>
					</div>
					</li>
					<li>
					<label for="region_id">Tỉnh/Thành phố</label>
					<div class="input-box">
						<select title="State/Province" name="region_id" id="region_id">
						<option value="">Vui lòng chọn tỉnh , thành phố</option>
						<option value="'.$tp.'" title="Alabama" selected="selected">'.$tp.'</option>
						<option value="Thành phố Hồ Chí Minh" title="Alaska">Thành phố Hồ Chí Minh</option>
						<option value="Cần Thơ" title="American Samoa">Cần Thơ</option>
						<option value="Tiền Giang" title="Arizona">Tiền Giang</option>
						<option value="Hà Giang" title="Arkansas">Hà Giang</option>
						<option value="Bạc liêu" title="Armed Forces Africa">Bạc liêu</option>
						<option value="Long An" title="Armed Forces Americas">Long An</option>
						
						</select>
						<input type="text" style="display:none;" class="input-text" title="State/Province" name="region" id="region">
					</div>
					</li>
					<li>
					<label for="postcode">Quận/Huyện</label>
					<div class="input-box">
						<input type="text" name="huyen" id="huyen" class="input-text validate-postcode" value="'.$quan.'">
					</div>
					</li>
					<li>
					<label for="postcode">Phường/Xã</label>
					<div class="input-box">
						<input type="text" name="phuong" id="phuong" class="input-text validate-postcode" value="'.$phuong.'">
					</div>
					</li>
					<li>
					<label for="postcode">Địa chỉ</label>
					<div class="input-box">
						<input type="text" name="DC" id="DC" class="input-text validate-postcode"  value="'.$diachi.'">
					</div>
					</li>
				</ul>
				<!--buttons-set11-->
			<!--  </form>-->
			</div>
			</div>
		</div>';
		
		
	}
	public function ship($sql)
	{
		$link=$this->connect();
		$kq=mysql_query($sql,$link);
		$row=mysql_fetch_array($kq);
		$tp=$row['tinh_thanhpho'];
		if($tp=='Thành phố Hồ Chí Minh')
		{
			$ship=0;
		}
		else
		{
			$ship=30;
		}
		return $ship;
	}
	public function ship_giohang($sql)
	{
		$link=$this->connect();
		$kq=mysql_query($sql,$link);
		$row=mysql_fetch_array($kq);
		$tp=$row['tinh_thanhpho'];
		if($tp=='Thành phố Hồ Chí Minh')
		{
			$ship=0;
		}
		else
		{
			$ship=30;
		}
		echo '
				
					<td class="a-right"><strong><span class="price">'.$ship.'.000 đ</span></strong></td>
				';
	}
		
	public function showComment($sql)
	{
		$conn=$this->connect();
		$result =mysql_query($sql,$conn);
		$row=mysql_num_rows($result);

		if($row > 0)
		{
			echo '<div class="box visible"><ul>';
			while($comment = mysql_fetch_array($result))
			{
				$rate = '';
				if($comment['danhGia'] >= 5)
				{
					$rate = 'Xuất sắc';
				}
				else if ($comment['danhGia'] >= 4)
				{
					$rate = 'Tuyệt vời';
				}
				else if ($comment['danhGia'] >= 2)
				{
					$rate = 'Bình thường';
				}
				else
				{
					$rate = 'Tệ';
				}

				$date = new DateTime($comment['thoiGianBL']);
				$formattedDate = $date->format('d/m/Y');
				$hoTen = $comment['ho'] . ' ' . $comment['ten']; 
				$mucDG = $comment['danhGia'] * 20;
				
				echo 
				"
				<li>
					<table class='ratings-table'>
					
					<tbody>
						<tr>
						<td>
						Chất lượng<div class='rating-box'>
							<div class='rating' style='width:{$mucDG}%;'></div>
							</div></td>
						</tr>
					</tbody>
					</table>
					<div class='review'>
					<h6><a href='#/catalog/product/view/id/59/'>{$rate}</a></h6>
					<small>Đánh giá bởi <span>{$hoTen}</span> vào {$formattedDate} </small>
					<div class='review-txt'> {$comment['noiDung']} </div>
					</div>
				</li>";
					
			}
			echo "</ul>";
		}
		else
		{
			echo "<div>Chưa có bình luận về sản phẩm!</div>";
		}

		$this->closeDB($conn);
	}

	public function addComment($maSP, $maKH, $danhGia, $sao)
	{
		$link=$this->connect();
		$sql1 = "SELECT * FROM donHang h left join chiTietDH c on h.maDH = c.maDonHang WHERE h.maTaiKhoan = {$maKH} ";
		$sql2 = "SELECT * FROM binhLuan WHERE maTK = {$maKH} AND maSanPham = {$maSP} ";
		$kq1=mysql_query($sql1,$link);
		$kq2=mysql_query($sql2,$link);
		$row1=mysql_num_rows($kq1);
		$row2=mysql_num_rows($kq2);
		$thoiGian = date('Y-m-d H:i:s');

		if($row1>0 && $row2 == 0)
		{
			if($this->themsuaxoa("INSERT INTO binhLuan  (`noiDung`, `maSanPham`, `maTK`, `thoiGianBL`, `danhGia`)
			 values (N'{$danhGia}', {$maSP}, {$maKH}, '{$thoiGian}', {$sao})") == 1)
			{
				echo "<script> alert('Đăng bình luận thành công')</script>";
			}
			else
			{
				echo "<script> alert('Lỗi không đăng được bình luận!')</script>";
			}
		}
		else
		{
			echo "<script> alert('Bạn không được bình luận!')</script>";
		}
	}
}
?>