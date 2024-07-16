<?php
include("header.php");

// Mendefinisikan array opsi dept
$dep_options = array(
    "IT",
    "Safety",
    "Keuangan",
    "Produksi"
);
$jabatan_options = array(
    "Staff",
    "Superviser",
    "Manager",
);
?>

<h2 class="text-center">Form Data Karyawan</h2>
<form action="karyawan_add.php" method="post">
NIK <input type="text" name="nik" id="nik" class="form-control">
                Nama <input type="text" name="nama" id="nama" class="form-control">
                    Jabatan <br>
                    <?php
                    // Menampilkan radio button untuk setiap bagian
                    foreach ($jabatan_options as $jabatan_option) {
                        echo "<input type='radio' name='jabatan' value='$jabatan_option'> $jabatan_option <br>";
                    }
                    ?>
                    Departemen <br>
                    <?php
                    // Menampilkan radio button untuk setiap departemen
                    foreach ($dep_options as $dep_option) {
                        echo "<input type='radio' name='departemen' value='$dep_option'> $dep_option <br>";
                    }
                    ?>
                    email <input type="text" name="email" id="email" class="form-control">
    <input type="submit" name="add" value="Tambah" class="btn btn-success mt-2">
</form>

<?php
// menyertakan file config.php untuk kebutuhan koneksi ke db
include("config.php");

if(isset($_POST['add'])){
    $nik =  $_POST['nik'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $departemen = $_POST['departemen'];
    $email = $_POST['email'];

    $query = "INSERT INTO karyawan(nik, nama, jabatan, departemen, email) values('$nik', '$nama','$jabatan', '$departemen', '$email')";
    $perintah = mysqli_query($koneksi, $query);

    echo "<script>window.location.href = 'karyawan.php';</script>";
}

include("footer.php");
?>