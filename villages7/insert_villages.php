<?php
session_start(); //1
include('../connect_dbstock.php');
$dis_id=$_POST['dis_id'];
$pro_id=$_POST['pro_id'];
$vill_name=$_POST['vill_name'];
$remark=$_POST['remark'];
$user_id=$_SESSION["user_id"]; //2
//ເງືອນໄຂກໍລະນີເມືອງໃນແຂວງດຽວກັນແມ່ນບໍ່ສາມາດບັນທຶຶກເຂົ້າໄປໄດ້
$select=mysqli_query($connect,"select*from villages where vill_name='$vill_name' and dis_id='$dis_id' ");
$check=mysqli_num_rows($select);
if($check <> 0){
    echo"<script>
        Swal.fire({
            icon: 'error',
            title: 'ເມືອງແລະບ້ານນີ້ມີແລ້ວ',
            showConfirmButton: false,
            timer: 2500
            })
            window.setTimeout(function(){
                // location.reload();
                location='form_villages.php'
            },
            1500);
            </script>";
}else{
    $swal=mysqli_query($connect," insert into villages(vill_name,pro_id,dis_id,remark,user_id)value
    ('$vill_name','$pro_id','$dis_id','$remark','$user_id') ");
    if($swal){
        echo"<script>
        Swal.fire({
            icon: 'success',
            title: 'ບັນທຶກຂໍ້ມູນສຳເລັດ',
            showConfirmButton: false,
            timer: 2500
            })
            window.setTimeout(function(){
                // location.reload();
                location='form_villages.php'
            },
            1500);
            </script>";
    }else{
        echo"ບັນທຶກຂໍ້ມູນລົ້ມເຫຼວ";
    }
}
?>
<!--    location='form_districts.php'; -->