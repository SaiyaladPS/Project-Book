<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ແກ້ໄຂ້ແຂວງ</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js" ></script>
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
    <script src="../jquery.js"></script>
    <script>
      $(function(){
        $("#send").click(function(){
              var pro_id=$('#pro_id').val();
              var pro_name=$('#pro_name').val();
              var remark=$('#remark').val();
              if(pro_name==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນຊື່ແຂວງ',
                  })
              }else{
                    $.post('save-provinces.php',{
                        pro_id:pro_id,
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
    <style>
        *{font-family:phetsarath ot;}
      
    </style>
</head>
<body>
<?php
    include('../Connect_dbstock.php');
        $pro_id=$_GET['pro_id'];
        $sql=mysqli_query($connect,"select*from provinces where pro_id='$pro_id';");
        $update=mysqli_fetch_array($sql);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                <div class="card-header bg-primary text-light text-center">
                    <h2><b>ຟອມແກ້ໄຂຂໍ້ມູນ</b></h2>
</div>
                <form action="save-provinces.php" method="post">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $update['pro_id']; ?>">
                        
                            <label for=""><b>ກະລຸນາປ້ອນຊື່ແຂວງ:</b></label>
                            <input type="text" name="pro_name" class="form-control" id="pro_name" placeholder="ກະລຸນາປ້ອນຊື່...." value="<?php echo $update['pro_name'];?>">
                            </div>
                            <div class="form-group">
                            <label for=""><b>ໝາຍເຫດ</b></label>
                            <input type="text" class="form-control" id="remark" name="remark" placeholder="ກະລຸນາປ້ອນໝາຍເຫດ......" value="<?php echo $update['remark'];?>">

                </div>
                        
                        <div class="text-center">
                                <div class="form-group" >
                                <button type="button" id="send" class="btn btn-outline-primary"><i class='ion-compose'>
                                </i> ບັນທຶກຂໍ້ມູນ</button>
                                <button type="reset" class="btn btn-outline-danger"><a href="select_provinces.php" ><i class='ion-forward'></i>ຍົກເລີກ</a></button>
                            </div>
                            
                            </div>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-md-2"></div>
            <div class="show"></div>
        </div>
    </div>
</body>
</html>