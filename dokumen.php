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

$perintah = mysqli_query($koneksi, "SELECT * FROM dokumen");
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

?>
<h2 class="text-center">Data Dokumen</h2>
<div class="d-flex justify-content-between">
    <a href="dokumen_add.php" class="btn" style="background-color: #FF1493; color: #fff;" data-toggle="modal" data-target="#addModal">
        <i data-feather="user-plus"></i> Buat Dokumen
    </a>
    <div class="d-flex">
        <a href="export_dokumen.php" class="btn btn-warning mr-2">
            <i data-feather="download"></i> Export Data
        </a>
        <a href="dokumen_cetak.php" class="btn btn-primary">
            <i data-feather="printer"></i> Cetak PDF
        </a>
    </div>
</div>

<br><br>

<table id="myTable" class="table table-hover" style="background-color: #E75480; color: #fff;">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th>Mulai</th>
        <th>Akhir</th>
        <th>Opsi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($data = mysqli_fetch_array($perintah)) {
        echo "<tr>";
        echo "<td>" . $data['nomor'] . "</td>";
        echo "<td>" . $data['judul'] . "</td>";
        echo "<td>" . $data['isi'] . "</td>";
        echo "<td>" . $data['jabatan'] . "</td>";
        echo "<td>" . $data['departemen'] . "</td>";
        echo "<td>" . $data['mulai'] . "</td>";
        echo "<td>" . $data['akhir'] . "</td>";
        echo "<td>  
          <a class='btn btn-warning' href='dok_edit.php?id=" . $data['nomor'] . "'><i data-feather='edit'></i>Edit</a>
          <a class='btn btn-danger' href='dok_del.php?id=" . $data['nomor'] . "'><i data-feather='trash-2'></i>Hapus</a>
          </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<!-- Modal untuk tambah data dokumen-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir tambah data -->
                <form id="form-dokumen" action="dokumen_add.php" method="post">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary" form="form-dokumen">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Memasang jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Memasang Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
echo "Total <b>" . mysqli_num_rows($perintah) . "</b> dokumen";
?>

<?php
include("footer.php");
?>
