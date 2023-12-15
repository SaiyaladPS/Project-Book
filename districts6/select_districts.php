<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ກວດສອບຂໍ້ມູນເມືອງ</title>
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
</head>
<body>
    <?php
    include('../Connect_dbstock.php');//ດຶງເອົາຟາຍທີ່ເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
    $select=mysqli_query($connect,"select a.pro_name,b.* from provinces as a,districts as b where a.pro_id=b.pro_id;");
    // //ນັບຈຳນວນຄົນ
     $count=mysqli_query($connect,"select count(dis_id)from districts;");
     $show=mysqli_fetch_array($count);
    // ?>
    <div class="container-fliuld">
        <div class="card">
            <div class="card-header text-light text-center bg-primary"><b><h2>ຊື່ເມືອງ <i class="ion-ios-home"></i></h2></b></div>
            <div class="card-body">
            <p>ມີທັງໝົດ <?php echo$show[0];?> ລາຍການ</p>
            <center><a href="Form_districts.php"class="btn btn-outline-success"><i class="ion-plus"></i> ເພີ່ມຂໍ້ມູນ</a></center>
                <table class="table table-bordered table-hover table-striped text-center">
                    <tr>
                        <th class="bg-info text-light">ລຳດັບ</th>
                        <th class="bg-info text-light">ຊື່ແຂວງ</th>
                        <th class="bg-info text-light">ຊື່ເມືອງ</th>
                       
                        
                        <th class="bg-info text-light">ໝາຍເຫດ</th>
                        <th class="bg-warning text-light"><i class="far fa-edit"></i>ແກ້ໄຂ</th>
                        <th class="bg-danger text-light"><i class="ion-android-delete"></i> ລົບ</th>
                    </tr>
                    <?php
                    $a=1;
                    while($data=mysqli_fetch_array($select)){//ວົງປີກກາແມ່ນປິດຢູ່ລຸ່ມ
                        // $age=mysqli_fetch_array($year);
                    ?>
                    <tr>
                        <td><?php echo $a; ?></td>
                         <td><?= $data['pro_name']?></td>
                        <td><?= $data['dis_name']?></td>
                        <td><?= $data['remark']?></td>
                        <td>
                            <!-- ສ້າງຕົວປ່ຽນຊື່ວ່າ id ຂື້ນມາໃໝ່ -->
                            <a href="update-form-dis.php?dis_id=<?= $data['dis_id']?>" class="btn btn-warning"><i class="far fa-edit"></i>ແກ້ໄຂ</a>
                        </td>
                        <td>
                            <a href="delete_districts.php?dis_id=<?php echo $data['dis_id'];?>" class="btn btn-danger delete"><i class="ion-android-delete"></i> ລົບ</a>  <!-- onclick="return confirm('ທ່ານຕ້ອງການລົບແທ້ ຫຼື ບໍ່') =ເປັນການເອິເລິດແຈ້ງເຕືອນທະມະດາ-->
                            <!-- ໝາຍເຫດ: ສົ່ງລະຫັດແບບນີ້ສາມາດຮັບໄດ້ສະເພາະແຕ່ແບບ $_GET -->
                        </td>
                    </tr>
                    <?php
                    $a++;
                    }//ວົງປີກກາຂອງ while loop
                    ?>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</body>
</html>