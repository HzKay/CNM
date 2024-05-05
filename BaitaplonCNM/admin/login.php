<?php 
include("../class/clslogin.php");
$p=new dangnhap();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href=",./Font awesome/css/fontawesome.css">
<link rel="stylesheet" href="../Font awesome/css/brands.css">
<link rel="stylesheet" type="text/css" href="../Font awesome/css/regular.css">
<link rel="stylesheet" href="../Font awesome/css/solid.css">
<link rel="stylesheet" type="text/css" href="../Font awesome/css/svg-with-js.css">
<link rel="stylesheet" type="text/css" href="../Font awesome/css/v4-shims.css">
<link rel="stylesheet" href="../Font awesome/css/all.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/login.css"/>
</head>

<body>
<div class="container">
	<div class="p-5 form-login mt-5">
     <b><h1 class="text-center h1">ĐĂNG NHẬP</h1></b>
     <form class="form mt-3" method="post">
        <div class=" frm-top user">
            <label for="txtten" class="label">Username</label><br>
            <input type="text" name="txtten" id="txtten" placeholder="Nhập tên đăng nhập" >
            <span class="text-danger" id="tbten"></span>
        </div>
        <div class=" frm-top pass mt-2">
            <label for="txtpass" class="label">Mật khẩu</label><br>
            <div class="input-group">
                <input type="password" name="txtpass" id="txtpass" placeholder="Nhập mật khẩu">
            </div>
            <span class="text-danger span-MK" id="tbMK"></span>
        </div>
        <div class="form-group mt-3">
            <input type="submit" class="btn  btn-block btn-login" id="txtDN" name="txtDN" value="Đăng nhập"><br>
            <div class="text-center">
            <label> Nếu bạn chưa có tài khoản đăng nhập?</label>
           <a href="./singup.php">Đăng ký</a>
            </div>
        </div>
     </form>
     <div class="text-center text-danger" style="font-weight: bold;">
<?php 
switch(isset($_REQUEST['txtDN']))
{
	case 'Đăng nhập':
	{
		$ten=$_REQUEST['txtten'];
		$pass=$_REQUEST['txtpass'];
		if($ten!="" && $pass!="")
		{
			$p->login($ten,$pass);
            
			
		}
		else
		{
			echo 'Vui lòng nhập đầy đủ thông tin';
		}
		
	}
}
?>
</div>
    </div>
</div>

</body>
</html>