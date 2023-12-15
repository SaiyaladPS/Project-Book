<?php
    include("../connect_dbstock.php");
    $dis_id=$_POST['dis_id'];
    $dis_name=$_POST['dis_name'];
    $remark=$_POST['remark'];
    $pro_id=$_POST['pro_id'];
 
        
        $a=mysqli_query($connect,"update districts set dis_name='$dis_name',remark='$remark' where dis_id='$dis_id';");
        if($a){
            echo"<script>
            swal.fire({
                icon:'success',
                title:'ສໍາເລັດ',
                
            })
            window.setTimeout(function(){
                ;location='select_districts.php';
            },2000)
            </script>";
        }else{
            echo"<script>alert('ບໍ່ສໍາເລັດ');</script>";
        }
    
?>