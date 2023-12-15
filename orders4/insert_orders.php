
<?php
session_start(); //1
    include('../Connect_dbstock.php');
    $prod_id=$_POST["prod_id"];
    $o_sprice=$_POST["o_sprice"];
    $o_qty=$_POST["o_qty"];
    $o_amount=$_POST["o_amount"];
    $remark=$_POST["remark"];
    $user_id=$_SESSION["user_id"]; //2
    $mysql=mysqli_query($connect,"select*from products where book_id='$prod_id' and qty<'$o_qty';");
    $a=mysqli_num_rows($mysql);
    if($a <> 0){
        echo"<script>
        Swal.fire({
            icon: 'error',
            title: 'ສິນຄ້າບໍ່ພໍຂາຍ',
            showConfirmButton: false,
            timer: 2500
            })
            window.setTimeout(function(){
                // location.reload();
                
            },
            1500);
            </script>";
    }else{
    $sql= "INSERT INTO orders(bill_no, book_id, o_qty, sprice, amount, o_date, o_time, remark, user_id) VALUES
    ('','$prod_id','$o_qty','$o_sprice','$o_amount',curdate(),curtime(),'$remark','$user_id') ";
    $result = mysqli_query($connect, $sql);
    if($result){
        mysqli_query($connect,"update products set qty=qty-$o_qty where book_id='$prod_id' ");
        echo"<script>
        Swal.fire({
            icon: 'success',
            title: 'ບັນທຶກຂໍ້ມູນສຳເລັດ',
            showConfirmButton: false,
            timer: 2500
            })
            window.setTimeout(function(){
                // location.reload();
                
            },
            1500);
            </script>";
    }else{
        echo"ບັນທຶກຂໍ້ມູນລົ້ມເຫຼວ";
    
    }}
?>
  <!--location='form_search_products.php';    -->