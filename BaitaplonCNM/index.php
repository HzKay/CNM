<?php 
include_once("class/clslogin.php");
$p=new dangnhap();
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['ten']) && isset($_SESSION['password']) && isset($_SESSION['phanquyen']))
{
    if($_SESSION['phanquyen']!=1)
    {
      echo '<script language="javascript">
					alert("Bạn cần tạo tài khoản để sử dụng trang này!!");
						</script>';
		echo '<script language="javascript">
				window.location="./singup.php";
					</script>';	
    }
    else
    {
      $p->confirmlogin($_SESSION['id'],$_SESSION['ten'],$_SESSION['password'],$_SESSION['phanquyen']);
      include_once("class/clsXuLyFile.php");
      $xuLyFile = new clsXuLyFile();
    }
}
else
{
	header('location:./login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Trang chủ</title>
<link rel="stylesheet" type="text/css" href="Font awesome/css/fontawesome.css">
<link rel="stylesheet" type="text/css" href="Font awesome/css/brands.css">
<link rel="stylesheet" type="text/css" href="Font awesome/css/regular.css">
<link rel="stylesheet" type="text/css" href="Font awesome/css/solid.css">
<link rel="stylesheet" type="text/css" href="Font awesome/css/svg-with-js.css">
<link rel="stylesheet" type="text/css" href="Font awesome/css/v4-shims.css">
<link rel="stylesheet" type="text/css" href="Font awesome/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script>
  $(document).ready(function() {
    $('#file').change(function() {
        var filename = $(this).val().split('\\').pop(); // Lấy tên file từ đường dẫn tập tin
        $('#tenfile').val(filename); // Hiển thị tên file trong input
        $('#submitBtn').show();
    });
});
</script>
</head>
<body>
<div  style="width:100%">
	<div class="header">
       <div class="row">
          <div class="col-sm-2 col-xs-12"> 
            <!-- Header Logo -->
            <div class=" title"><a title="logo" href="demo.php"><h4 class="h4">UPLOAD</h4></a></div>
            <!-- End Header Logo --> 
          </div>
          <div class="col-lg-7 col-xs-12 m-2" >
           <div class="search-box pull-right">
              <form action="" method="POST" id="search_mini_form" name="Categories">
                <input type="text" placeholder="Search entire store here..." maxlength="70" name="search" id="search">
                <button type="button" class="search-btn-bg" style="float:right; padding:4px;"><span class="glyphicon glyphicon-search"><i class="fa fa-search" aria-hidden="true"></i></span></button>
              </form>
            </div>
          </div>
          <div class="col-sm-2 col-xs-12">
              <div class="dropdown">
                  <button type="button" class="btn user" data-toggle="dropdown">
                  <span class="float-right glyphicon glyphicon-search "><i class="fas fa-user"></i></span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <form action="" method="post">
                       <input type="submit" name="btn" class="btn btn-block btn-logout" value="Đăng xuất">
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <!--end header-->
    <nav>
    <div  style="width:100%">
       <div class="row">
           <div class="col-lg-2 nav-inner menu mt-4 pl-5">
             <ul id="nav" class="nav nav-pills flex-column" role="tablist"> 
               <li class="nav-item">
                   <a href="#dsfile" class="nav-link active" data-toggle="pill"><i class="fa fa-list icon"></i> Danh sách file</a>
               </li>
                 <li class="nav-item">
                     <a href="#tailen" class="nav-link" data-toggle="pill"><i class="fa fa-upload icon" aria-hidden="true"></i>Upload file</a>
                 </li>
             </ul>
           </div>
           <div class="col-lg-10 content-upload">
              <div class="tab-content">
                  <div id="tailen" class="container tab-pane fade upload-file">
                      <h4 class="h4">UPLOAD FILE</h4>
                      <div class="text-center form-upload">
                        <i class="fa fa-cloud-upload icon-upload"></i><br>
                        <div class="frm-upload">
                          <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" class="file-upload" id="file" name="file">
                            <label for="file" class="btn btn-upload">Select a file</label><br>
                            <input type="text" name="tenfile" id="tenfile" readonly style="border: 1px solid white; width: auto;">
                            <br>
                            <input type="submit" class="btn btn-submit mt-2" value="UPLOAD" style="display: none;" id="submitBtn" name="btn">
                          </form>
                        </div>
                      </div>
                  </div>
                  <div id="dsfile" class="container tab-pane ds-file active">
                      <h4 class="h4">DANH SÁCH FILE</h4>
                      <div class="table-file">
                        <form name="form1" method="post" action="" >
                        <?php
                          $xuLyFile->load_ds_file("select * from account a join uploadfile u on a.id=u.id_account where u.id_account = {$_SESSION['id']}");
                        ?>
                        </form>
                      </div>
                  </div>
              </div>
           </div>
       </div>
    </div>
  </nav>
</div>
<div class="modal fade" id="resultModal" role="dialog" aria-label="resultModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="icon-status mt-2 p-5">
          <?php
            if($_REQUEST['message'] == 1)
            {
              echo '<i class="far fa-check-circle text-success mb-3"></i></br>';
              echo '<h3 class="text-success">Upload file thành công<h3>';
            } elseif ($_REQUEST['message'] == 0)
            {
              echo '<i class="far fa-times-circle text-danger mb-3"></i></br>';
              echo '<h3 class="text-danger">Upload file thất bại</h3>';
            } elseif ($_REQUEST['message'] == -1)
            {
              echo '<i class="far fa-times-circle text-danger mb-3"></i></br>';
              echo '<h3 class="text-danger">Upload file thất bại! </br>File của bạn có thể chứa webshell</h3>';
            }
          ?>
        </div>
        <input type="button" class="btn btn-accept mb-3" data-dismiss="modal" value="Okay">
      </div>
    </div>
  </div>
</div>
<?php
switch(isset($_REQUEST['btn']))
{
  case 'UPLOAD FILE':
  {
    $xuLyFile->xuLyLuuFile();
    break;
  }
	case 'Đăng xuất':
	{
	  $p->logout();
    break;	
	}

}

if (isset($_REQUEST['message'])) {
  echo "
      <script>
      $(document).ready(function() {
        $('#resultModal').modal('show')
      })
    </script>
  ";
}
?>
</body>
</html>