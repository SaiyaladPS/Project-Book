<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docu</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jquery.js"></script>
    <style>
        *{
            font-family:phetsarath ot;
        }
    </style>
    <script>
        $(function(){
            $("#send").click(function(){
                var dis_name=$("#dis_name").val();
                var pro_name=$("#pro_name").val();
                var remark=$("#remark").val();
                var pro_id=$("#pro_id").val();
                var dis_id=$("#dis_id").val();
                if(dis_name==""){
                    swal.fire({
                        icon:'warning',
                        text:'ກະລຸນາເລືອກແຂວງ',
                        confirmButtonText:'ຕົກລົງ'
                    })
                
                }else if(pro_id==""){
                    swal.fire({
                        icon:'warning',
                        text:'ກະລຸນາປ້ອນເມືອງ',
                        confirmButtonText:'ຕົກລົງ'
                    })
                }else{
                    $.post("save_dis.php",{
                        dis_id:dis_id,
                        pro_id:pro_id,
                        dis_name:dis_name,
                        pro_name:pro_name,
                        remark:remark
                       
                      
                    },
                    function(output){
                        $(".show").html(output);
                    }
                    )
                }
            })
        })
    </script>
</head>
<body>
    <?php
    include("../connect_dbstock.php");
    $dis_id=$_GET['dis_id'];
    $sql=mysqli_query($connect,"select a.*,b.pro_id,b.pro_name from districts as a,provinces as b where a.pro_id=b.pro_id and dis_id='$dis_id';");
    $update=mysqli_fetch_array($sql);
    ?>
    <div class="container-flude">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-light text-center bg-danger">ຟອມບັນທຶກເມືອງ</div>
                    <div class="card-body">
                        <form action="">
                        <div class="form-group">
                            <input type="hidden" id="dis_id" value="<?php echo$update['dis_id'];?>">
                            <label for="">ແຂວງ</label>
                            <select id="pro_id" class="form-control">
                                <option  value="<?php echo$update['pro_id'];?>"><?php echo$update['pro_name'];?></option>
                                <?php
                                    include("../connect_dbstock.php");
                                    $ss=mysqli_query($connect,"select*from provinces;");
                                    while($data=mysqli_fetch_array($ss)){
                                    ?>
                                    <option value="<?php echo$data['pro_id'];?>"><?php echo$data['pro_name'];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">ຊື່ເມືອງ</label>
                            <input type="text" class="form-control" id="dis_name" placeholder="ກະລຸນາປ້ອນຊື່ເມືອງ" value="<?php echo$update['dis_name'];?>">
                            
                        </div>
                        <div class="form-group">
                            <label for="">ໝາຍເຫດ</label>
                            <input type="text" class="form-control" id="remark" value="<?php echo$update['remark'];?>">
                        </div>
                    </div>
                    <div class="card-footer text-center ">
                        <button type="button" class="btn btn-primary" id="send">ບັນທຶກ</button>
                        <button type="reset" class="btn btn-danger">ລົບ</button>
                       <div class="show"></div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>