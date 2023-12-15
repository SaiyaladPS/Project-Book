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
session_start(); //1
    include('../Connect_dbstock.php');
    $cate_name=$_POST["cate_name"];
    $remark=$_POST["remark"];
    $user_id=$_SESSION["user_id"]; //2
    $sql=mysqli_query($connect,"select*from categories where cate_name='$cate_name'");
    $check=mysqli_num_rows($sql);
    if($check <>0){
        echo"<script>
            Swal.fire({
                icon:'error',
                title:'ປະເພດສິນຄ້ານີ້ມີແລ້ວ',
                confirmButtonText:'ຕົກລົງ'
            })
        </script>";
    }else{
        //ຄໍາສັ່ງບັນທຶກຂໍ້ມູນເຂົ້າຕາຕະລາງ
    $sql=mysqli_query($connect,"INSERT INTO categories(cate_name,remark,user_id)value('$cate_name','$remark','$user_id');"); //3
    if($sql){
        echo"<script>
        swal.fire({
            icon:'success',
            title:'ການບັນທຶກຂໍ້ມູນສຳເລັດ',
            confirmButtonText:'Ok',}).then(()=>{
                window.location='select-categories.php';
            });
            </script>";
    }else{
        echo"<script>alert('ການບັນທຶກລົ້ມເລວ')</script>";
    }
}
?>



