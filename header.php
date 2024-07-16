<?php
//mulai dengan session start
session_start();
if(!isset($_SESSION['login'])){
  header("Location:login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>WorkflowApp X</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-Zfs2maT1t5I5ku81tuqfZrIFVAQ6GzjPU6Ckfsq3gqJstXtDYtG1RS8VFIId+1jF" crossorigin="anonymous">

<!-- JavaScript Bootstrap (butuh Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-SFn1sIQDqFZN5SYk9/xZR7xpIph1NgeFVl3/Xr1X7xImd9WWqSOmm09CExlEXFCR" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- datatables -->
  <link href='https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css' rel='stylesheet'/>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
  <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>

  <!-- data tables export -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

  <!-- feather icon -->
<script src="https://unpkg.com/feather-icons"></script>
<link rel="icon" type="image" href="image/nippon.jpg">
</head>
<body style="background-color: #E8D1E1;">


<div class="container mt-3">
  <!-- <h2>Example of Jumbotron</h2> -->
  <div class="mt-2 mb-2 p-2 text-white rounded" style="background-color: #F68CD6">
    <h1>WorkflowApp</h1> 
    <p>Sistem Informasi Manajemen</p> 
  </div>
  <!-- ini navbar -->
  <!-- kalo menaruh mt di class nav kalo mb di class div -->
  <nav class="navbar navbar-expand-sm  navbar-dark mt-2 rounded" style="background-color: #F68CD6">
  <div class="container-fluid">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dokumen.php">Dokumen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="karyawan.php">Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="approve.php">Approve</a>
      </li>
  </ul>
  <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <a class="nav-link text-white" href="#">
          <?php echo "Welcome : ". $_SESSION['username']; ?>
        </a>
</li>
  <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
</li>
</ul>
</div>
</nav>

