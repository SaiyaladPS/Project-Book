<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
      <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="../Ionicons/css/ionicons.css">
      <script src="../jquery.js"></script>
     
  
      <!-- <script>
        $(function(){
            $('.send').click(function(){
                var prod_id=$("#prod_id").val();
                var prod_name=$("#prod_name").val();
                var qty=$("#qty").val();
                var cate_id=$("#cate_id").val();
                var bprice=$("#bprice").val();
                var sprice=$("#sprice").val();
                var remark=$("#remark").val();
                if(prod_id==""){
                    swal.fire({
                        icon: 'warning',
                        title: 'ບາງຢ່າງຜິດພາດ',
                        showConfirmButton:false,
                        timer:2000,
                        footer:'<a href="">ກະລຸນາປ້ອນລະຫັດສິນຄ້າ</a>'
                    })
                }else if(prod_name==""){
                    swal.fire({
                        icon: 'warning',
                        title: 'ບາງຢ່າຜິດພາດ',
                        showConfirmButton:false,
                        timer:2000,
                        footer:'<a href="">ກະລຸນາປ້ອນຊື່ສິນຄ້າ</a>'
                    })
                }else if(qty==""){
                    swal.fire({
                        icon: 'warning',
                        title: 'ບາງຢ່າງຜິດພາດ',
                        showConfirmButton:false,
                        timer:2000,
                        footer:'<a href="">ກະລຸນາປ້ອນຈຳນວນສິນຄ້າ</a>'
                    })
                }else if(cate_id==""){
                    swal.fire({
                        icon: 'warning',
                        title: 'ບາງຢ່າງຜິດພາດ',
                        showConfirmButton:false,
                        timer:2000,
                        footer:'<a href="">ກະລຸນາເລືອກປະເພດສິນຄ້າ</a>'
                    })
                }else if(bprice==""){
                    swal.fire({
                        icon: 'warning',
                        title: 'ບາງຢ່າງຜິດພາດ',
                        showConfirmButton:false,
                        timer:2000,
                        footer:'<a href="">ກະລຸນາປ້ອນລາຄາຊື້</a>'
                    })
                }else if(sprice==""){
                    swal.fire({
                        icon: 'warning',
                        title: 'ບາງຢ່າງຜິດພາດ',
                        showConfirmButton:false,
                        timer:2000,
                        footer:'<a href="">ກະລຸນາປ້ອນລາຄາຂາຍ</a>'
                    })
                }else{
                $.get ("insert-products.php",{
                    prod_id: prod_id,
                    prod_name: prod_name,
                    qty: qty,
                    cate_id: cate_id,
                    bprice: bprice,
                    sprice: sprice,
                    remark: remark
                    },
                    function(output){
                    $(".show").html(output);
                    });
                }
            })
        })
    </script>

<style>
 
    

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
.card{
    border: 3px solid green !important;
}
input,
textarea,select{
   
    border: 2px solid lightblue !important;
}

</style> -->
<script>
		var loadFile = function(event) {
			var output = document.getElementById('output');
			output.src = URL.createObjectURL(event.target.files[0]);
			output.onload = function() {
				URL.revokeObjectURL(output.src) // free memory
			}
		};
	</script>
    <script>
		$(function() {
			$(".save").click(function() {
				var formData = new FormData($('#insert_pic')[0]);
				$.ajax({
					url: 'insert-products.php',
					data: formData,
					async: false,
					contentType: false,
					processData: false,
					cache: false,
					type: 'POST',
					success: function(data) {
						//alert(data);
						$('#show').empty();
						$('#show').append(data);
					},
                
				});
				return false;
			});
		});
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
                <div class="card-header text-center text-light bg-primary"><h3>ຟອມບັນທຶກຂໍ້ມູນສິນຄ້າ</h3></div>
     <form id="insert_pic" method="post" enctype="multipart/form-data">
               <div class="card-body text-success">
               <div class="row">
               <div class="col-md-6">
               <div class="form-group">
								<label>ຮູບພາບ : </label>
								<input type="file" class="form-control" accept="image/*" onchange="loadFile(event)" name="file">
								<center><img id="output" class="w-25 mt-4"></center>
							</div>

                    <div class="form-group">
                        <label><b>ລະຫັດສິນຄ້າ</b> </label>
                        <input type="text-light" name="prod_id" id="prod_id" 
                        class='form-control ' placeholder="ກະລຸນາປ້ອນລະຫັດສິນຄ້າ...">
                    </div>
                    <div class="form-group">
                        <label><b>ຊື່ສິນຄ້າ:</b> </label>
                        <input type="text" name="prod_name" id="prod_name" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນຊື່ສິນຄ້າ...">
                    </div>
                    <div class="form-group">
                        <label><b>ຜູ້ແຕ່ງ</b> </label>
                        <input type="text" name="authors" id="authors" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນຊື່ສິນຄ້າ...">
                    </div>
                    <div class="form-group">
                        <label><b>ສຳໜັກງານ</b> </label>
                        <input type="text" name="press" id="press" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນຊື່ສິນຄ້າ...">
                    </div>
                 
               </div>
               <div class="col-md-6">
               <div class="form-group">
                        <label><b> ເລືຶອກປະເພດສິນຄ້າ</b></label>
                      <select name="cate_id"id="cate_id" class='form-control'>
                      <option value="">ເລືຶອກປະເພດສິນຄ້າ</option>
                      <?php
                      include('../connect_dbstock.php');
                        $sql=mysqli_query($connect,"select*from categories");
                        while($data=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$data['cate_id'];?>"><?=$data['cate_name'];?></option>
                            <?php
                        }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label><b> ຈໍານວນ:</b></label>
                        <input type="text" name="qty" id="qty" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນຈໍານວນ...">
                    </div>
                         <div class="form-group">
                        <label><b> ລາຄາຊື້:</b></label>
                        <input type="text" name="bprice" id="bprice" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນລາຄາຊື້...">
                    </div>
                    <div class="form-group">
                        <label><b> ລາຄາຂາຍ:</b></label>
                        <input type="text" name="sprice" id="sprice" 
                        class='form-control' placeholder="ກະລຸນາປ້ອນລາຄາຂາຍ...">
                  </div>
                     <div class="form-group">
                        <label><b> ໝາຍເຫດ</b></label>
                        <input type="text" name="remark" id="remark" 
                        class='form-control'>
                    </div>
               </div>
                       
               </div>
               <div class="text-center">
               <button type="button" class="btn btn-outline-primary save">
               <i class="fas fa-save"></i>ບັນທຶກ</button>&emsp;&emsp;
                            <button type="reset" class="btn btn-outline-danger">
                            <i class="fas fa-redo-alt fa-spin"></i>ລ້າງຂໍ້ມູນ</button>&emsp;&emsp;
                            <button type="submit" class="btn btn-outline-success" class="text-end"> <a href="form_search_products.php">
                            <i class='ion-android-arrow-forward'></i>ເບິງເມນູ</a></button> 
                            </div>
                      
                            </div>
               </div>
              
               <div class="card-footer text-center text-light bg-primary">
              
                           
               </div>
               </div>
            </div>
            </div>
            <div id="show"></div>
            </form>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>