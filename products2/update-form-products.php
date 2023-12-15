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
    $(document).ready(function() {
        $("#send").click(function() {
            var id = $("#id").val();
            var prod_id = $(".prod_id").val();
            var prod_name = $(".prod_name").val();
            var qty = $(".qty").val();
            var cate_id = $(".cate_id").val();
            var bprice = $(".bprice").val();
            var sprice = $(".sprice").val();
            var remark = $(".remark").val();
            if (prod_id == "") {
                swal.fire({
                    icon: 'warning',
                    title: 'ບາງຢ່າງຜິດພາດ',
                    showConfirmButton: false,
                    timer: 2000,
                    footer: '<a href="">ກະລຸນາປ້ອນລະຫັດສິນຄ້າ</a>'
                })
            } else if (prod_name == "") {
                swal.fire({
                    icon: 'warning',
                    title: 'ບາງຢ່າຜິດພາດ',
                    showConfirmButton: false,
                    timer: 2000,
                    footer: '<a href="">ກະລຸນາປ້ອນຊື່ສິນຄ້າ</a>'
                })
            } else if (qty == "") {
                swal.fire({
                    icon: 'warning',
                    title: 'ບາງຢ່າງຜິດພາດ',
                    showConfirmButton: false,
                    timer: 2000,
                    footer: '<a href="">ກະລຸນາປ້ອນຈຳນວນສິນຄ້າ</a>'
                })
            } else if (cate_id == "") {
                swal.fire({
                    icon: 'warning',
                    title: 'ບາງຢ່າງຜິດພາດ',
                    showConfirmButton: false,
                    timer: 2000,
                    footer: '<a href="">ກະລຸນາເລືອກປະເພດສິນຄ້າ</a>'
                })
            } else if (bprice == "") {
                swal.fire({
                    icon: 'warning',
                    title: 'ບາງຢ່າງຜິດພາດ',
                    showConfirmButton: false,
                    timer: 2000,
                    footer: '<a href="">ກະລຸນາປ້ອນລາຄາຊື້</a>'
                })
            } else if (sprice == "") {
                swal.fire({
                    icon: 'warning',
                    title: 'ບາງຢ່າງຜິດພາດ',
                    showConfirmButton: false,
                    timer: 2000,
                    footer: '<a href="">ກະລຸນາປ້ອນລາຄາຂາຍ</a>'
                })
            } else {
                $.post('Save-products.php', {
                    id: id,
                    prod_id: prod_id,
                    prod_name: prod_name,
                    qty: qty,
                    cate_id: cate_id,
                    bprice: bprice,
                    sprice: sprice,
                    remark: remark
                }, function(res) {
                    $(".show").html(res);
                })
            }

        })

    })
    </script>
</head>
<style>
* {
    font-family: phetsarath ot
}

/* input::placeholder,
textarea{
    color: green !important;
    opacity: 1;
}
input,
textarea{
    background-color: lightblue !important;
    border: 2px solid blue !important;
}
textarea{
 overflow: hidden;
}
.card{
    border: 3px solid blue !important;
} */

/* } */

input,
textarea,
select {
    border: 2px solid black !important;
}
</style>

<body>
    <?php
   include("../Connect_dbstock.php");
   $id = $_GET['prod_id'];
   $select=mysqli_query($connect,"select a.*,b.cate_name from products as a,categories as b where a.cate_id=b.cate_id and book_id='$id'");
   $update=mysqli_fetch_array($select);
   
   ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container">
                <div class="card-header bg-warning text-light text-center">
                    <h3>ຟອມແກ້ໄຂຂໍ້ມູນ</h3>
                </div>
                <div class="card">
                    <div class="card-body text-info ">
                        <form method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="hidden" value="<?=$update['book_id']?>" prod_id="prod_id">
                                    <div class="form-group">
                                        <input type="hidden" id="id" value="<?php echo$update['book_id'];?>">
                                        <label for=""><b>ລະຫັດສິນຄ້າ:</b></label><br>
                                        <input type="text" class="from-control prod_id"
                                            placeholder="ກະລຸນາປ້ອນລະຫັດສິນຄ້າ" value="<?= $update['book_id'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>ຊື່ສິນຄ້າ:</b></label><br>
                                        <input type="text" class="from-control prod_name"
                                            placeholder="ກະລຸນາປ້ອນຊື່ສິນຄ້າ" value="<?= $update['book_name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>ຈຳນວນ:</b></label><br>
                                        <input type="number" class="from-control qty" placeholder="ກະລຸນາປ້ອນຈຳນວນ"
                                            value="<?= $update['qty'];?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label><b>ປະເພດສິນຄ້າ:<b></label>
                                        <select class="form-control cate_id">
                                            <option value="<?php echo $update['cate_id'];?>">
                                                <?php echo $update['cate_name'];?></option>
                                            <?php 
                                        include("../Connect_dbstock.php");
                                        $sql = mysqli_query($connect,"select*from categories");
                                        while($updateu = mysqli_fetch_array($sql)){ ?>
                                            <option value="<?= $updateu['cate_id'] ?>"><?= $updateu['cate_name'] ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b>ລາຄາຊື້:</b></label><br>
                                        <input type="number" class="from-control bprice" placeholder="ກະລຸນາປ້ອນລາຄາຊື້"
                                            value="<?= $update['bprice'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>ລາຄາຂາຍ:</b></label><br>
                                        <input type="number" class="from-control sprice" placeholder="ກະລຸນາປ້ອນລາຄາຂາຍ"
                                            value="<?= $update['sprice'];?>">
                                    </div>
                                </div>


                            </div>
                    </div>
                    <div class="form-group text-center">
                        <label for=""><b>ໝາຍເຫດ:</b></label>
                        <textarea class="form-control remark"><?= $update['remark'];?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="button" id="send" class="btn bg-warning text-light"><i
                                class="ion-edit"></i>ບັນທຶກຂໍ້ມູນ</button>
                        <a href="form_search_products.php" class="btn bg-danger text-light"><i
                                class="ion-arrow-return-left"></i> ກັບຄືນ</a>
                        <div class="show"></div><br>
                    </div>
                </div>


                <div class="card-footer bg-warning"></div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-3"></div>
    </div>

    </div>
</body>

</html>