<?php
include('../Connect_dbstock.php');
    $dis_id=$_GET['dis_id'];
        $update=mysqli_query($connect,"delete from districts where dis_id='$dis_id';");
        if($update){
            echo"<script>location='select_districts.php';</script>";}
            else{
                echo "<script>alert('ລົບຂໍ້ມູນລົ້ມເລວ');location='select_districts.php'</script>";
            }
    ?>