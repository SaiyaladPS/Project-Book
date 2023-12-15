<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
    include('../Connect_dbstock.php');
    $cate_id=$_POST["cate_id"];
    $cate_name=$_POST["cate_name"];
    $remark=$_POST["remark"];
    if($cate_name==""){
        echo"<script>alert('ກະລຸນາປ້ອນຊື່ປະເພດສິນຄ້າ')</script>";
    }else{
        $update=mysqli_query($connect,"update categories set cate_name='$cate_name',remark='$remark'
         where cate_id='$cate_id';");
            if($update){
            echo"
            <script>
            swal.fire({
                icon:'success',
                title:'ການບັນທຶກຂໍ້ມູນສຳເລັດ',
                confirmButtonText:'Ok',}).then(()=>{
                    window.location='select-categories.php';
                });
                </script>";
            }
    }
?>