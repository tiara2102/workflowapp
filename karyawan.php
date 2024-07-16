<?php
include("header.php");

// Meng-include-kan file koneksi
include("config.php");

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

$perintah = mysqli_query($koneksi, "SELECT * FROM karyawan");
if(isset($_POST['add'])){
    $nik = $_POST['nik'];
    $name = $_POST['nama'];
    $jabatan= $_POST['jabatan'];
    $departemen = $_POST['departemen'];
    $email = $_POST['email'];

    $query = "INSERT INTO karyawan(nik,nama, jabatan, departemen, email) values('$nik','$name', '$jabatan', '$departemen', '$email')";
    $perintah = mysqli_query($koneksi, $query);

    echo "<script>window.location.href = 'karyawan.php';</script>";
}

?>
<h2 class="text-center">Data Karyawan</h2>
<div class="d-flex justify-content-between">
    <a href="karyawan_add.php" class="btn" style="background-color: #FF1493; color: #fff;" data-toggle="modal" data-target="#addModal">
        <i data-feather="user-plus"></i> Tambah Data Karyawan
    </a>
    <div class="d-flex">
        <a href="export_karyawan.php" class="btn btn-warning mr-2">
            <i data-feather="download"></i> Export Data
        </a>
        <a href="karyawan_cetak.php" class="btn btn-primary">
            <i data-feather="printer"></i> Cetak PDF
        </a>
    </div>
</div>

<br><br>

<table id="myTable" class="table table-hover" style="background-color: #E75480; color: #fff;">
    <thead>
    <tr>
        <th>ID</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($data = mysqli_fetch_array($perintah)) {
        echo "<tr>";
        echo "<td>" . $data['id'] . "</td>";
        echo "<td>" . $data['nik'] . "</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['jabatan'] . "</td>";
        echo "<td>" . $data['departemen'] . "</td>";
        echo "<td>" . $data['email'] . "</td>";
        echo "<td>  
          <a class='btn btn-warning' href='karyawan_edit.php?id=" . $data['id'] . "'><i data-feather='edit'></i>Edit</a>
          <a class='btn btn-danger' href='karyawan_del.php?id=" . $data['id'] . "'><i data-feather='trash-2'></i>Hapus</a>
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
echo "Total <b>" . mysqli_num_rows($perintah) . "</b> karyawan";
?>

<?php
include("footer.php");
?>
