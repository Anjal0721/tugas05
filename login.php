<?php
session_start();
require_once('koneksi.php');

// Inisialisasi variabel untuk menyimpan pesan kesalahan
$error = '';

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data yang dikirimkan dari form
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna berdasarkan username
    $query = "SELECT * FROM user WHERE nama = '$nama' AND password = '$password'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
            // Kata sandi cocok, buat sesi login
            $_SESSION['nama'] = $nama;
            header('Location: index.php'); // Redirect ke halaman berhasil login
    } else {
        // Pengguna tidak ditemukan
        $error = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <section class="section">
      <div class="row">
        <div class="col-lg-4" style="margin:auto; margin-top:10%;">

          <div class="card">
            <div class="card-body">
              <h3 class="card-title" style="text-align: center;font-size:30px;">LOGIN</h3>

              <!-- Horizontal Form -->
              <form method="POST" action="login.php">
              <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                <div class="row mb-3">
                    <input type="text" class="form-control" id="inputText"  name="nama" placeholder="Name">
                </div>
               
                <div class="row mb-3">
                    <input type="password" class="form-control" id="inputPassword" name="password"  placeholder="Password">
                </div>
               
                </fieldset>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

         

        </div>

        
      </div>
    </section>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>