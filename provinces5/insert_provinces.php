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
    $pro_name=$_POST["pro_name"];
    $remark=$_POST["remark"];
    $user_id=$_SESSION["user_id"]; //2
    $sql=mysqli_query($connect,"select*from provinces where pro_name='$pro_name'");
    $check=mysqli_num_rows($sql);
    if($check <>0){
        echo"<script>
            Swal.fire({
                icon:'error',
                title:'ຊືແຂວງນິ້ມີແລ້ວ',
                confirmButtonText:'ຕົກລົງ'
            }) 
        </script>";
    }else{
        //ຄໍາສັ່ງບັນທຶກຂໍ້ມູນເຂົ້າຕາຕະລາງ
    $sql=mysqli_query($connect,"insert into provinces(pro_name,remark,user_id)value('$pro_name',
    '$remark','$user_id');");
    if($sql){
        echo"<script>
        swal.fire({
            icon:'success',
            title:'ການບັນທຶກຂໍ້ມູນສຳເລັດ',
            showConfirmButton:false,
                        timer:2000,
            });
            window.setTimeout(function(){
                // location.reload();
                location='form_provinces.php';
            },
            1500);
            </script>";
    }else{
        echo"<script>alert('ການບັນທຶກລົ້ມເລວ')</script>";
    }
}
?>



