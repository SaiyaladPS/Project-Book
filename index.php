<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ປ້ອນລະຫັດຜ່ານ</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/css/all.min.css">
      <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="Ionicons/css/ionicons.css">
      <script src="jquery.js"></script>
      <script>
      $(function(){
          $("#login").click(function(){
              var username=$('.username').val();
              var password=$('.password').val();
              if(username==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນຊື່ຜູ້ນໍາໃຊ້',
                  })
                }
              else if(password==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນລະຫັດລະຫັດຜ່ານ',
                  })
              }else{
                    $.post('check_user.php',{
                        username:username,
                        password:password 
                    },
                    function(output){
                        $('.show').html(output);
            })
                    }
                  
              
          })
      })
      </script>
      <style>
    *{
        font-family:phetsarath ot;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-center text-light">
                        <h2>ຟອມເຂົ້າສູ່ລະບົບ</h2>
                        </div>
              
                <form action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><i class="fas fa-user text-warning"></i> ຊື່ຜຸ້ນໍາໃຊ້</label>
                        <input type="text"class="username form-control"placeholder="ກະລຸນາປ້ອນຊືຜູ້ນໍາໃຊ້...">
                    </div><br>
                    <div class="form-group">
                        <label for=""><i class="fas fa-lock text-info"></i> ລະຫັດຜ່ານ</label>
                        <input type="password"class="password form-control"placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ">
                    </div><br>
                    <div class="text-center">
                        <div class="form-group">
                            <button type="button"id="login"class="btn btn-outline-info"><i class='fas fa-sign-in-alt'></i>ເຂົ້າສູ່ລະບົບ</button>
                            <button type="reset"class="btn btn-outline-danger"><i class="fas fa-redo"></i> ລ້າງຂໍ້ມູນ</button>
                        </div>
                        <div class="show" name=""></div>
                    </div>
                </div>
                </div>
                </form>
                <div class="card-footer bg-warning"></div>
            </div>
            <div class="col-md-3"></div>
        </div>
        </div>
</body>
</html>