<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Rute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
</head>
</html>

<?php
$page = "rute"; 
session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!')
        window.location = '../auth/login/'
    </script>
";
}

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai");

?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<style>
h1 {
    text-align: center;
    margin-bottom: 20px;
}

.tambah{
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-left: 300px;
    margin-bottom: 20px;
}

a:hover {
    background-color: #45a049;
}

table {
    width: 70%;
    border-collapse: collapse;
    margin-left: 300px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
}

table th {
    background-color: #4CAF50;
    color: white;
}

table tr:hover {
    background-color: #ddd;
}

.edit, .hapus {
    display: inline-block;
    padding: 5px 10px;
    text-decoration: none;
    background-color: #008CBA;
    color: white;
    border-radius: 3px;
    margin-right: 5px;
    float: center;
}

.hapus {
    background-color: #f44336;
}

</style>

<div class="main">
    <h1>Data Rute | E - Ticketing</h1>
    <a href="tambah_rute.php" class="tambah">Tambah</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Maskapai</th>
            <th>Rute Asal</th>
            <th>Rute Tujuan</th>
            <th>Tanggal Pergi</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?> 
        <?php foreach($rute as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["nama_maskapai"]; ?></td>
                <td><?= $data["rute_asal"]; ?></td>
                <td><?= $data["rute_tujuan"]; ?></td>
                <td><?= $data["tanggal_pergi"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data["id_rute"]; ?>" class="edit"><i class="ri-ball-pen-line"></i>Edit</a>
                    <a href="hapus.php?id=<?= $data["id_rute"]; ?>" class="hapus" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="ri-delete-bin-6-line"></i>Hapus</a>
                </td>
            </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</div>