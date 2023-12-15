<?php 
include('../Connect_dbstock.php');//ຟາຍເຊື່ອມໂຍງ ກັບຖານຂໍ້ມູນ
$user_id=$_POST['user_id'];
$pro_id=$_POST['pro_id'];
$dis_id=$_POST['dis_id'];
$vill_id=$_POST['vill_id'];
$status=$_POST['status'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$tel=$_POST['tel'];
$username=$_POST['username'];
$password=$_POST['password'];
$remark=$_POST['remark'];
$update = mysqli_query($connect,"update users set dis_id='$dis_id',pro_id='$pro_id',
vill_id='$vill_id',status='$status',remark = '$remark',fname='$fname',lname='$lname',gender='$gender',
dob='$dob',tel='$tel',username='$username',password=password('$password') where user_id = '$user_id';");
if($update){
    echo"
     <script>
     Swal.fire({
         icon:'success',
         title:'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
         showConfirmButton: false,
         timer:1500
             })
            window.setTimeout(function(){
                location = 'Select-user.php'
            },1500)
 </script>";
}
?>