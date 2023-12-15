<?php
    include('../Connect_dbstock.php');//ດຶງເອົາຟາຍທີ່ເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
    $data=$_POST['data'];
    $data1=$_POST['data1'];
    $select=mysqli_query($connect,"select a.cate_name,b.book_name,c.* from categories as a,
    products as b, orders as c where a.cate_id=b.cate_id and b.book_id=c.book_id 
    and(c.o_date between'$data'and'$data1');");
    ?>
     <table class="table table-bordered table-hover table-striped text-center show">
        <tr>
            <th class="bg-secondary  text-light">ລຳດັບ</th>
            <th class="bg-primary text-light">ລະຫັດສິນຄ້າ</th>
            <th class="bg-primary text-light">ປະເພດສິນຄ້າ</th>
            <th class="bg-primary text-light">ຊື່ສິນຄ້າ</th>
            <th class="bg-primary text-light">ຈຳນວນ</th>
            <th class="bg-primary text-light">ລາຄາຂາຍ</th>
            <th class="bg-primary text-light">ເງິນລວມ</th>
            <th class="bg-primary text-light">ເວລານຳເຂົ້າ</th>
            <th class="bg-warning text-light">ໝາຍເຫດ</th>
        </tr>
        <?php
        $a=1;
        while($data=mysqli_fetch_array($select)){//ວົງປີກກາແມ່ນປິດຢູ່ລຸ່ມ
            // $age=mysqli_fetch_array($year);
        ?>
        <tr>
            <td><?php echo $a; ?></td>
            <td><?= $data['book_id']?></td> 
            <td><?= $data['cate_name']?></td>
            <td><?= $data['book_name']?></td>
            <td><?= $data['o_qty']?></td>
            <td><?= number_format($data['sprice']);?></td>
            <td><?= number_format($data['amount']);?></td>
            <td><?= $data['o_date']."  ".$data['o_time']?></td>
            <td><?= $data['remark']?></td>
        </tr>
        <?php
        $a++;
        }//ວົງປີກກາຂອງ while loop
        ?>
      </table>