<?php
include("../Connect_dbstock.php");
$prod_id=$_POST['prod_id'];

$sql=mysqli_query($connect,"select sprice from products where book_id='$prod_id' ");
$prod_name=mysqli_fetch_array($sql);
if($prod_name){
    echo $prod_name[0];

}else{
    echo"ບໍ່ມີຂໍ້ມູນ";
}
?>