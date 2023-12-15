<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js" ></script>
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
    <script src="../jquery.js"></script>
    <script>
      $(function(){
        $("#send").click(function(){
              var cate_id=$('#cate_id').val();
              var cate_name=$('#cate_name').val();
              var remark=$('#remark').val();
              if(cate_name==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນປະເພດສີນຄ້າ',
                  })
              }else{
                    $.post('save-categories.php',{
                        cate_id:cate_id,
                        cate_name:cate_name,
                        remark:remark 
                    },
                    function(output){
                        $('#show').html(output);
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
        $cate_id=$_GET['cate_id'];
        $sql=mysqli_query($connect,"select*from categories where cate_id='$cate_id';");
        $update=mysqli_fetch_array($sql);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                <div class="card-header bg-primary text-light text-center">
                    <h2><b>ຟອມບັນທຶກແກ້ໄຂຂໍ້ມູນ</b></h2>
</div>
                <form action="save-categories.php" method="post">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $update['cate_id']; ?>">
                            <label for=""><b>ຊື່ປະເພດສິນຄ້າ:</b></label>
                            <input type="text" name="cate_name" class="form-control" id="cate_name" placeholder="ກະລຸນາປ້ອນຊື່ປະເພດສິນຄ້າ...." value="<?php echo $update['cate_name'];?>">
                            </div>
                            <div class="form-group">
                            <label for=""><b>ໝາຍເຫດ</b></label>
                            <input type="text" class="form-control" id="remark" name="remark" placeholder="ກະລຸນາປ້ອນໝາຍເຫດ......"value="<?php echo $update['remark'];?>">

                </div>
                        </div>
                        <div class="text-center">
                                <div class="form-group" >
                                <button type="button" id="send" class="btn btn-outline-primary"><i class='ion-compose'>
                                </i> ບັນທຶກຂໍ້ມູນ</button>
                                <button type="submit" class="btn btn-outline-danger"><a href="select-categories.php" ><i class='ion-forward'></i>ຍົກເລີກ</a></button>
                            </div>
                            <div id="show"></div>
                            
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>