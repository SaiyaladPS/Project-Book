<style>
        *{font-family:phetsarath ot;}
    </style>
   
 <?php
 include("../Connect_dbstock.php");//ຟາຍເຊື່ອມໂຍງກັບຖານຂໍ້ມູນ
    $id=$_GET['prod_id'];
    $delete=mysqli_query($connect,"delete from products where prod_id='$id';");
    if($delete){
        echo "<script>location='form_search_products.php';</script>";
    }
 ?>