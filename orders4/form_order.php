<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ຕາຕະລາງຂາຍອອກ</title>
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
              var o_sprice=$('#o_sprice').val();
              var o_qty=$('#o_qty').val();
              var o_amount=$('#o_amount').val();
              var remark=$('#remark').val();
              
              if(prod_id==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນລະຫັດສີນຄ້າ',
                  })
              }else if(o_qty==""){
                  swal.fire({
                      icon:'warning',
                      text:'ກະລຸນາປ້ອນຈໍານວນ'
                  })
              }
              else{
                    $.post('insert_orders.php',{
                        prod_id:prod_id,
                        o_sprice:o_sprice,
                        o_qty:o_qty,
                        o_amount:o_amount,
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
        $.post('get_sprice.php',{
            prod_id:prod_id
        },
        function(output){
            //ສະແດງຊື່ສິນຄ້າອັດຕະໂນມັດ
            $("#o_sprice").val(output); //ສະແດງແທນການປ້ອນ
        })
    })
    //ຄໍາສັັ້ງເອົາລາຄາຊື່ ກັບ ຈໍານວນ ມາຄູນກັນ
    $("#o_qty").keyup(function(){
        var o_sprice = parseInt($('#o_sprice').val());        // parseInt ແມ່ນຕົວເລກຖ້ວນ
        var o_qty = parseInt($('#o_qty').val());
        var o_amount = parseFloat(o_sprice * o_qty) ||0;     //parseFloat ເລກທົດສະນິຍົມ
        $('#o_amount').val(o_amount);                        //#amount selector ຂອງເງິນລວມ
    })
})
</script>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-light bg-secondary ">
                <h3><b>ບັນທຶກຂໍ້ມູນສິນຄ້າຂາຍອອກ</b> </h3></div>
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
                        <label><b> ລາຄາຂາຍ</b></label>
                     <input type="number" id="o_sprice"class="form-control" placeholder="ກະລຸນາປ້ອນລະຫັດສິນຄ້າກ່ອນ!" readonly>
                    </div>
               </div>
               <div class="col-md-6">
              
                         <div class="form-group">
                        <label><b>ຈໍານວນ</b></label>
                        <input type="text" id="o_qty" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນຈໍານວນ...">
                    </div>
                    <div class="form-group">
                        <label><b>ເງິນລວມ</b></label>
                        <input type="number"id="o_amount"class='form-control' placeholder="ກະລຸນາປ້ອນຈໍານວນນໍາເຂົ້າກ່ອນ!" readonly>
                  </div>
                     <div class="form-group">
                        <label><b>ໝາຍເຫດ</b></label>
                        <input type="text" id="remark" class='form-control'>
                    </div>
                     
                
                   
               </div>
                       
               </div>
               <div class="text-center mt-3">
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