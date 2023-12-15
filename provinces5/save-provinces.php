
<?php
    include('../Connect_dbstock.php');
    $pro_id=$_POST["pro_id"];
    $pro_name=$_POST["pro_name"];
    $remark=$_POST["remark"];
    

        $update=mysqli_query($connect,"update provinces set pro_name='$pro_name',remark='$remark' where pro_id='$pro_id';");
            if($update){
            echo"<script>
            swal.fire({
                icon:'success',
                title:'ການບັນທຶກຂໍ້ມູນສຳເລັດ',
                confirmButtonText:'Ok',}).then(()=>{
                    window.location='select_provinces.php';
                });
                </script>";
            
            }else{
                echo"ດດດ";
            }
    
?>
        <!--  -->