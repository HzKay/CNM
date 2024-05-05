<?php 
include("class/clsdangky.php");
$p=new create();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng ký</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/singup.css">
</head>
<body>
  <div class="container">
     <div  class="form-singup p-5 mt-5">
      <h1 class="text-center h1">ĐĂNG KÝ</h1>
      <form id="form1" name="form1" method="post" action="">
          <div class="username">
            <label for="txtten">Họ và tên:</label>
            <input type="text"  placeholder="Họ và tên" id="txtten" name="txtten">
          </div>
        <div class="pass mt-2">
            <label for="txtMK">Mật khẩu:</label>
            <input type="password"  placeholder="Mật khẩu" id="txtMK" name="txtMK">
          </div>
        <div class="phone mt-2">
            <label for="txtsdt">Số điện thoại:</label>
            <input type="text" placeholder="Số điện thoại" id="txtsdt" name="txtsdt">
          </div>
        <div class="mail mt-2">
            <label for="txtemail">Email:</label>
            <input type="email"  placeholder="Email" id="txtemail" name="txtemail">
          </div>
          <input name="btndk" id="btndk" type="submit" class=" mt-4 btn btn-block btn-singup" value="Đăng ký">
      </form>
      <div class="form-group mt-3">
            <div class="text-center">
            <label> Nếu bạn đã có tài khoản?</label>
           <a href="./login.php">Đăng nhập</a>
            </div>
        </div>
      <div class="text-center text-danger" style="font-weight: bolid;">
     <?php 
	 switch(isset($_REQUEST['btndk']))
	 {
		 case'Đăng ký':
		 {
			 $ten=$_REQUEST['txtten'];
			 $pass=md5($_REQUEST['txtMK']);
			 $sdt=$_REQUEST['txtsdt'];
			 $email=$_REQUEST['txtemail'];
			 if($ten!="" && $pass!="" && $sdt!="" && $email!="")
			 {
         if($p->ktra($sdt,$email)==1)
         {
           echo 'Email hoặc số điện thoại đã được sử dụng. Vui lòng thử lại.';
         }
         else
         {
            $sql="insert into account(ten,password,sdt,email,phanquyen) values ('".$ten."','".$pass."','".$sdt."','".$email."',1)";
            if($p->themaccount($sql)==1)
              {
                echo '<script language="javascript">
                                  alert("Đăng ký thành công");
                                    </script>';
                    echo '<script language="javascript">
                              window.location="./login.php";
                                </script>';
              }
              else
              {
                echo ' Đăng ký không thành công ';
              } 
          }
			 }
			 else
			 {
				 echo ' Vui lòng nhập đầy đủ thông tin';
			 }
		 }
	 }
	 ?>
     </div>
     </div>
  </div>
</body>
</html>