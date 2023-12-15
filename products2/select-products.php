<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ແບບຟອມກວດສອບຂໍ້ມູນ</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
    $select=mysqli_query($connect,"select a.*,b.* from categories as a,products as b where a.cate_id=b.cate_id;");
    // //ນັບຈຳນວນຄົນ
     $count=mysqli_query($connect,"select count(book_id)from products;");
     $show=mysqli_fetch_array($count);

    // $show=mysqli_fetch_array($count);
    // //ສະແດງອາຍຸ
    // $year=mysqli_query($connect,"select year(curdate())-year(dob)from profile;");
    // ?>
    <div class="container-fliuld">
        <div class="card">
            <div class="card-header text-light text-center bg-primary"><b><h2>ສາງສິນຄ້າ <i class="ion-ios-home"></i></h2></b></div>
            <div class="card-body">
            <p>ມີທັງໝົດ <?php echo$show[0];?> ລາຍການ</p>
            <center><a href="Form_products.php"class="btn btn-outline-success"><i class="ion-plus"></i> ເພີ່ມຂໍ້ມູນ</a></center>
                <table class="table table-bordered table-hover table-striped text-center">
                    <tr>
                        <th class="bg-success text-light">ລຳດັບ</th>
                        <th class="bg-success text-light">ລະຫັດສິນຄ້າ</th>
                        <th class="bg-success text-light">ຮູບພາບ</th>
                        <th class="bg-success text-light">ປະເພດປື້ມ</th>
                        <th class="bg-success text-light">ຊື່ຜູ້ແຕ່ງ</th>
                        <th class="bg-success text-light">ສຳໜັກງານ</th>
                        <th class="bg-success text-light">ຊື່ປື້ມ</th>
                        <th class="bg-success text-light">ຈຳນວນ</th>
                        <th class="bg-success text-light">ລາຄາຊື້</th>
                        <th class="bg-success text-light">ລາຄາຂາຍ</th>
                        <th class="bg-success text-light">ໝາຍເຫດ</th>
                        <th class="bg-warning text-light"><i class="fas fa-wrench"></i> ແກ້ໄຂ</th>
                        <th class="bg-danger text-light"><i class="ion-android-delete"></i> ລົບ</th>
                    </tr>
                    <?php
                    $a=1;
                    while($data=mysqli_fetch_array($select)){//ວົງປີກກາແມ່ນປິດຢູ່ລຸ່ມ
                        // $age=mysqli_fetch_array($year);
                    ?>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?= $data['book_id']?></td> <!--ມີຫຼາຍວິທີເຊັ່ນ:<?php $data['ຊື່ຟິວ ຫຼື ຕົວເລກ(ໂດຍນັບເລີ່ມຕົ້ນແຕ່ 0)'];?> -->
                        <td><img src="img/<?=$data['img'];?>" width="60px"></td>
                        <td><?= $data['cate_name']?></td>
                        <td><?= $data['authors']?></td>
                        <td><?= $data['press']?></td>
                       
                        <td><?= $data['book_name']?></td>
                        <td><?= $data['qty']?></td>
                        <td><?= $data['bprice']?></td>
                        <td><?= $data['sprice']?></td>
                        <td><?= $data['remark']?></td>
                        <td>
                            <!-- ສ້າງຕົວປ່ຽນຊື່ວ່າ id ຂື້ນມາໃໝ່ -->
                            <a href="update-form-products.php?prod_id=<?= $data['book_id']?>" class="btn btn-warning"><i class="fas fa-wrench"></i>ແກ້ໄຂ</a>
                        </td>
                        <td>
                            <a href="Delete-products.php?prod_id=<?php echo $data['book_id'];?>" class="btn btn-danger delete"><i class="ion-android-delete"></i> ລົບ</a>  <!-- onclick="return confirm('ທ່ານຕ້ອງການລົບແທ້ ຫຼື ບໍ່') =ເປັນການເອິເລິດແຈ້ງເຕືອນທະມະດາ-->
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