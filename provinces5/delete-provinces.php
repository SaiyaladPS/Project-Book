<?php
include('../Connect_dbstock.php');
    $pro_id=$_GET['pro_id'];
        $update=mysqli_query($connect,"delete from provinces where pro_id='$pro_id';");
        if($update){
            echo"<script>location='select_provinces.php';</script>";}
            else{
                echo "<script>alert('ລົບຂໍ້ມູນລົ້ມເລວ');location='select_provinces.php'</script>";
            }
    ?>