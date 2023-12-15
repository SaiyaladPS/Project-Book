
<?php
session_start(); //1
    include('../Connect_dbstock.php');
    $prod_id=$_POST["prod_id"];
    $r_bprice=$_POST["r_bprice"];
    $r_qty=$_POST["r_qty"];
    $r_amount=$_POST["r_amount"];
    $remark=$_POST["remark"];
    $user_id=$_SESSION["user_id"];
   
    $sql= "INSERT INTO receives(bill_no, book_id, r_qty, bprice, amount, r_date, r_time, remark, user_id) VALUES
    ('','$prod_id','$r_qty','$r_bprice','$r_amount',curdate(),curtime(),'$remark','$user_id') ";
    $result = mysqli_query($connect, $sql);
    if($result){
        mysqli_query($connect,"update products set qty=qty+$r_qty where book_id='$prod_id' ");
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
    
}

?>
  <!--location='form_search_products.php';    -->