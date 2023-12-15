<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ແບບຟອມກວດສອບຂໍ້ມູນ</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css"> 
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../jquery.js"></script>
    <style>
        *{font-family:phetsarath ot}
        
    </style>
     
    <!-- ຄຳສັ່ງໃຊ້ຄົ້ນຫາຂໍ້ມູນ -->
    <script>
        $(function(){
            $("#data").keyup(function(){
                  var data=$("#data").val();
                  $.post("form_search_receives.php",{ //Search_products.php ແມ່ນຊື່ຟາຍທີ່ສ້າງໃໝ່
                    data: data
                  },
                  function(output){
                    $(".show").html(output);
                  })
            })
        })
    </script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-light text-center bg-success">
                <b><h2>ລາຍການສິນຄ້ານຳເຂົ້າ</h2></b>
            </div>
            <div class="card-body">
                  <div class="row">
                       
                        <div class="col-md-6">
                              <div class="row">
                                    <div class="col-md-9">
                                          <!-- ບັອກຄົ້ນຫາຂໍມູນ -->
                                          <input type="text" id="data" class="form-control" placeholder="ປ້ອນຂໍ້ມູນສິນຄ້າທີ່ຕ້ອງການຊອກຫາ">
                                    </div>
                                    <div class="col-md-3">
                                          <button type="button" class="btn btn-outline-success" id="search"><i class="fas fa-search"></i> ຄົ້ນຫາຂໍ້ມູນ</button>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <hr>
                <?php
                    include('../Connect_dbstock.php');//ດຶງເອົາຟາຍທີ່ເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
                    $select=mysqli_query($connect,"select a.cate_name,b.book_name,c.* from categories as a, products as b, receives as c 
                    where a.cate_id=b.cate_id and b.book_id=c.book_id order by c.r_id desc");
                ?>
                <table class="table table-bordered table-hover table-striped text-center show">
                    <tr>
                        <th class="bg-secondary text-light">ລຳດັບ</th>
                        <th class="bg-info text-light">ລະຫັດສິນຄ້າ</th>
                        <th class="bg-info text-light">ປະເພດສິນຄ້າ</th>
                        <th class="bg-info text-light">ຊື່ສິນຄ້າ</th>
                        <th class="bg-info text-light">ຈຳນວນ</th>
                        <th class="bg-info text-light">ລາຄາຊື້</th>
                        <th class="bg-info text-light">ເງິນລວມ</th>
                        <th class="bg-info text-light">ເວລານຳເຂົ້າ</th>
                        <th class="bg-warning text-light">ໝາຍເຫດ</th>
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
                        <td><?= $data['r_qty']?></td>
                        <td><?= number_format($data['bprice']).' ກີບ';?></td>
                        <td><?= number_format($data['amount']).' ກີບ';?></td>
                        <td><?= $data['r_date']."  ".$data['r_time']?></td>
                        <td><?= $data['remark']?></td>
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