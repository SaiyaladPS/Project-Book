<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Form</title>
      <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../jquery.js"></script>
    <style>
      *{font-family:phetsarath ot}
    </style>
<script>
      $(function(){
            // ຄຳສັ່ງເລືອກແຂວງແລ້ວເມຶອງໃຈແຂວງນັ້ນມາສະແດງ auto ແລ້ວຈາກນັ້ນໃຫ້ເລືອກເອົາ
            $('#pro_id').change(function(){
                  var pro_id = $('#pro_id').val();
                  $.post("../villages/Get_districts.php",{
                        pro_id: pro_id
                  },
                  function(output){
                        $('#dis_id').html(output);
                  })
            });
            // ຄຳສັ່ງໃຫ້ບ້ານໃນເມືອງນັ້ນມາສະແດງ auto
            $('#dis_id').change(function(){
                  var dis_id = $('#dis_id').val();
                  $.post("Get_villages.php",{
                        dis_id: dis_id
                  },
                  function(output){
                        $('#vill_id').html(output);
                  })
            })
      })
</script>
<script>
      $(function(){
            $('#send').click(function(){
                  var user_id = $('#user_id').val();
                  var pro_id = $('#pro_id').val();
                  var dis_id = $('#dis_id').val();
                  var vill_id = $('#vill_id').val();
                  var status = $('#status').val();
                  var fname = $('#fname').val();
                  var lname = $('#lname').val();
                  var gender = $("input[id='gender']:checked").val();
                  var dob = $('#dob').val();
                  var tel = $('#tel').val();
                  var username = $('#username').val();
                  var password = $('#password').val();
                  var confirm = $('#confirm').val();
                  var remark = $('#remark').val();
                   if(fname==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ປ້ອນຊື່',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາປ້ອນ (ຊື່)</a>'
                    })
                  }else if(lname==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ປ້ອນນາມສະກຸນ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາປ້ອນ (ນາມສະກຸນ)</a>'
                    })
                  }else if(gender==undefined){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ເລືອກເພດ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາເລືອກ (ເພດ)</a>'
                    })
                  }else if(dob==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ປ້ອນວັນເດືອນປີເກີດ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາປ້ອນ (ວັນເດຶອນປີເກີດ)</a>'
                    })
                  }else if(tel==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ປ້ອນເບີໂທ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາປ້ອນ (ເບີໂທ)</a>'
                    })
                  }else if(pro_id==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ເລືອກແຂວງ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາເລືອກ (ແຂວງ)</a>'
                    })
                  }else if(dis_id==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ເລືອກເມືອງ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາເລືອກ (ເມືອງ)</a>'
                    })
                  }else if(vill_id==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ເລືອກບ້ານ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາເລືອກ (ບ້ານ)</a>'
                    })
                  }else if(status==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ເລືອກສະຖານະ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາເລືອກ (ສະຖານະ)</a>'
                    })
                  }else if(username==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ປ້ອນຊື່ຜູ້ນຳໃຊ້ (User)',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາປ້ອນ (ຊື່ຜຸ້ນຳໃຊ້)</a>'
                    })
                  }else if(password==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ປ້ອນລະຫັດຜ່ານ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາປ້ອນ (ລະຫັດຜ່ານ)</a>'
                    })
                  }else if(confirm==""){
                        swal.fire({
                        icon: 'warning',
                        title: 'ບໍ່ໄດ້ປ້ອນລະຫັດຢືນຢັນ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາປ້ອນ (ຢືນຢັນລະຫັດຜ່ານ)</a>'
                    })
                  }else if(password != confirm){
                        swal.fire({
                        icon: 'error',
                        title: 'ຢືນຢັນລະຫັດຜ່ານບໍ່ບໍ່ຖືກຕ້ອງ',
                        showConfirmButton:false,
                        timer:1500,
                        footer:'<a href="">ກະລຸນາຢືນຢັນ (ລະຫັດຜ່ານໃຫ້ຖືກຕ້ອງ)</a>'
                    })
                  }else{
                        $.post("Save-user.php",{
                              user_id: user_id,
                              pro_id: pro_id,
                              dis_id: dis_id,
                              vill_id: vill_id,
                              status: status,
                              fname: fname,
                              lname: lname,
                              gender: gender,
                              dob: dob,
                              tel: tel,
                              username: username,
                              password: password,
                              remark: remark
                        },
                        function(output){
                              $('.show').html(output)
                        });
                  }
            })
            })
