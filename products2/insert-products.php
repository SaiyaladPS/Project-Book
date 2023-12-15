<?php
session_start(); //1
include("../Connect_dbstock.php");
$banner     = $_FILES['file']['name'];
$filetype   = $_FILES['file']['type'];
$prod_id=$_POST['prod_id'];
$prod_name=$_POST['prod_name'];
$qty=$_POST['qty'];
$cate_id=$_POST['cate_id'];
$bprice=$_POST['bprice'];
$sprice=$_POST['sprice'];
$remark=$_POST['remark'];
$user_id=$_SESSION["user_id"]; //2
$img = $_FILES['file']['name'];
$authors = $_POST['authors'];
$press = $_POST['press'];
if ($banner=="") {
   echo "<script>
   Swal.fire(
      'ກະລຸນາເລືອກຮູບ !',
      'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
      'warning',
   )
   </script>";
} else if ($prod_name == "") {
   echo "<script>
   Swal.fire(
      'ກະລຸນາປ້ອນຊື່ສິນຄ້າ !',
      'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
      'warning',
   )
   </script>";
} else if ($authors == "") {
   echo "<script>
   Swal.fire(
      'ກະລຸນາປ້ອນຊື່ຜູ້ແຕ່ງ !',
      'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
      'warning',
   )
   </script>";
} else if ($press == "") {
   echo "<script>
   Swal.fire(
      'ກະລຸນາປ້ອນສຳໜັກງານ !',
      'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
      'warning',
   )
   </script>";
} else {
   if ($filetype == 'image/jpeg' or $filetype == 'image/png' or $filetype == 'image/gif' or $filetype == 'image/jpg' or $filetype == 'image/webp') {
      $bannerpath = "img/" . $banner;
      move_uploaded_file($_FILES["file"]["tmp_name"], $bannerpath);
      
      if ($result) {
         echo "<script>
					Swal.fire({
						title:'ບັນທຶກແລ້ວ',
						icon:'success',
						showConfirmButton:false,
					});
					window.setTimeout(function(){
						location.reload();
					},1500);
					</script>";
      } else {
         echo "ຫຼົ້ມເຫຼວ";
      }
   } else {
      echo "<script>
      Swal.fire(
      'ນາມສະກຸນຮູບຕ້ອງ .jpg !',
      'ກົດ OK ເພື່ດດຳເນີນການຕໍ່ !',
      'warning',
   )
   </script>";
   }
}


// <!-- ໂຄດເກົ່າ -->
//<?php
// session_start(); //1
// include('../connect_dbstock.php');
// $prod_id=$_POST['prod_id'];
// $prod_name=$_POST['prod_name'];
// $qty=$_POST['qty'];
// $cate_id=$_POST['cate_id'];
// $bprice=$_POST['bprice'];
// $sprice=$_POST['sprice'];
// $remark=$_POST['remark'];
// $user_id=$_SESSION["user_id"]; //2
//ຊື່ສິນຄ້າຄືກັນບໍ່ໃຫ້ບັນທຶກ
$sql=mysqli_query($connect,"select*from products where book_name='$prod_name';");
$check=mysqli_num_rows($sql);
//ລະຫັດສິນຄ້າກັນບໍ່ໃຫ້ບັນທ້ຶກຄຶືກັນ
$sql2=mysqli_query($connect,"select*from products where book_id='$prod_id';");
$check2=mysqli_num_rows($sql2);
if($check <> 0){
    echo"<script>
    Swal.fire({
        icon: 'error',
        text: 'ສິນຄ້າປະເພດນີ້ມີແລ້ວ',
        confirmButtonText:'ຕົກລົງ'
    })
        </script>";
}else if($check2 <> 0){
    echo"<script>
    swal.fire({
        icon:'error',
        text:'ລະຫັດສີິີນຄ້ານີ້ມີແລ້ວ',
        confirmButtonText:'ຕົກລົງ'
    })
    </script>";
}else{
   
    // ຄຳສັ່ງບັນທຶກຂໍ້ມູນເຂົ້າໄປໃນຕາຕະລາງ
    $swal=mysqli_query($connect,"insert into products(book_id,cate_id,book_name,img,authors,press,qty,bprice,sprice,remark,user_id)value
    ('$prod_id','$cate_id','$prod_name','$img','$authors','$press','$qty','$bprice','$sprice','$remark','$user_id');");
    if($swal){
        echo"<script>
        Swal.fire({
            icon: 'success',
            title: 'ບັນທຶກຂໍ້ມູນສຳເລັດ',
            showConfirmButton: 'false',
            timer: 2500
            })
            window.setTimeout(function(){
                // location.reload();
                location='select-products.php';
            },
            1500);
            </script>";
    }else{
        echo"ບັນທຶກຂໍ້ມູນລົ້ມເຫຼວ";
    }
}
?>