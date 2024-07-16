<?php
// Menyertakan file konfigurasi untuk koneksi ke database
include("config.php");

// Memeriksa apakah tombol Tambah telah ditekan
if(isset($_POST['add'])){
    // Mengambil data dari form
    $nik = $_POST['nik'];
    $name = $_POST['nama'];
    $jabatan= $_POST['jabatan'];
    $departemen = $_POST['departemen'];
    $email = $_POST['email'];

    // Menyiapkan query untuk menyimpan data ke database
    $query = "INSERT INTO karyawan(nik,nama, jabatan, departemen, email) values('$nik','$name', '$jabatan', '$departemen', '$email')";

    // Menjalankan query
    $perintah = mysqli_query($koneksi, $query);

    // Menampilkan pesan jika data berhasil ditambahkan
    if($perintah) {
        echo "<script>alert('Data berhasil ditambahkan.'); window.location='karyawan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data. Silakan coba lagi.');</script>";
    }
} else {
    // Jika tombol Tambah tidak ditekan, kembali ke halaman sebelumnya
    header("Location: karyawan.php");
}

// Menutup koneksi ke database
mysqli_close($koneksi);
?>
