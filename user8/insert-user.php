<?php
    include("../Connect_dbstock.php");
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $dob= $_POST['dob'];
    $tel= $_POST['tel'];
    $pro_id= $_POST['pro_id'];
    $dis_id= $_POST['dis_id'];
    $vill_id= $_POST['vill_id'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remark=$_POST['remark'];
    $sql=mysqli_query($connect,"select * from users where username='$username'");
    $check=mysqli_num_rows($sql);
    if($check <> 0){
        echo"<script>
        Swal.fire({
            icon:'error',
            title:'ຊື່ຜູ້ນຳໃຊ້ນີ້ມີແລ້ວ',
            confirmButtonText:'ຕົກລົງ',
        });
        </script>";
    }else{
      $gender = $_POST['gender'];
      $save=mysqli_query($connect,"insert into users(fname,lname,gender,dob,tel,pro_id,dis_id,vill_id,status,username,password,remark)values
      ('$fname','$lname','$gender','$dob','$tel','$pro_id','$dis_id','$vill_id','$status','$username',password('$password'),'$remark');");// ແມ່ນຄໍາສັ່ງປິດບັງລະຫັດ password
      if($save){
          echo "<script>
          Swal.fire({
            icon: 'success',
            title: 'ບັນທຶກຂໍ້ມູນສຳເລັດ',
            showConfirmButton: false,
            timer: 2500
            })
      
                </script>";
       }else{
          echo"<script>
          Swal.fire({
             icon:'error',
             title:'ລົ້ມເຫຼວ',
             confirmButtonText:'ຕົກລົງ',
          });
          </script>";
       }
   }
?>