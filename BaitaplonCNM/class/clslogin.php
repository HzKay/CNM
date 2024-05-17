<?php
require_once ("connect.php");
class dangnhap extends connectDB 
{
	public function login($ten,$pass)
	{
		$pass=md5($pass);
		$sql="select id,ten,password,phanquyen from account where ten='$ten' and password='$pass' limit 1";
		$link= $this->connectDB();
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
			session_unset();
			session_destroy();
			echo "<script>window.location.replace('./login.php')</script>";
		}
	
 }
?>