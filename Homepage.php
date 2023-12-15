<?php
session_start();
if (@$_SESSION['checked'] <> 1) {
  echo "<script>alert('ກະລຸນາລ໋ອກອິນກ່ອນ');location='index.php';</script>";
} else {
?>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ລະບົບບໍລິຫານ ອອກປື້ມສຳມະໂນຄົວ</title>
    <!-- JQVMap -->
    <link rel="stylesheet" href="link/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="link/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/css/all.min.css">
    <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="jquery.js"></script>
    <style>
    * {
        font-family: Phetsarath OT;
    }

    #save {
        margin-top: 30;
    }
    </style>
</head>
<?php
  include("Connect_dbstock.php");
    $select1 =mysqli_query($connect,"select sum(amount)from orders where o_date=curdate();");
    $select6 =mysqli_query($connect,"select sum(a.sprice*b.o_qty-a.bprice*b.o_qty)from products as a,orders as b where a.book_id=b.book_id  and b.o_date=curdate()");
    $select2 = mysqli_query($connect,"select sum(qty*bprice) from products;");
    $select3 = mysqli_query($connect,"select sum(sprice*qty-bprice*qty) from products;");
    $select4 =mysqli_query($connect,"select sum(amount)from orders");
    $select5 =mysqli_query($connect,"select sum(amount) from receives where r_date=curdate(); ");
    $sel=mysqli_fetch_array($select1);
    $cost = mysqli_fetch_array($select2);
    $profit = mysqli_fetch_array($select3);
    $sel_all =mysqli_fetch_array($select4);
    $ramount_today =mysqli_fetch_array($select5);
    $profit_today=mysqli_fetch_array($select6);
  ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4><?= number_format($sel[0]); ?> ກີບ</h4>
                        <p>ຍອດຂາຍ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a class="small-box-footer">ຍອດຂາຍຂອງມື້ນີ້ </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4><?= number_format($profit_today[0]); ?> ກີບ</h4>
                        <p>ກໍາໄລ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a class="small-box-footer">ກໍາໄລຂອງມື້ນີ້ </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4><?= number_format($cost[0]); ?> ກີບ</h4>
                        <p>ຕົ້ນທຶນທັງໝົດ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <a class="small-box-footer">ຈຳນວນເງິນທັງໝົດຂອງຕົ້ນ </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4><?= number_format($profit[0]); ?> ກີບ</h4>
                        <p>ກຳໄລ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a class="small-box-footer">ເງິນກຳໄລທັງໝົດ </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4><?= number_format($sel_all[0]); ?> ກີບ</h4>
                        <p>ຍອດຂາຍທັງໝົດ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a class="small-box-footer">ເງິນຍອດຂາຍທັງໝົດ </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4><?= number_format($ramount_today[0]); ?> ກີບ</h4>
                        <p>ເງິນຊື້ເຂົ້າມື້ນີ້</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a class="small-box-footer">ເງິນລວມຊື້ສິນຄ້າເຂົ້າທັງໝົດຂອງມື້ນີ້ </a>
                </div>
            </div>

        </div>
    </div>
    <hr>
    <hr>
    <?php 
  include("Connect_dbstock.php");
  $select=mysqli_query($connect,"select a.book_id,a.book_name,a.qty,a.sprice,a.bprice,a.remark, b.cate_id,b.cate_name from products as a, categories as b where a.cate_id=b.cate_id;");

  // ຄຳສັ່ງນັບຈຳນວນສິນຄ້າໃນສາງ
  $count=mysqli_query($connect,"select count(book_id)from products");
  $show=mysqli_fetch_array($count);
  ?>
</body>

</html>
<?php
}
?>