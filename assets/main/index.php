<?php 
//mulai sesi
session_start();
// //jika user belum login, kembalikan user ke halaman login
if (!isset($_SESSION["login"])){
header("Location: ..\user\login.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f449d463f4abb0b906bb', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>HOME</title>
<link rel="icon" type="image/png" href="lg.png">
<link rel="stylesheet" type="text/css" href="2.css">
</head>
<body>
<div class="container">
  <div class="header"><strong> SISTEM INVENTARIS DAN PEMELIHARAAN ALAT ELEKTROMEDIK<!-- end .header --></strong></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><strong><a href="..\main\index.php">HOME</a></strong></li>
      <li><strong><a href="..\inv\index.php">Data Alat</a></strong></li>
      <li><strong><a href="..\jdw\index.php">Jadwal Pemeliharaan</a></strong></li>
      <li><strong><a href="..\data\index.php">Data Pemeliharaan</a></strong></li>
      <li><strong><a href="..\report\index.php">Laporan Kerusakan Alat</a></strong></li>
    </ul>
  <strong><!-- end .sidebar1 --></strong></div>
  <div class="content">
    <h1>Selamat Datang</h1>
    <p>Sistem Inventaris dan Pemeliharaan Alat Elektromedik adalah sebuah <em>software </em>berbasis website yang diharapkan dapat berguna untuk memudahkan Instalasi Pemeliharaan Sarana Rumah Sakit (IPSRS) dalam mengelola inventaris dan pemeliharaan alat elektromedik serta memudahkan pengguna alat (<em>user</em>) melaporkan kerusakan alat.    <!-- end .content --></p>
    <br><br><br><br><br>
    <br><br><br><br><br>
  </div>
</div>
  <div class="footer">
    <p>Login as ipsrs01</p>   
    
    <table align="right" cellpadding="10" cellspacing="10" ="">
      <th></th>
      <th align="center">
        <img src="..\main\lg.png" width="75" height="75">
      </th>
      <th align="center">
        <img src="..\main\lg2.png" width="75" height="75">
      </th>
    </table>

    <p><a href="..\..\user\logout.php"> Logout</a></p>
    <p><strong>©2019</strong></p>
    <p><strong>created by Vizia Hasemi Vivaldi</strong></p>
  </div>
  <!-- end .container --></div>
</body>
</html>