<?php
    include('../Connect_dbstock.php');//ດຶງເອົາຟາຍທີ່ເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
    $data=$_POST['data'];
    $select=mysqli_query($connect,"select a.cate_name,b.* from categories as a,products as b where a.cate_id=b.cate_id and (b.book_id like'%$data%' or b.book_name like'%$data%' or a.cate_name like'%$data%');");
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