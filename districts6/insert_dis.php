<?php
session_start(); //1
include('../connect_dbstock.php');
$pro_id=$_POST['pro_id'];
$dis_name=$_POST['dis_name'];
$remark=$_POST['remark'];
$user_id=$_SESSION["user_id"]; //2
//ເງືອນໄຂກໍລະນີເມືອງໃນແຂວງດຽວກັນແມ່ນບໍ່ສາມາດບັນທຶຶກເຂົ້າໄປໄດ້
$check_district=mysqli_query($connect,"select*from districts where dis_name='$dis_name'and pro_id='$pro_id' ");
$check=mysqli_num_rows($check_district);
if($check <> 0){
    echo"<script>
        Swal.fire({
            icon: 'error',
            title: 'ເມືອງແລະແຂວງນີ້ມີແລ້ວ',
            showConfirmButton: false,
            timer: 2500
            })
            window.setTimeout(function(){
                // location.reload();
                location='form_districts.php'
            },
            1500);
            </script>";
}else{
    $swal=mysqli_query($connect," insert into districts(pro_id,dis_name,remark,user_id)value('$pro_id','$dis_name','$remark','$user_id') ");
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
                location='form_districts.php'
            },
            1500);
            </script>";
    }else{
        echo"ບັນທຶກຂໍ້ມູນລົ້ມເຫຼວ";
    }
}
?>
<!--    location='form_districts.php'; -->