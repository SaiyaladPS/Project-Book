<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
// Get the current date and time
$currentDateTime = date('d/m/y H:i:s');

require '../Connect_dbstock.php';

$count = $_GET['count'];
for ($i = 0; $i< $count; $i++) {
    $bookId = $_GET['data'][$i]['book_id'];
    $bookName = $_GET['data'][$i]['book_name'];
    $bprice = $_GET['data'][$i]['bprice'];
    $img = $_GET['data'][$i]['img'];
    $qty = $_GET['data'][$i]['qty'];
    $am = $bprice * $qty;
    $user_id = $_SESSION['user_id'];

    $order_sql = "INSERT INTO orders(bill_no, book_id, o_qty, sprice, amount, o_date, o_time, remark, user_id) 
    VALUES ('','$bookId','$qty','$bprice','$am',curdate(),curtime(),'','$user_id')";
    mysqli_query($connect, $order_sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
@media print {
    .offcanvas {
        display: none;
    }

    .row {
        display: none;
    }

    #Bill {
        display: block;
    }
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.bill {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.bill-header {
    text-align: center;
}

.bill-details {
    margin-top: 20px;
}

.bill-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.bill-table th,
.bill-table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

.bill-table thead {
    background-color: #f2f2f2;
}

.bill-table tfoot {
    font-weight: bold;
}
</style>

<body>
    <div class="bill">
        <div class="bill-header">
            <h1>Invoice</h1>
            <p>ວັນທີ: <?php echo $currentDateTime ?></p>

        </div>
        <div class="bill-details">
            <p><strong>ອອກບິນໂດຍ: </strong> <?php  echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></p>
            <p><strong>ໂທ: </strong> <?php echo $_SESSION['tel'] ?></p>
        </div>
        <table class="bill-table">
            <thead>
                <tr>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາ</th>
                    <th>ລວມ</th>
                </tr>
            </thead>
            <tbody>
                <?php
               for ($i = 0; $i< $count; $i++) {
            ?>
                <tr>
                    <td><?php echo $_GET['data'][$i]['book_name'] ?></td>
                    <td><?php echo $_GET['data'][$i]['qty']; ?></td>
                    <td><?php echo  number_format($_GET['data'][$i]['bprice']) ?> ກີບ</td>
                    <td><?php echo  number_format($_GET['data'][$i]['qty'] * $_GET['data'][$i]['bprice'] ) ?> ກີບ</td>
                </tr>
                <?php }?>
            </tbody>
            <tfoot>

                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong><?php echo number_format($_GET['total']); ?> ກີບ</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>

    </script>
</body>

</html>