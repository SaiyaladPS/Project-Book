<?php 
include('../Connect_dbstock.php');//ຟາຍເຊື່ອມໂຍງ ກັບຖານຂໍ້ມູນ
$vill_id=$_POST['vill_id'];
$dis_id=$_POST['dis_id'];
$pro_id=$_POST['pro_id'];
$vill_name=$_POST['vill_name'];
$remark=$_POST['remark'];
$update = mysqli_query($connect,"update villages set dis_id='$dis_id',pro_id='$pro_id',
vill_name='$vill_name',remark = '$remark' where vill_id = '$vill_id';");
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
                location = 'Select_villages.php'
            },1500)
 </script>";
}
?>