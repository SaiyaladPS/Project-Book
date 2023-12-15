<!DOCTYPE html>
<?php
include("../Connect_dbstock.php");
session_start();
if (@$_SESSION['checked'] <> 1) {
  echo "<script>alert('ກະລຸນາລ໋ອກອິນກ່ອນ');location='../index.php';</script>";
} else {
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ແບບຟອມກວດສອບຂໍ້ມູນ</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css"> 
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../jquery.js"></script>
    <style>
        *{font-family:phetsarath ot}
        
    </style>
    <script>
        $(function(){
            $('.delete').on('click',function(e){
                e.preventDefault();
                const href=$(this).attr('href')
                Swal.fire({
                    title:'ທ່ານຕ້ອງການລົບ ຫຼື ບໍ່',
                    text:'ກົດຕົກລົງເພືີ່ອຢືນຢັນການລົບຂໍ້ມູນ',
                    icon:'info',
                    iconColor:'red',
                    showCancelButton:true,
                    confirmButtonColor:'red',
                    cancelButtonColor:'#A9A9A9',
                    confirmButtonText:'ຕົກລົງ',
                    cancelButtonText:'ຍົກເລີກ',
                }).then((result)=>{
                    if(result.value){
                        document.location.href=href;
                    };
                });
            });
        })
    </script>   
<body>
<?php
    include('../Connect_dbstock.php');//ດຶງເອົາຟາຍທີ່ເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
$select=mysqli_query($connect,"select a.dis_name,c.pro_name,b.vill_name,d.*, year(curdate())-year(dob) as age from provinces as c,
    villages as b,districts as a,users as d where a.dis_id=d.dis_id and b.vill_id=d.vill_id 
    and c.pro_id=d.pro_id");
    $count=mysqli_query($connect,"select count(user_id)from users");
    $show=mysqli_fetch_array($count);
    ?>
<div class="container-fluid">
<div class="card">
            <div class="card-header text-center text-light bg-success"><h3>ລາຍງານຂໍ້ມູນ</h3></div>
        </div>
            <div class="card-body">
          
            <a href="Form_user.php" class="btn btn-success"><i class="ion-plus"></i> ເພີ່ມຂໍ້ມູນ</a><br>
         
            <b>ຈຳນວນຜູ້ໃຊ້ມີ: <?php echo $show['0']; ?> Users</b>
            <table class="table table-bordered table-hover table-striped text-center">
                  <tr>
                        <th class="text-light bg-secondary">ລຳດັບ</th>
                        <th class="text-light bg-primary">ຊື່ຜູ້ໃຊ້</th>
                        <th class="text-light bg-primary">ຊື່</th>
                        <th class="text-light bg-primary">ນາມສະກຸນ</th>
                        <th class="text-light bg-primary">ເພດ</th>
                        <th class="text-light bg-primary">ອາຍຸ</th>
                        <th class="text-light bg-primary">ວັນເດຶອນປີເກີດ</th>
                        <th class="text-light bg-primary">ບ້ານ</th>
                        <th class="text-light bg-primary">ເມືອງ</th>
                        <th class="text-light bg-primary">ແຂວງ</th>
                        <th class="text-light bg-primary">ສະຖານະນຳໃຊ້</th>
                       
                        <th class="text-light bg-primary">ເບີໂທ</th>
                        <th class="text-light bg-primary">ໝາຍເຫດ</th>
                        <th class="text-light bg-warning">ແກ້ໄຂ</th>
                        <th class="text-light bg-danger">ລົບ</th>
                  </tr>
                  <?php
                    $a=1;
                    while($data=mysqli_fetch_array($select)){//ວົງປີກກາແມ່ນປິດຢູ່ລຸ່ມ
                    ?>
                  <tr>
                        <td><?php echo $a; ?></td>
                        <td><?= $data['username']?></td>
                        <td><?= $data['fname']?></td>
                        <td><?= $data['lname']?></td>
                        <td><?= $data['gender']?></td>
                        <td><?= $data['age']?></td>
                        <td><?= $data['dob']?></td>
                        <td><?= $data['vill_name']?></td>
                        <td><?= $data['dis_name']?></td>
                        <td><?= $data['pro_name']?></td>
                        <td><?= $data['status']?></td>
                        
                        <td><?= $data['tel']?></td>
                        <td><?= $data['remark']?></td>
                        <td>
                            <!-- ສ້າງຕົວປ່ຽນຊື່ວ່າ id ຂື້ນມາໃໝ່ -->
                            <a href="Update-users.php?user_id=<?= $data['user_id'];?>" class="btn btn-warning"><i class="ion-edit"></i>ແກ້ໄຂ</a>
                        </td>
                        <td>
                            <a href="Delete_user.php?user_id=<?php echo $data['user_id'];?>" class="btn btn-danger delete"><i class="ion-android-delete"></i> ລົບ</a>  <!-- onclick="return confirm('ທ່ານຕ້ອງການລົບແທ້ ຫຼື ບໍ່') =ເປັນການເອິເລິດແຈ້ງເຕືອນທະມະດາ-->
                            <!-- ໝາຍເຫດ: ສົ່ງລະຫັດແບບນີ້ສາມາດຮັບໄດ້ສະເພາະແຕ່ແບບ $_GET -->
                        </td>
                  </tr>
                    <?php
                    $a++;
                    }//ວົງປີກກາຂອງ while loop
                    ?>    
            </table>
         </div>
 </div>

</body>
</html>
<?php
}
?>