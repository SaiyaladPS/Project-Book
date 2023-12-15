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
     $count=mysqli_query($connect,"select count(prod_id)from products;");
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
               <?php
               while($data=mysqli_fetch_array($select)){
               ?>
                <div class="row">
                <div class="col-md-2"></div>
                    <img src='img/<?=$data['pic'];?>'
                    width="200px"><br>
                    <h3><?$data['prod_name'];?></h3>
                    <p style="color:red;">ລາຄາ <?=$data['sprice'];?></p>
              </div>

               <?php
               }
               ?>
                 </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</body>
</html>