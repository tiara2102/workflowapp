<?php
session_start();
include "config.php";

$error_message = ""; // Variabel untuk menyimpan pesan kesalahan

if ($_SESSION['loggedin'] == true) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username='$username'";
    $query = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($query);
    if ($row != 0) {
        $username = $row["username"];
        $name = $row["nama"];
        $departemen = $row["departemen"];
        $judul = $row["judul"];
        $isi = $row["isi"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Input Data</title>
</head>

<body class="d-flex flex-column h-100 bg-light">
    <main class="flex-shrink-0">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php"><span class="fw-bolder">Project Magang</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link scrollto" href="index.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0">Workflow Application X</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <!-- Form Section -->
                    <section>
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <form id="contactForm" method="POST" action="proses_tambah.php" enctype="multipart/form-data">
                                    <!-- Username -->
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" id="username" type="text" name="username" placeholder="Username" value="<?php echo $username ?>" readonly />
                                    </div>
                                    <!-- Nama -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Nama" value="<?php echo $name ?>" />
                                    </div>
                                    <!-- Departemen -->
                                    <div class="mb-3">
                                        <label for="departemen" class="form-label">Departemen</label>
                                        <input class="form-control" id="departemen" type="text" name="departemen" placeholder="Departemen" value="<?php echo $departemen ?>" />
                                    </div>
                                    <!-- Judul -->
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input class="form-control" id="judul" type="text" name="judul" placeholder="Judul" value="<?php echo $judul ?>" />
                                    </div>
                                    <!-- Isi -->
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Isi</label>
                                        <textarea class="form-control" id="isi" name="isi" placeholder="Isi" style="height: 10rem"><?php echo $isi ?></textarea>
                                    </div>
                                    <!-- Attachment -->
                                    <div class="mb-3">
                                        <label for="attachment" class="form-label">Attachment</label>
                                        <input class="form-control" id="attachment" type="file" name="attachment" accept="application/pdf" />
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" type="submit" name="proses" onClick="return confirm('Simpan data?');">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; Your Website 2024</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>

