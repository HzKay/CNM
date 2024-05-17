<?php
include_once("connect.php");
class create extends connectDB
{
    public function themaccount($sql)
    {
        $link = $this->connectDB();
        if (mysqli_query($link, $sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function ktra($sdt, $email)
    {
        $link = $this->connectDB();
        $sql = "select * from account where sdt='$sdt' or email='$email'";
        $ketqua = mysqli_query($link, $sql);
        $i = mysqli_num_rows($ketqua);
        if ($i > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
?>
