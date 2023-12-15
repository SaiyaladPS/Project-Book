<?php
session_start();
include("Connect_dbstock.php");
$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($connect, "SELECT fname,lname,status,tel,user_id from users where username='$username' and password= password('$password')");
$check = mysqli_num_rows($sql);


if ($check <> 0) {
  $data = mysqli_fetch_array($sql);
  if ($data['status'] == "ຜູ້ບໍລິຫານ") {
    $_SESSION['fname'] = $data['fname'];
    $_SESSION['lname'] = $data['lname'];
    $_SESSION['tel'] = $data['tel'];
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['checked'] = 1; //ຂຽນກັນຖ້າບໍ່ລັນຟາຍເຂົ້າສູ່ລະບົບແມ່ນບໍ່ໃຫ້ທໍາງານໄດ້
    echo "<script> Swal.fire({
            title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
            const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
window.setTimeout(function(){ 
    location='menu_admin.php';
} ,1500); </script>";
  } else if ($data['status'] == "ພະນັກງານ") {
    if ($data['status'] == "ພະນັກງານ") {
      $_SESSION['fname'] = $data['fname'];
      $_SESSION['lname'] = $data['lname'];
      $_SESSION['user_id'] = $data['user_id'];
      $_SESSION['checked'] = 1; //ຂຽນກັນຖ້າບໍ່ລັນຟາຍເຂົ້າສູ່ລະບົບແມ່ນບໍ່ໃຫ້ທໍາງານໄດ້
      echo "<script> Swal.fire({
                title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
                timer: 1500,
                timerProgressBar: true,
                didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                const content = Swal.getContent()
          if (content) {
            const b = content.querySelector('b')
            if (b) {
              b.textContent = Swal.getTimerLeft()
            }
          }
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
      }
    })
    window.setTimeout(function(){ 
        location='menu_user.php';
    } ,1500); </script>";
    }
  }
} else {
  echo "<script>
      Swal.fire({
         icon:'error',
         title:'ຊື່ ຫຼື ລະຫັດຜ່ານບໍ່ຖຶກຕ້ອງ',
         confirmButtonText:'ຕົກລົງ',
      })
      </script>";
}
