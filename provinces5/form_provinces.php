<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_provinces</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
      <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
      <script src="../jquery.js"></script>
      <script>
      $(function(){
          $("#send").click(function(){
              var pro_name=$('.pro_name').val();
              var remark=$('.remark').val();
              if(pro_name==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນຊື່ແຂວງ',
                  })
              }else{
                    $.post('insert_provinces.php',{
                        pro_name:pro_name,
                        remark:remark 
                    },
                    function(output){
                        $('.show').html(output);
            })
                    }
                  
              
          })
      })
      </script>
</head>
<style>
    *{
        font-family:phetsarath ot;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-center text-light">
                        <h2>ຟອມບັນທຶກຂໍ້ມູນແຂວງ</h2>
                        </div>
              
                <form action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">ຊື່ແຂວງ</label>
                        <input type="text"class="pro_name form-control"placeholder="ກະລຸນາປ້ອນຊືແຂວງ...">
                    </div>
                    <div class="form-group">
                        <label for="">ໝາຍເຫດ</label>
                        <input type="text"class="remark form-control"placeholder="ກະລຸນາປ້ອນໝາຍເຫດ...">
                    </div>
                    <div class="text-center">
                        <div class="form-group">
                            <button type="button"id="send"class="btn btn-outline-success"><i class='ion-android-download'></i> ບັນທຶກ</button>
                            <button type="reset"class="btn btn-outline-danger"><i class="fas fa-redo"></i> ລ້າງຂໍ້ມູນ</button>
                            <button type="button" class="btn btn-outline-info" > <a href="select_provinces.php"><i class='ion-android-arrow-forward'></i> back manu</a></button> 
                        </div>
                        <div class="show" name="show"></div>
                    </div>
                </div>
                </div>
                </form>
                <div class="card-footer bg-primary"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
        </div>
</body>
</html>