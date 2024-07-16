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

<h2 class="text-center">Form Data Dokumen</h2>
<form action="dokumen_add.php" method="post">
Nomor <input type="text" name="nomor" id="nomor" class="form-control">
                Judul <input type="text" name="judul" id="judul" class="form-control">
                    Isi <input type="text" name="isi" id="isi" class="form-control">
                    Jabatan <br>
                    <?php
                    // Menampilkan radio button untuk setiap bagian
                    foreach ($jabatan_options as $jabatan_option) {
                        echo "<input type='radio' name='jabatan' value='$jabatan_option'> $jabatan_option <br>";
                    }
                    ?>
                    Mulai <input type="text" name="mulai" id="mulai" class="form-control">
                    Akhir <input type="text" name="akhir" id="akhir" class="form-control">
                    Departemen <br>
                    <?php
                    // Menampilkan radio button untuk setiap departemen
                    foreach ($dep_options as $dep_option) {
                        echo "<input type='radio' name='departemen' value='$dep_option'> $dep_option <br>";
                    }
                    ?>
                    dokumen pendukung <input type="text" name="attachment" id="attachment" class="form-control">
    <input type="submit" name="add" value="Tambah" class="btn btn-success mt-2">
</form>

<?php
// menyertakan file config.php untuk kebutuhan koneksi ke db
include("config.php");

if(isset($_POST['add'])){
    $nomor =  $_POST['nomor'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $jabatan = $_POST['jabatan'];
    $departemen = $_POST['departemen'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    $query = "INSERT INTO dokumen(nomor, judul, isi, jabatan, departemen, mulai, akhir) values('$nomor', '$judul', '$isi', '$jabatan', '$departemen', '$mulai', '$akhir')";
    $perintah = mysqli_query($koneksi, $query);

    echo "<script>window.location.href = 'dokumen.php';</script>";
}

include("footer.php");
?>
