<?php 
include('../Connect_dbstock.php');//ຟາຍເຊື່ອມໂຍງ ກັບຖານຂໍ້ມູນ
$id=$_POST['id'];
$cate_id=$_POST['cate_id'];
$prod_id=$_POST['prod_id'];
$prod_name=$_POST['prod_name'];
$qty=$_POST['qty'];
$bprice=$_POST['bprice'];
$sprice=$_POST['sprice'];
$remark=$_POST['remark'];
$sql2=mysqli_query($connect,"select*from products where book_id='$prod_id';");
$check2=mysqli_num_rows($sql2);
$update = mysqli_query($connect,"update products set book_id='$prod_id',cate_id='$cate_id',book_name='$prod_name',
qty = '$qty',bprice = '$bprice',sprice = '$sprice',remark = '$remark' where book_id = '$id';");
if($update){
    echo"
     <script>
     Swal.fire({
         icon:'success',
         title:'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
         showConfirmButton: false,
         timer:1500
             })
            window.setTimeout(function(){
                location = 'form_search_products.php'
            },1500)
 </script>";
}else if($check2 <> 0){
    echo"<script>
    swal.fire({
        icon:'error',
        text:'ລະຫັດສີິີນຄ້ານີ້ມີແລ້ວ',
        confirmButtonText:'ຕົກລົງ'
    })
    </script>";

}
?>