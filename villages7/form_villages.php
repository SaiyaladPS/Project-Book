<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ເມືອງ ແຂວງ</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
      <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
      <script src="../jquery.js"></script>
      <script>
        $(function(){
          $("#pro_id").change(function(){
              var pro_id=$("#pro_id").val();
              $.post("get_districts.php",{
                  pro_id:pro_id
              },
              function(output){
                  $("#dis_id").html(output);
              })
          })
      })
      </script>
      <script>
    
      $(function(){
          $("#send").click(function(){
              var dis_id=$('#dis_id').val();
              var dis_name=$('#dis_name').val();
              var pro_id=$('#pro_id').val();
              var vill_name=$('.vill_name').val();
              var remark=$('.remark').val();
              if(pro_id==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາເລືອກແຂວງ',
                  })
              }else if(dis_id==""){
                  swal.fire({
                      icon:'warning',
                      title:"ກະລຸນາເລືອກເມືອງ",
                      confirmButtonText:'ຕົກລົງ'
                  })
              }else if(vill_name==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນບ້ານ',
                  })
              }
              else{
                    $.post('insert_villages.php',{
                        dis_id:dis_id,
                        pro_id:pro_id,
                        dis_name:dis_name,
                        vill_name:vill_name,
                        remark:remark 
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-center text-light">
                        <h2>ຟອມບັນທືກຂໍ້ມູນບ້ານ</h2>
                        </div>
              
                <form action="">
                <div class="card-body">
                    <div class="form-group">
                    <label><b> ເລືຶອກແຂວງ</b></label>
                      <select id="pro_id" class='form-control'>
                      <option value="">ເລືຶອກແຂວງ</option>
                      <?php
                      include('../connect_dbstock.php');
                        $sql=mysqli_query($connect,"select*from provinces");
                        while($data=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$data['pro_id'];?>"><?=$data['pro_name'];?></option>
                            <?php
                        }
                      ?>
                      </select>
                       
                    </div>
                 
                    <div class="form-group">
                    <label><b> ເລືຶອກເມືອງ</b></label>
                      <select id="dis_id" class='form-control'>
                      <option value="">ເລືຶອກເມືອງ</option>
                      <?php
                      include('../connect_dbstock.php');
                        $sql=mysqli_query($connect,"select*from districts");
                        while($data=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$data['dis_id'];?>"><?=$data['dis_name'];?></option>
                            <?php
                        }
                      ?>
                      </select>
                       
                    </div>
                    <div class="form-group">
                        <label for="">ບ້ານ</label>
                        <input type="text"class="vill_name form-control"placeholder="ກະລຸນາປ້ອນບ້ານ...">
                    </div>
                    <div class="form-group">
                        <label for="">ໝາຍເຫດ</label>
                        <input type="text"class="remark form-control">
                    </div>
                    <div class="text-center">
                        <div class="form-group">
                            <button type="button"id="send"class="btn btn-outline-info"><i class='ion-android-download'></i> ບັນທຶກ</button>
                            <button type="reset"class="btn btn-outline-danger"><i class="fas fa-redo"></i> ລ້າງຂໍ້ມູນ</button>
                            <button type="submit" class="btn btn-outline-success" class="text-end"> <a href="select_villages.php"><i class='ion-android-arrow-forward'></i> back manu</a></button> 
                        </div>
                        <div class="show"></div>
                    </div>
                </div>
                </div>
                </form>
                <div class="card-footer bg-info"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
        </div>
</body>
</html>