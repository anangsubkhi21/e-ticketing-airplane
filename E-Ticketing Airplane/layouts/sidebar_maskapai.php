<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Maskapai</title>
    <link rel="stylesheet" href="/E-Ticketing Airplane/assets/style/maskapai.css">
    <link rel="stylesheet" href="/E-Ticketing Airplane/assets/sweet-alert/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="/E-Ticketing Airplane/assets/sweet-alert/css/sweetalert.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <h4>Halaman Maskapai</h4>
        <a href="/E-Ticketing Airplane/Maskapai/index.php" class="<?php if($page == "Dashboard") echo "active" ?>"><i class="fas fa-home"></i>Dashboard</a>
        <a href="/E-Ticketing Airplane/Maskapai/pengguna" class="<?php if($page == "Pengguna") echo "active" ?>"><i class="fas fa-users"></i>Data Pengguna</a>
        <a href="/E-Ticketing Airplane/Maskapai/jadwal" class="<?php if($page == "penerbangan") echo"active" ?>"><i class="far fa-calendar-alt"></i> Data Jadwal Penerbangan</a>
        <a href="/E-Ticketing Airplane/Maskapai/riwayat/history.php" class="<?php if($page == "riwayat") echo"active" ?>"><i class="fas fa-route"></i>Data Riwayat Transaksi</a> 
        <a href="/E-Ticketing Airplane/logout.php" onClick="return confirm('Apakah anda yakin ingin logout?')"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>

    <script src="/simulasi-lsp/assets/sweet-alert/js/jquery-2.1.4.min.js"></script>
    <script src="/simulasi-lsp/assets/sweet-alert/js/sweetalert.min.js"></script>
</body>
</html>