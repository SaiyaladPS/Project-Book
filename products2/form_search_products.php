<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>serch-products</title>
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
                const href=$(this).attr('href');
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
    <script>
    $(function(){
        $("#data").keyup(function(){
            var data =$("#data").val();
            $.post('search_products.php',{  //ຊື່ຟາຍໃຫມ່
                data:data
            },
            function(output){
                $(".show").html(output);
            })
        })
    })
    </script>
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
    <div class="container-flued">
            <div class="card">
                <div class="card-herder bg-primary text-light text-center">
                        <h2><b>ຟອມຄົ້ນຫາຂໍ້ມູນສິນຄ້າ</b></h2>
                </div>
                <div class="card-body">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text"id="data" class="form-control"placeholder="ປ້ອນຂໍ້ມູນທີຕ້ອງການຈະຊອກຫາ">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button"class="btn btn-outline-success"id="search"><i class="fas fa-search"></i>ຊອກຫາຂໍ້ມູນ</button>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6"></div>
                        </div>  
                        <hr>                  <!--ປິດrow -->
                        <hr>                  <!--ປິດrow -->
 <?php
    include('../Connect_dbstock.php');//ດຶງເອົາຟາຍທີ່ເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
    $select=mysqli_query($connect,"select a.cate_name,b.* from categories as a,products as b where a.cate_id=b.cate_id;");
     $count=mysqli_query($connect,"select count(book_id)from products;");
     $show=mysqli_fetch_array($count);
 ?>
                        <table class="table table-bordered table-hover table-striped text-center show">
                    <tr>
                        <th class="bg-success text-light">ລຳດັບ</th>
                        <th class="bg-success text-light">ລະຫັດສິນຄ້າ</th>
                        <th class="bg-success text-light">ປະເພດສິນຄ້າ</th>
                        <th class="bg-success text-light">ຊື່ສິນຄ້າ</th>
                        <th class="bg-success text-light">ຈຳນວນ</th>
                        <th class="bg-success text-light">ລາຄາຊື້</th>
                        <th class="bg-success text-light">ລາຄາຂາຍ</th>
                        <th class="bg-success text-light">ໝາຍເຫດ</th>
                        <th class="bg-warning text-light"><i class="fas fa-wrench"></i>ແກ້ໄຂ</th>
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
                        <td><?= $data['cate_name']?></td>
                        <td><?= $data['book_name']?></td>
                        <td><?= $data['qty']?></td>
                        <td><?= $data['bprice']?></td>
                        <td><?= $data['sprice']?></td>
                        <td><?= $data['remark']?></td>
                        <td>
                            <!-- ສ້າງຕົວປ່ຽນຊື່ວ່າ id ຂື້ນມາໃໝ່ -->
                            <a href="update-form-products.php?prod_id=<?= $data['book_id']?>" class="btn btn-warning"><i class="fas fa-wrench"></i> ແກ້ໄຂ</a>
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