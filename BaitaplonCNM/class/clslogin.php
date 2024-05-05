<?php
class dangnhap
{
	public function connectDB()
	{
		$con=mysqli_connect("localhost","congnghemoi","123456","baitaploncnm");
		if(!$con)
		{
			echo 'Không kết nối với CSDL';
			exit();
			
		}
		else
		{
			mysqli_query($con,"SET NAMES UTF8");
			return $con;
		}
	}
	public function login($ten,$pass)
	{
		$pass=md5($pass);
		$sql="select id,ten,password,phanquyen from account where ten='$ten' and password='$pass' limit 1";
		$link=$this->connectDB();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i==1)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
			
				$id=$row['id'];
				$ten=$row['ten'];
				$pass=$row['password'];
				$phanquyen=$row['phanquyen'];
				session_start();
				$_SESSION['id']=$id;
				$_SESSION['ten']=$ten;
				$_SESSION['password']=$pass;
				$_SESSION['phanquyen']=$phanquyen;
				header('location:./'); 
			}
		}
		 else
		 {
			 echo 'Tên đăng nhập hoặc mật khẩu không đúng !';
		 }
	}
	 public function confirmlogin($id,$ten,$pass,$phanquyen)
	 {
		 $sql="select id from account where id='$id' and ten='$ten' and password='$pass' and phanquyen='$phanquyen' limit 1";
		 $link=$this->connectDB();
		 $ketqua=mysqli_query($link,$sql);
		 $i=mysqli_num_rows($ketqua);
		 if($i!=1)
		 {
			 header('location:./login.php');
		 }
	}
	public function logout() 
		{
			session_start();
			session_destroy();
			echo "<script>window.location.replace('./login.php')</script>";
			exit();
		}
	public function upload_file($tmp_name,$folder,$name)
	{
		if($tmp_name!="" && $folder!="" && $name!="")
		{
			$newname=$folder.'/'.$name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
	public function themxoasua($sql)
	{
		$link=$this->connectDB();
        $kq=mysqli_query($link,$sql);
		if($kq)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function load_ds_file($sql)
	{
		$link=$this->connectDB();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i>0)
		{
				echo '<table class="table table-hover">
				<thead class="thead-light">
				<tr>
					<th  scope="col">ID</th>
					<th  scope="col">Name</th>
					<th  scope="col">Type</th>
					<th  scope="col">Upload time</th>
					<th  scope="col">Author</th>
					<th  scope="col"></th>
					</tr>
					</thead>
				<tbody>';
				$dem=1;
				while($row=mysqli_fetch_array($ketqua))
				{
					$tenfile=$row['tenfile'];
					$loaifile=$row['loaifile'];
					$uploadtime=$row['uploadtime'];
					$ten=$row['ten'];
					echo '<tr>
					<td scope="row">'.$dem.'</td>
					<td>'.$tenfile.'</td>
					<td>'.$loaifile.'</td>
					<td>'.$uploadtime.'</td>
					<td>'.$ten.'</td>
					<td>
					<div class="dropdown dropleft">
						<button type="button" class="btn" data-toggle="dropdown">
						 <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						</button>
						<div class="dropdown-menu modal-menu">
						  <a class="dropdown-item" href="#"><i class="fa fa-eye action" aria-hidden="true"></i>Xem</a>
						  <a class="dropdown-item" href="#"><i class="fa fa-download action" aria-hidden="true"></i>Tải xuống</a>
						  <a class="dropdown-item" href="#"><i class="fa fa-trash action" aria-hidden="true"></i>Xóa</a>
						</div>
					</div>
					</td>
				  </tr>';

                  $dem++;
				}
				echo '     
				</tbody>
				</table>';

		}
		else
		{
			echo ' Không có dữ liệu';
		}
		mysqli_close($link);
	}
		
 }
?>