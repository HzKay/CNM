<?php
    class connectDB {
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
    }
?>