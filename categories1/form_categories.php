<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gategories</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
      <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
      <script src="../jquery.js"></script>
      <script>
      $(function(){
          $("#send").click(function(){
              var cate_name=$('.cate_name').val();
              var remark=$('.remark').val();
              if(cate_name==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນປະເພດສີນຄ້າ',
                  })
              }else{
                    $.post('insert_categories.php',{
                        cate_name:cate_name,
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
                    <div class="card-header bg-success text-center text-light">
                        <h2>ຟອມບັນທຶກສິນຄ້າ</h2>
                        </div>
              
                <form action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">ປະເພດສິນຄ້າ</label>
                        <input type="text"class="cate_name form-control"placeholder="ກະລຸນາປ້ອນຊື...">
                    </div>
                    <div class="form-group">
                        <label for="">ໝາຍເຫດ</label>
                        <input type="text"class="remark form-control"placeholder="ກະລຸນາປ້ອນໝາຍເຫດ...">
                    </div>
                    <div class="text-center">
                        <div class="form-group">
                            <button type="button"id="send"class="btn btn-outline-info"><i class='ion-android-download'></i> ບັນທຶກ</button>
                            <button type="reset"class="btn btn-outline-danger"><i class="fas fa-redo"></i> ລ້າງຂໍ້ມູນ</button>
                            <button type="submit" class="btn btn-outline-success" class="text-end"> <a href="select-categories.php"><i class='ion-android-arrow-forward'></i> back manu</a></button> 
                        </div>
                        <div class="show" name="show"></div>
                    </div>
                </div>
                </div>
                </form>
                <div class="card-footer bg-warning"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
        </div>
</body>
</html>