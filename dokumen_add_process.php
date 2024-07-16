<?php
// Menyertakan file konfigurasi untuk koneksi ke database
include("config.php");

// Memeriksa apakah tombol Tambah telah ditekan
if(isset($_POST['add'])){
    // Mengambil data dari form
    $nomor =  $_POST['nomor'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $jabatan = $_POST['jabatan'];
    $departemen = $_POST['departemen'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    // Menyiapkan query untuk menyimpan data ke database
    $query = "INSERT INTO dokumen(nomor, judul, isi, jabatan, departemen, mulai, akhir) values('$nomor', '$judul', '$isi', '$jabatan', '$departemen', '$mulai', '$akhir')";

    // Menjalankan query
    $perintah = mysqli_query($koneksi, $query);

    // Menampilkan pesan jika data berhasil ditambahkan
    if($perintah) {
        echo "<script>alert('Data berhasil ditambahkan.'); window.location='dokumen.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data. Silakan coba lagi.');</script>";
    }
} else {
    // Jika tombol Tambah tidak ditekan, kembali ke halaman sebelumnya
    header("Location: dokumen.php");
}

// Menutup koneksi ke database
mysqli_close($koneksi);
?>
