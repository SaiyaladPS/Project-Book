<?php
include("../connect_dbstock.php");
$pro_id=$_POST['pro_id'];
$sql=mysqli_query($connect,"select*from districts where pro_id='$pro_id' ");
?>
<select id="dis_id" class='form-control'>
 <option value="">ເລືຶອກເມືອງ</option>
 <?php
   while($data=mysqli_fetch_array($sql)){
 ?>
  <option value="<?=$data['dis_id'];?>"><?=$data['dis_name'];?></option>
<?php
 }
?>
</select>