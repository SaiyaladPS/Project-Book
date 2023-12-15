<!DOCTYPE html>
<?php
include("../Connect_dbstock.php");
session_start();
if (@$_SESSION['checked'] <> 1) {
  echo "<script>alert('ກະລຸນາລ໋ອກອິນກ່ອນ');location='../index.php';</script>";
} else {
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ຕາຕະລາງນໍາເຂົ້າ</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
      <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
      <script src="../jquery.js"></script>
</head>
<style>
*{
    font-family:phetsarath ot;
}
</style>
<script>
      $(function(){
          $("#save").click(function(){
              var prod_id=$('#prod_id').val();
              var r_bprice=$('#r_bprice').val();
              var r_qty=$('#r_qty').val();
              var r_amount=$('#r_amount').val();
              var remark=$('#remark').val();
              
              if(prod_id==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນລະຫັດສີນຄ້າ',
                  })
              }else if(r_qty==""){
                  swal.fire({
                      icon:'warning',
                      text:'ກະລຸນາປ້ອນຈໍານວນ'
                  })
              }
              else{
                    $.post('insert_receives.php',{
                        prod_id:prod_id,
                        r_bprice:r_bprice,
                        r_qty:r_qty,
                        r_amount:r_amount,
                        remark:remark 
                    },
                    function(output){
                        $('.show').html(output);
            })
                    }
                  
              
          })
      })
      </script>
<script>
$(function(){
    $('#prod_id').keyup(function(){
        var prod_id =$('#prod_id').val();
        $.post('get_prod_name.php',{
            prod_id:prod_id
        },
        function(output){
            //ສະແດງຊື່ສິນຄ້າອັດຕະໂນມັດ
            $("#prod_name").val(output); //ສະແດງແທນການປ້ອນ
        })
    })
})
</script>
<script>
$(function(){
    $('#prod_id').keyup(function(){
        var prod_id =$('#prod_id').val();
        $.post('get_bprice.php',{
            prod_id:prod_id
        },
        function(output){
            //ສະແດງຊື່ສິນຄ້າອັດຕະໂນມັດ
            $("#r_bprice").val(output); //ສະແດງແທນການປ້ອນ
        })
    })
    //ຄໍາສັັ້ງເອົາລາຄາຊື່ ກັບ ຈໍານວນ ມາຄູນກັນ
    $("#r_qty").keyup(function(){
        var r_bprice = parseInt($('#r_bprice').val());        // parseInt ແມ່ນຕົວເລກຖ້ວນ
        var r_qty = parseInt($('#r_qty').val());
        var r_amount = parseFloat(r_bprice * r_qty) ||0;     //parseFloat ເລກທົດສະນິຍົມ
        $('#r_amount').val(r_amount);                        //#amount selector ຂອງເງິນລວມ
    })
})
</script>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-light bg-success">
                <h3><b>ບັນທຶກຂໍ້ມູນສິນຄ້ານໍາເຂົ້າ</b> </h3></div>
               <form action="">
               <div class="card-body">
               <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label><b>ລະຫັດສິນຄ້າ</b> </label>
                        <input type="text-light" id="prod_id" class='form-control' placeholder="ກະລຸນາປ້ອນລະຫັດສິນຄ້າ...">
                    </div>
                    
                    <div class="form-group">
                        <label><b> ຊື້ສິນຄ້າ</b></label>
                        <input type="text" id="prod_name"class='form-control' placeholder="ກະລຸນາປ້ອນລະຫັດສິນຄ້າກ່ອນ!" readonly>
                    </div>
                    <div class="form-group">
                        <label><b> ລາຄາຊື້</b></label>
                     <input type="number" id="r_bprice"class="form-control" placeholder="ກະລຸນາປ້ອນລະຫັດສິນຄ້າກ່ອນ!" readonly>
                    </div>
               </div>
               <div class="col-md-6">
              
                         <div class="form-group">
                        <label><b>ຈໍານວນ</b></label>
                        <input type="text" id="r_qty" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນຈໍານວນ...">
                    </div>
                    <div class="form-group">
                        <label><b>ເງິນລວມ</b></label>
                        <input type="number"id="r_amount"class='form-control' placeholder="ກະລຸນາປ້ອນຈໍານວນນໍາເຂົ້າກ່ອນ!" readonly>
                  </div>
                     <div class="form-group">
                        <label><b>ໝາຍເຫດ</b></label>
                        <input type="text" id="remark" class='form-control'>
                    </div>
                     
                
                   
               </div>
                       
               </div>
               <div class="text-center">
               <button type="button" class="btn btn-outline-primary"id="save"><i class="fas fa-save"></i>ບັນທຶກ</button>&emsp;&emsp;
                            <button type="reset" class="btn btn-outline-danger"><i class="fas fa-redo-alt fa-spin"></i>ລ້າງຂໍ້ມູນ</button>&emsp;&emsp;
                            <button type="submit" class="btn btn-outline-success" class="text-end"> <a href="select-receives.php">
                            <i class='ion-android-arrow-forward'></i>ເບິງເມນູ</a></button> 
                            </div>
                            <div class="show"></div>
                            </div>
               </div>
              
               <div class="card-footer text-center">
              
                           
               </div>
               </div>
            </div>
            </div>
            </form>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>
<?php
}
?>