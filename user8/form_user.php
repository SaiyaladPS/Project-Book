<!DOCTYPE html>
<?php
include("../Connect_dbstock.php");
// session_start();
// if (@$_SESSION['checked'] <> 1) {
//   echo "<script>alert('ກະລຸນາລ໋ອກອິນກ່ອນ');location='../index.php';</script>";
// } else {
// ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
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
          $("#dis_id").change(function(){
              var dis_id=$("#dis_id").val();
              $.post("get_vill.php",{
                  dis_id:dis_id
              },
              function(output){
                  $("#vill_id").html(output);
              })
          })
      })
      </script>
      <script>
      $(function(){
          $("#save").click(function(){
              var fname=$('#fname').val();
              var lname=$('#lname').val();
              var gender=$("input[id='gender']:checked").val();
              var dob=$('#dob').val();
              var tel=$('#tel').val();
              var pro_id=$('#pro_id').val();
              var dis_id=$('#dis_id').val();
              var vill_id=$('#vill_id').val();
              var status=$('#status').val();
              var username=$('#username').val();
              var password=$('#password').val();
              var confirm_password=$('#confirm_password').val();
              var remark=$('#remark').val();
              if(fname==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນຊື່',
                  })
                }else if(lname==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນນາມສະກຸນ',
                  })
                  }
              else if(gender==undefined){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາເລືອກເພດ',
                  })
              }
              else if(dob==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນວັນເດືອນປີເກີດ',
                  })
                }else if(tel==""){
                  swal.fire({
                      icon:'error',
                      text: 'ກະລຸນາປ້ອນເບີໂທ',
                  })
                }else if(pro_id==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາເລືອກແຂວງ',
                  })
                }else if(dis_id==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາເລືອກເມືອງ',
                  })
                }else if(vill_id==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາເລືອກບ້ານ',
                  })
                }else if(status==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາເລືອກສະຖານະຜູ້ໃຊ້ງານ',
                  })
                }else if(username==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ງານ',
                  })
                }else if(password==""){
                  swal.fire({
                      icon:'error',
                      text:'ກະລຸນາປ້ອນລະຫັດ',
                  })
                }else if(password !=confirm_password){
                  swal.fire({
                      icon:'error',
                      text:'ລະຫັດຢືນຢັນບໍ່ຖຶກຕ້ອງຕາມທີປ້ອນໄວ້',
                  })

            
              }else{
                    $.post('insert-user.php',{
                        fname:fname,
                        lname:lname,
                        gender:gender,
                        dob:dob,
                        tel:tel,
                        pro_id:pro_id,
                        dis_id:dis_id,
                        vill_id:vill_id,
                        status:status,
                        username:username,
                        password:password,
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
                        <h2>ຟອມບັນທຶກຂໍ້ມູນ</h2>
                    </div>
                    <form action="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for=""><b>ຊື່:</b></label>
                                <input type="text" id="fname" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່....">
                                </div>
                                <div class="form-group">
                                <label for=""><b>ນາມສະກຸນ:</b></label>
                                <input type="text" id="lname" class='form-control' placeholder='ກະລຸນາປ້ອນນາມສະກຸນ....'>
                                </div>
                                <div class="form-group">
                                <label for=""><b>ເລືອກເພດ:</b></label>
                                <input type="radio" name="gender" id="gender" value="ຍິງ">ຍິງ
                                <input type="radio" name="gender" id="gender" value="ຊາຍ">ຊາຍ
                                </div>
                                <div class="form-group">
                                <label for=""><b>ວັນເດືອນປີເກີດ</b></label>
                                <input type="date" id='dob' class='form-control'>
                                </div>
                                <div class="form-group">
                                <label for=""><b>ເບີໂທ:</b></label>
                                <input type="text" class='form-control' id='tel' placeholder='020xxxxx ຫຼື 030xxxxx'>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                    <label><b> ເລືຶອກບ້ານ</b></label>
                      <select id="vill_id" class='form-control'>
                      <option value="">ເລືຶອກບ້ານ</option>
                      <?php
                      include('../connect_dbstock.php');
                        $sql=mysqli_query($connect,"select*from villages");
                        while($data=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$data['vill_id'];?>"><?=$data['vill_name'];?></option>
                            <?php
                        }
                      ?>
                      </select>
                       
                    </div>
                            <div class="form-group">
                                    <label for=""><b> ສະຖານະຜູ້ໃຊ້</b></label>
                                    <select name="" id="status" class='form-control'>
                                    <option value="">ເລືອກສະຖານະຜູ້ໃຊ້</option>
                                    <option value="ຜູ້ບໍລິຫານ">ຜູ້ບໍລິຫານ</option>
                                    <option value="ພະນັກງານ">ພະນັກງານ</option>
                                    </select>
                            </div>
                        </div>
                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""><b>ຊື່ຜູ້ນໍາໃຊ້</b></label>
                                            <input type="text" value="" id="username"class="form-control"placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ນໍາໃຊ້">
                                        </div>

                                        <div class="form-group">
                                            <label for=""><b>ລະຫັດຜ່ານ</b></label>
                                            <input type="password" value="" id="password" class="form-control"placeholder="ປ້ອນລະຫັດຜ່ານ">
                                        </div>

                                        <div class="form-group">
                                            <label for=""><b>ຢືນຢັນລະຫັດຜ່ານ</b></label>
                                            <input type="password" value="" id="confirm_password"class="form-control"placeholder="ຢືນຢັນລະຫັດຜ່ານ">
                                        </div>

                                            <div class="form-group">
                                            <label><b>ໝາຍເຫດ</b></label>
                                            <textarea id="remark" class="form-control"></textarea>
                                            </div>
                                         </div>
                                    </div>
                              </div>
                                        <div class="form-group">
                                        <center> <button type='button' id='save' class='btn bg-primary text-light'> <i class='fas fa-save'> </i> ບັນທຶກ</button>
                                            <button type='reset' class='btn bg-danger text-light'><i class="fas fa-redo-alt fa-spin"></i> ລ້າງຂໍ້ມູນ</button></center> 
                                    </div>
                                          </div>
                                    
                <div class="card-footer bg-info text-center">
               
                <div id='show'></div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    </form>
</body>
</html>
<?php
//}
?>