<?php
include("header.php");

// Meng-include-kan file koneksi
include("config.php");

// Mendefinisikan array opsi prodi
$prodi_options = array(
    "Teknik Informatika",
    "Sistem Informasi",
    "Manajemen Akuntansi",
    "Komputerisasi Akuntansi"
);

$perintah = mysqli_query($koneksi, "SELECT * FROM user");
if(isset($_POST['add'])){
    $username =  $_POST['username'];
    $name = $_POST['nama'];
    $departemen = $_POST['departemen'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $query = "INSERT INTO user(username, nama, departemen, judul, isi, attachment) values('$username', '$name', '$departemen', '$judul', '$isi', '$attachment')";
    $perintah = mysqli_query($koneksi, $query);

    echo "<script>window.location.href = 'user.php';</script>";
}

?>
<h2 class="text-center">Data Akun</h2>
<div class="d-flex justify-content-between">
    <a href="tambah.php" class="btn" style="background-color: #FF1493; color: #fff;" data-toggle="modal" data-target="#addModal">
        <i data-feather="user-plus"></i> Buat Dokumen
    </a>
    <div class="d-flex">
        <a href="export_user.php" class="btn btn-warning mr-2">
            <i data-feather="download"></i> Export Data
        </a>
        <a href="user_cetak.php" class="btn btn-primary">
            <i data-feather="printer"></i> Cetak PDF
        </a>
    </div>
</div>

<br><br>

<table id="myTable" class="table table-hover" style="background-color: #E75480; color: #fff;">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Departemen</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>attachment</th>
        <th>Opsi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($data = mysqli_fetch_array($perintah)) {
        echo "<tr>";
        echo "<td>" . $data['id'] . "</td>";
        echo "<td>" . $data['username'] . "</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['departemen'] . "</td>";
        echo "<td>" . $data['judul'] . "</td>";
        echo "<td>" . $data['isi'] . "</td>";
        echo "<td>" . $data['attachment'] . "</td>";
        echo "<td>  
          <a class='btn btn-warning' href='user_edit.php?id=" . $data['id'] . "'><i data-feather='edit'></i>Edit</a>
          <a class='btn btn-danger' href='user_del.php?id=" . $data['id'] . "'><i data-feather='trash-2'></i>Hapus</a>
          </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>


<!-- Memasang jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Memasang Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
echo "Total <b>" . mysqli_num_rows($perintah) . "</b> user";
?>

<?php
include("footer.php");
?>
