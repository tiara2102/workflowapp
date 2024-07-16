<?php
// session_start();
// if(isset($_SESSION['login'])) {
//     header('Location: Auth.php');
// }

include("header.php");
include("config.php");

$jumlah_user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
$jumlah_karyawan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM karyawan"));
$jumlah_dokumen = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dokumen"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include your CSS and other meta tags here -->
</head>
<body>
    <h4><marquee>SELAMAT DATANG DI SISTEM INFORMASI MANAJEMEN PT NIPPON SHOKUBAI INDONESIA</h4><b></marquee>
    <br>
    <br>
    <br>
    <center><img src="image/nippon.jpg" style="width:300px;"></center>
    <br>
    <br>
    <h1>Halaman Utama</h1>
    <h2>Sistem Informasi Manajemen PT NIPPON SHOKUBAI INDONESIA</h2>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-header text-uppercase fw-semibold">
                        Jumlah Akun
                    </div>
                    <div class="card-body">
                        <p class="card-text"> ~ <?php echo $jumlah_user ?> ~ </p>
                        <a href="user.php" class="btn btn-primary">Selengkapnya <i data-feather="chevrons-right"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-header text-uppercase fw-semibold">
                        Jumlah Dokumen
                    </div>
                    <div class="card-body">
                        <p class="card-text"> ~ <?php echo $jumlah_dokumen ?> ~ </p>
                        <a href="dokumen.php" class="btn btn-primary">Selengkapnya <i data-feather="chevrons-right"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header text-uppercase fw-semibold">
                        Jumlah Dokumen
                    </div>
                    <div class="card-body">
                        <p class="card-text"> ~ <?php echo $jumlah_dokumen ?> ~ </p>
                        <a href="dokumen.php" class="btn btn-primary">Selengkapnya <i data-feather="chevrons-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
