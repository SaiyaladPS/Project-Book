<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infromation</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
      <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
      <script src="../jquery.js"></script>
      <script>
      $(function(){
          $('.delete').on('click',function(e){
              e.preventDefault();
              const href = $(this).attr('href')
              Swal.fire({
                  title:'ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່?',
                  text:'ກົດ ຕົກລົງ ເພືອຢືນຢັນການລົບຂໍ້ມູນ',
                  icon:'info',
                  iconColor:'red',
                  showCancelButton: true,
                  confirmButtonColor:'red',
                  cancelButtonColor:'#A9A9A9',
                  confirmButtonText:'ຕົກລົງ',
                  cancelButtonText:'ຍົກເລິກ',

              }).then((result)=>{
                  if (result.value){
                      document.location.href = href;
                  
                  };
              });
              });
      })
      </script>
</head>

<style>
*{
    font-family:phetsarath ot;
}
</style>

<body>
<?php
 include('../connect_dbstock.php');//ຟາຍເຊືອມໂຍງກັບຖານຂໍ້ມູນ
 $select=mysqli_query($connect,"select*from categories order by cate_id desc;");
 
?>
    <div class="container-fliud">
        <div class="card">
            <div class="card-header text-center text-light bg-primary"><h3>ລາຍງານຂໍ້ມູນ</h3></div>
        </div>
        <div class="card-body">
        <a href="form_categories.php" class="btn btn-success"><i class="ion-android-person-add"></i> ເພີ່ມຂໍມູນ</a>
                <table class='table  table-bordered table-hover table-stiped text-center'>
                <tr>
                <th class='bg-success text-light'>ລໍາດັບ</th>
                <th class='bg-success text-light'>ລະຫັດ</th>
                <th class='bg-success text-light'>ປະເພດສິນຄ້າ</th>
                <th class='bg-success text-light'>ໜາຍເຫດ</th>
                <th class='bg-warning text-light'>ແກ້ໄຂ</th>
                <th class='bg-danger text-light'>ລົບ</th>
                </tr>
                <?php
                    $a=1;
                    while($data=mysqli_fetch_array($select)){//ວົງປີກກາປິດຢູຸ່ລູ່ມ

                    
                    ?>
                <tr>
                    <td><?php echo $a;?></td>
                    <td><?=$data['cate_id'];?></td>
                    <td><?=$data['cate_name'];?></td>
                    <td><?=$data['remark'];?></td>
                    <!-- button -->
                    <td><a href="update_categories.php?cate_id=<?php echo $data['cate_id'];?>" class="btn btn-warning"><i class='fas fa-wrench'></i> ແກ້ໄຂ</td>
                    <td><a href="deletecategories.php?cate_id=<?php 
                    echo $data['cate_id'];?>" class="btn btn-danger text-light delete">
                    <i class='ion-ios-trash-outline'></i>ລົບ</a></td>
                </tr>
                <?php
                $a++;
                    }//ປິດວົງປິກກາຂອງ while loop
                    ?>
                           
                </table>
               
        </div>
    </div>
</body>
</html>