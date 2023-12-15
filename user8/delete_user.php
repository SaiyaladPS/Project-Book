<style>
        *{font-family:phetsarath ot;}
    </style>
   
 <?php
 include("../Connect_dbstock.php");//ຟາຍເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
    $id=$_GET['user_id'];
    $delete=mysqli_query($connect,"delete from users where user_id='$id';");
    if($delete){
      echo "<script>location='Select-user.php';</script>";
    }
 ?>