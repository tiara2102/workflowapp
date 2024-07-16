<?php

include("header.php");
include("config.php");

$nomor = $_GET['nomor'];

$query = "SELECT * FROM dokumen WHERE nomor = '$nomor'";
$perintah = mysqli_query($koneksi, $query);

while($data = mysqli_fetch_array($perintah)){
    $nomor = $data['nomor'];
    $judul = $data['judul'];
    $isi = $data['isi'];
    $jabatan = $data['jabatan'];
    $departemen = $data['departemen'];
    $mulai = $data['mulai'];
    $akhir = $data['akhir'];
}
?>

<form action="dok_edit.php" method="post">
    Nomor <input type="text" name="nomor" value="<?php echo $nomor; ?>"class="form-control">
    Judul <input type="text" name="judul" value="<?php echo $judul; ?>"class="form-control">
    Isi <input type="text" name="isi" value="<?php echo $isi; ?>"class="form-control">
    Jabatan <input type="text" name="jabatan" value="<?php echo $jabatan; ?>"class="form-control">
    Departemen <input type="text" name="departemen" value="<?php echo $departemen; ?>"class="form-control">
    Mulai <input type="text" name="mulai" value="<?php echo $mulai; ?>"class="form-control">
    Akhir <input type="text" name="akhir" value="<?php echo $akhir; ?>"class="form-control">
    <input type="hidden" name="nomor" value="<?php echo $nomor; ?>">
    <input type="submit" name="edit" value="simpan" class="btn btn-success mt-2">
</form>

<?php

if(isset($_POST['edit'])){
    $nomor =  $_POST['nomor'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $jabatan = $_POST['jabatan'];
    $departemen = $_POST['departemen'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];



    $query = "UPDATE dokumen SET nomor='$nomor', judul='$judul', isi='$isi', jabatan='$jabatan', departemen='$departemen', mulai='$mulai', akhir='$akhir'
    WHERE nomor=$nomor";
    $perintah = mysqli_query($koneksi, $query);
    echo"<script>window.location.replace('dokumen.php');</script>";
}

?>

<?php
include("footer.php");
?>