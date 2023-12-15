<?php
require '../Connect_dbstock.php';

$pro_id = $_POST['id'];

$select_sql_pro = "SELECT * FROM products WHERE book_id = '$pro_id'";
$query_pro = mysqli_query($connect, $select_sql_pro);
$rows_pro = mysqli_fetch_assoc($query_pro);
echo json_encode($rows_pro);
?>