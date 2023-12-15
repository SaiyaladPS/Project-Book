<?php
require '../Connect_dbstock.php';

$select_sql = "SELECT * FROM products ";
$select_product = mysqli_query($connect, $select_sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../Ionicons/css/ionicons.css">

    <style>
    * {
        font-family: phetsarath ot;
    }

    #Bill {
        display: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php while($rows = mysqli_fetch_assoc($select_product)) { ?>
            <div class="col-3 text-center">
                <div class="card text-center mx-auto" style="width: 18rem;">
                    <img src="../products2/img/<?php echo $rows['img'] ?>" class="mx-auto" width="200px" height="300px"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title fs-6 text-success"><?php echo $rows['book_name'] ?></h5>
                        <p class="card-text">ຊື່ຜູ້ແຕ່ງ : <?php echo $rows['authors'] ?></p>
                        <a href="#" class="btn btn-primary select-pro" id="<?php echo $rows['book_id'] ?>">ສົ່ງຊື່</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Colored with scrolling</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <table class="table table-dark table-striped">
                    <thead>
                        <th>ຮູບພາບ</th>
                        <th>ຊື່ປຶ້ມ</th>
                        <th>ລາຄາ</th>
                        <th>ຈຳນວນ</th>
                        <th></th>
                    </thead>
                    <tbody id="cart">
                        <!-- Cart items will be displayed here -->
                    </tbody>
                </table>
            </div>
            <p class=" bg-danger text-center py-3 text-white fs-4 ">Total:<span id="total">0</span> ກີບ</p>
            <a href="#" id="sell" class="btn btn-success ">ອອກບິນ</a>
        </div>

        <div id="Bill"></div>

    </div>
    <script src="../jquery.js"></script>
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        let cart = [];
        let total = 0;

        $('.select-pro').click(function(e) {
            // Prevent the default action of the click event
            e.preventDefault();


            // Get the id attribute of the clicked element
            var elementId = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "select-orders.php",
                data: {
                    id: elementId
                }, // Modify data as needed

                success: function(response) {
                    let data = JSON.parse(response)
                    localStorage.setItem('book_name', data.book_name)

                    const existingProduct = cart.find(item => item.book_id === elementId);

                    if (existingProduct) {
                        existingProduct.qty += 1;
                    } else {
                        cart.push({
                            book_id: data.book_id,
                            book_name: data.book_name,
                            bprice: data.bprice,
                            img: data.img,
                            qty: 1
                        });
                    }


                    total += parseFloat(data.bprice)


                    updateCartUI();
                }
            });

            function formatNumberWithCommas(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            function deleteCartItem(bookId) {
                const indexToDelete = cart.findIndex(item => item.book_id === bookId);

                if (indexToDelete !== -1) {
                    total -= cart[indexToDelete].bprice * cart[indexToDelete].qty;
                    cart.splice(indexToDelete, 1);
                    updateCartUI()
                }
            }

            function updateCartUI() {
                // Clear existing cart items
                $('#cart').empty();

                // Add cart items to the UI
                cart.forEach(function(item) {
                    $('#cart').append(
                        `<tr><td><img width="50" height="70" src="../products2/img/${item.img}"/></td><td>${item.book_name}</td><td>${item.bprice}</td><td>${item.qty}</td><td><button class=" btn btn-danger btnDelete" data-id="${item.book_id}">Del</button></td></tr>`
                    );
                });

                $(".btnDelete").click((event) => {
                    var idToDelete = $(event.currentTarget).data("id");
                    // Now you can use idToDelete to perform your delete operation
                    var Id = idToDelete.toString()
                    deleteCartItem(Id)
                })

                // Update total
                $('#total').text(formatNumberWithCommas(total.toFixed(2)));

                $("#sell").click(() => {

                    $.ajax({
                        type: "get",
                        url: "print.php",
                        data: {
                            data: cart,
                            count: cart.length,
                            total: total
                        },
                        success: function(response) {
                            $("#Bill").html(response)
                            window.print()
                        }
                    });
                    cart.forEach((item) => {
                        empty()

                    })
                })


            }

            let dataM = localStorage.getItem('book_name');
            if (dataM != "") {
                $('.offcanvas-end').addClass('show')
                $('.offcanvas-end').css({
                    'visibility': 'visible',
                })
            }
            $('.btn-close').click(() => {
                $('.offcanvas-end').removeClass('show').css({
                    'visibility': 'hidden'
                })
            })
        });


    });
    </script>
</body>

</html>