</script>
</head>
<body>
<?php
   include("../Connect_dbstock.php");
   $id=$_GET['user_id'];
   $select=mysqli_query($connect,"select a.pro_name,b.dis_name,c.vill_name,d.*from provinces as a,
   districts as b,villages as c,users as d
    where d.pro_id=a.pro_id and b.dis_id=d.dis_id and c.vill_id=d.vill_id and d.user_id='$id' ");
   $update=mysqli_fetch_array($select);
?>
      <div class="container">
            <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                        <div class="card">
                              <form action="">
                                    <div class="card-header bg-primary text-warning text-center">
                                          <h2><b>ຕາຕະລາງຜູ້ໃຊ້</b></h2>
                                    </div>
                                    <div class="card-body">
                                          <form action="">
                                          <div class="row">
                                                <div class="col-md-4">
                                                <input type="hidden" value="<?=$update['user_id'];?>" id="user_id">
                                                      <div class="form-group">
                                                            <label for=""><b>ຊື່:</b></label>
                                                            <input type="text" id="fname" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່"
                                                            value="<?=$update['fname'];?>">
                                                      </div>
                                                      <div class="form-group">
                                                            <label for=""><b>ນາມສະກູນ:</b></label>
                                                            <input type="text" id="lname" class="form-control" placeholder="ກະລຸນາປ້ອນນາມສະກູນ"
                                                            value="<?=$update['lname'];?>">
                                                      </div>
                                                      <div class="form-group">
                                                            <b>ເລືອກເພດ:</b>
                                                            <input type="radio" name="gender" id="gender" value="ຊາຍ"
                                                             <?php if($update['gender']=='ຊາຍ' || $update['gender']=='Male'){
                                                            echo "checked";}?>><b>ຊາຍ</b> &ensp;
                                                            <input type="radio" name="gender" id="gender" value="ຍິງ" 
                                                            <?php if($update['gender']=='ຍິງ' || $update['gender']=='Female'){
                                                             echo "checked";}?>><b>ຍິງ</b>
                                                      </div>
                                                      <div class="form-group">
                                                            <label for=""><b>ວັນເດືອນປີເກີດ:</b></label>
                                                            <input type="date" id="dob" class="form-control"   value="<?=$update['dob'];?>">
                                                      </div>
                                                      <div class="form-group">
                                                            <label for=""><b>ເບີໂທ:</b></label>
                                                            <input type="text"id="tel" class="form-control" placeholder="020 xxxxxxxx"  value="<?=$update['tel'];?>">
                                                      </div>
                                                </div>
                                                <div class="col-md-4">
                                                      <div class="form-group">
                                                            <label for=""><b>ຊື່ແຂວງ:</b></label>
                                                            <select name="" id="pro_id" class="form-control">
                                                                  <option value="<?=$update['pro_id'];?>"><?=$update['pro_name'];?></option>
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
                                                            <label for=""><b>ຊື່ເມືອງ:</b></label>
                                                            <select name="" id="dis_id" class="form-control">
                                                                  <option value="<?=$update['dis_id'];?>"><?=$update['dis_name'];?></option>
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
                                                      <div class="form-goup">
                                                            <label for=""><b>ຊື່ບ້ານ:</b></label>
                                                            <select id="vill_id" class="form-control">
                                                                  <option value="<?=$update['vill_id'];?>"><?=$update['vill_name'];?></option>
                                                                  <?php
                                                                  include('../Connect_stock.php');
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
                                                            <label for="">ສະຖານະນຳໃຊ້:</label>
                                                            <select id="status" class="form-control">
                                                                  <option value="<?=$update['user_id'];?>"><?=$update['status'];?></option>
                                                                  <option value="ຜູ້ບໍລິຫານ">ຜູ້ບໍລິຫານ</option>
                                                                  <option value="ພະນັກງານ">ພະນັກງານ</option>
                                                                  
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="col-md-4">
                                                      <div class="form-group">
                                                            <label for=""><b>ຊື່ຜູ້ນຳໃຊ້:</b></label>
                                                            <input type="text" id="username" class="form-control" placeholder="ປ້ອນຊື່ຜູ້ນຳໃຊ້ (User)"
                                                            value="<?=$update['username'];?>">
                                                      </div>
                                                      <div class="form-group">
                                                            <label for=""><b>ລະຫັດຜ່ານ:</b></label>
                                                            <input type="password" id="password" class="form-control" placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ"
                                                            value="<?=$update['password'];?>">
                                                      </div>
                                                      <div class="form-group">
                                                            <label for=""><b>ຢືນຢັນລະຫັດຜ່ານ:</b></label>
                                                            <input type="password" id="confirm" class="form-control"  placeholder="ກະລຸນາຢືນຢັນລະຫັດຜ່ານ"
                                                            value="<?=$update['password'];?>">
                                                      </div>
                                                      <div class="form-group">
                                                            <label for=""><b>ໝາຍເຫດ:</b></label>
                                                            <textarea id="remark" class="form-control"><?=$update['remark'];?></textarea>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="card-footer text-center">
                                          <button type="button" id="send" class="btn btn-outline-primary"><i class="ion-edit"></i> ແກ້ໄຂ</button>
                                          <a href="Select_users.php" class="btn btn-outline-success"><i class="ion-eye"></i> ເບິ່ງຂໍ້ມູນ</a>
                                    </div>
                              </form>
                              <div class="show"></div>
                        </div>
                  </div>
                  <div class="col-md-2"></div>
            </div>
      </div>
</body>
</html>