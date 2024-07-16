<?php
session_start();
include "config.php";

if (isset($_POST['proses'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $departemen = $_POST['departemen'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    // Proses upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Inisialisasi variabel attachment
    $attachment = "";

    // Check if file is a actual PDF or fake PDF
    if ($fileType != "pdf") {
        $uploadOk = 0;
        echo "Sorry, only PDF files are allowed.";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
            $attachment = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Simpan data ke database hanya jika file diunggah dengan sukses
    if ($uploadOk == 1 && $attachment != "") {  // Pastikan $file_url tidak kosong
        $sql = "INSERT INTO data (username, nama, departemen, judul, isi, attachment) 
                VALUES ('$username', '$name', '$departemen', '$judul', '$isi', '$attachment')";

        if (mysqli_query($koneksi, $sql)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Error: Data tidak dapat disimpan karena file tidak valid atau tidak diunggah.";
    }

    mysqli_close($koneksi);
}
?>
