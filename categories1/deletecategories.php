<?php
include('../Connect_dbstock.php');
    $cate_id=$_GET['cate_id'];
        $update=mysqli_query($connect,"delete from categories where cate_id='$cate_id';");
        if($update){
            echo"<script>location='select-categories.php';</script>";}
            else{
                echo "<script>alert('ລົບຂໍ້ມູນລົ້ມເລວ');location='select-categories.php'</script>";
            }
    ?>