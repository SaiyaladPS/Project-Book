<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../jquery.js"></script>
<script>
    $(document).ready(function(){

        $("#send").click(function(){
            var vill_id=$("#vill_id").val();
            var dis_id=$("#dis_id").val();
            var pro_id=$("#pro_id").val();
            var vill_name=$("#vill_name").val();
            var remark=$(".remark").val();
            if(dis_id == ""){
                Swal.fire({
                    icon:'warning',
                    title:'ກະລຸນາປ້ອນເລືອກ (ເມຶອງ)',
                    ConfirmButton:'Ok',
                    ConfirmButtonColor:'#89e'
                })
            }else if(pro_id == ""){
                Swal.fire({
                    icon:'warning',
                    title:'ກະລຸນາປ້ອນເລືອກ (ແຂວງ)',
                    ConfirmButton:'Ok',
                    ConfirmButtonColor:'#89e'
                })
            }else if(vill_name == ""){
                Swal.fire({
                    icon:'warning',
                    title:'ກະລຸນາປ້ອນຊື່ (ບ້ານ)',
                    ConfirmButton:'Ok',
                    ConfirmButtonColor:'#89e'
                })
            }else{
                 $.post('Save-vill.php',{
                    vill_id: vill_id,
                    dis_id: dis_id,
                    pro_id: pro_id,
                    vill_name: vill_name,
                    remark: remark
                },function(res){
                    $(".show").html(res);
                })
            }
        })
  
    })
</script>
<script>
      $(function(){
            // ຄຳສັ່ງເລືອກແຂວງແລ້ວເມຶອງໃຈແຂວງນັ້ນມາສະແດງ auto ແລ້ວຈາກນັ້ນໃຫ້ເລືອກເອົາ
            $('#pro_id').change(function(){
                  var pro_id = $('#pro_id').val();
                  $.post("Get_districts.php",{
                        pro_id: pro_id
                  },
                  function(output){
                        $('#dis_id').html(output);
                  })
            })
      })
</script>
</head>
<style>
   *{font-family:phetsarath ot}
</style>
<body>
<?php
   include("../Connect_dbstock.php");
   $id = $_GET['vill_id'];
   $select=mysqli_query($connect,"select a.pro_name,b.dis_name,c.*from provinces as a,districts as b,villages as c
    where c.pro_id=a.pro_id and b.dis_id=c.dis_id and c.vill_id='$id'");
   $update=mysqli_fetch_array($select);
?>
<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-light text-center">
                    <h2>ຟອມແກ້ໄຂຂໍ້ມູນ</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <input type="hidden" value="<?=$update['vill_id']?>" id="vill_id">
                              <div class="form-group">
                                    <label for=""><b>ເລືອກແຂວງ</b></label>
                                    <select name="" id="pro_id" class="form-control">
                                        <option  value="<?php echo $update['pro_id'];?>"><?php echo $update['pro_name'];?></option>
                                          <?php
                                          include('../Connect_stock.php');
                                          $sql=mysqli_query($connect,"select*from provinces");
                                          while($data=mysqli_fetch_array($sql)){
                                          ?>
                                          <option value="<?=$data['pro_id'];?>"><?=$data['pro_name'];?></option>
                                          <?php
                                          }
                                          ?>
                                    </select>
                              </div>
                              <div class="form-goup">
                                    <label for=""><b>ຊື່ເມືອງ</b></label>
                                    <select name="" id="dis_id" class="form-control">
                                    <option  value="<?php echo $update['dis_id'];?>"><?php echo $update['dis_name'];?></option>
                                          <?php
                                          include('../Connect_stock.php');
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
                                    <label for=""><b>ຊື່ບ້ານ</b></label>
                                    <input type="text" id="vill_name" class="form-control" value="<?=$update['vill_name'];?>">
                              </div> 
                              <div class="form-group">
                                    <label for=""><b>ໝາຍເຫດ:</b></label>
                                    <textarea  class="form-control remark"><?= $update['remark'];?></textarea><br>
                              </div>
                              <div class="text-center">
                                    <a href="Select_villages.php" class="btn bg-dark text-light"><i class="ion-arrow-return-left"></i> ກັບຄືນ</a>
                                    <button type="button" id="send" class="btn bg-warning text-light"><i class="ion-edit"></i> ແກ້ໄຂ</button>
                              </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="show"></div>
    </div> 
</div> 
</body>
</html>
