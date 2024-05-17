<?php
include_once("connect.php");
class clsXuLyFile extends connectDB
{
    public function xuLyLuuFile()
    {
       if ($this->kiemTraFile() == 1)
       {
        $result = -1;
        echo '<script language="javascript">
        window.location="./index.php?message='.$result.'";
          </script>';
       } else {
        $this->luuFile();
       }

    }

    private function kiemTraFile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file']))
        {
            $url = 'http://localhost:5000/predict';
            $tmpName = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];

            $curl = curl_init($url);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_POST, TRUE);

            $file = new CURLFile($tmpName, $fileType, $fileName);

            $postData = array('file' => $file);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

            $response = curl_exec($curl);

            if (curl_errno($curl)) 
            {
                echo 'Error: ' . curl_error($curl);
            }

            curl_close($curl);

            return json_decode($response)->result;
        }
    }

    public function luuFile()
    {
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
            // Lấy thông tin về tập tin
            $name = $_FILES["file"]["name"];
            $filename_without_extension = pathinfo($name, PATHINFO_FILENAME);
            $tmp_name = $_FILES["file"]["tmp_name"];
            $type = $_FILES["file"]["type"];
            $extension = explode(".", $name)[1];

            // Lấy thời gian upload
            $uploadTime = date("Y-m-d H:i:s");
            // Kiểm tra xem phiên đã được khởi động trước khi sử dụng biến $_SESSION
            if (isset($_SESSION["id"])) {
                $idaccount = $_SESSION["id"];
                $name = time() . "_" . $name;
                if ($this->upload_file($tmp_name, "upload", $name) == 1) {
                    $sql = "insert into uploadfile(id_account,tenfile,loaifile,uploadtime) values ('$idaccount','$filename_without_extension','$extension','$uploadTime')";
                    $result = $this->themxoasua($sql);
                    
                    if ($result != 1) {
                        $result = 0;
                    }
                    echo '<script language="javascript">
                    window.location="./index.php?message='.$result.'";
                      </script>';
                }
            } else {
                echo "Session không tồn tại.";
            }
        } else {
            echo "Có lỗi xảy ra khi tải lên tập tin.";
        }
    }

    public function upload_file($tmp_name, $folder, $name)
    {
        if ($tmp_name != "" && $folder != "" && $name != "") {
            $newname = $folder . "/" . $name;
            if (move_uploaded_file($tmp_name, $newname)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function themxoasua($sql)
    {
        $link = $this->connectDB();
        $kq = mysqli_query($link, $sql);
        if ($kq) {
            return 1;
        } else {
            return 0;
        }
    }
    public function load_ds_file($sql)
    {
        $link = $this->connectDB();
        $ketqua = mysqli_query($link, $sql);
        $i = mysqli_num_rows($ketqua);
        if ($i > 0) {
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
            $dem = 1;
            while ($row = mysqli_fetch_array($ketqua)) {
                $tenfile = $row["tenfile"];
                $loaifile = $row["loaifile"];
                $uploadtime = $row["uploadtime"];
                $ten = $row["ten"];
                echo '<tr>
					<td scope="row">' .
                    $dem .
                    '</td>
					<td>' .
                    $tenfile .
                    '</td>
					<td>' .
                    $loaifile .
                    '</td>
					<td>' .
                    $uploadtime .
                    '</td>
					<td>' .
                    $ten .
                    '</td>
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
        } else {
            echo " Không có dữ liệu";
        }
        mysqli_close($link);
    }
}
?>
