<?php
include("../connect_dbstock.php");
$dis_id=$_POST['dis_id'];
$sql=mysqli_query($connect,"select*from villages where dis_id='$dis_id' ");
?>
<select id="dis_id" class='form-control'>
 <option value="">ເລືຶອກບ້ານ</option>
 <?php
   while($data=mysqli_fetch_array($sql)){
 ?>
  <option value="<?=$data['vill_id'];?>"><?=$data['vill_name'];?></option>
<?php
 }
?>
</select>