<?php

require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/navbar.css">
    <title>Halaman Pelanggan</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">E - Ticketing</div>
        <div class="menu">
            <a href="/E-Ticketing Airplane/index.php">Jadwal Penerbangan</a>
            <a href="/E-Ticketing Airplane/cart.php">Pemesanan Tiket</a>
            <a href="/E-Ticketing Airplane/history.php">Riwayat Pemesanan</a>
        </div>
        <div class="authentication">
            <?php if(isset($_SESSION["username"])){
                ?>
                <span>Halo, <?= $_SESSION["nama_lengkap"]; ?></span>
                <a class="logout" href="logout.php">Logout</a>
                <?php
            }else{
                ?>
                <a href="auth/login/">Login</a>
                <?php
            }?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>