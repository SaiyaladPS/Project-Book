<?php
include('../Connect_dbstock.php');
    $vill_id=$_GET['vill_id'];
        $update=mysqli_query($connect,"delete from villages where vill_id='$vill_id';");
        if($update){
            echo"<script>location='select_villages.php';</script>";}
            else{
                echo "<script>alert('ລົບຂໍ້ມູນລົ້ມເລວ');location='select_vilages.php'</script>";
            }
    ?>