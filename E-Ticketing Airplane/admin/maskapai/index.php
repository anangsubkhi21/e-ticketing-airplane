<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Maskapai</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
</head>
<body>
    
</body>
</html><?php
$page = "maskapai"; 
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

$maskapai = query("SELECT * FROM maskapai");

?>

<?php require '../../layouts/sidebar_admin.php'; ?> 

<style>
  .main {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

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
    margin-bottom: 20px;
}

a:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
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
<h1>Data Maskapai | E-Ticketing</h1>
    <a href="tambah_maskapai.php" class="tambah">Tambah</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Logo</th>
            <th>Nama Maskapai</th>
            <th>Kapasitas</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?> 
        <?php foreach($maskapai as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><img src="../../assets/image/<?= $data["logo_maskapai"]; ?>" width="100"></td>
                <td><?= $data["nama_maskapai"]; ?></td>
                <td><?= $data["kapasitas"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data["id_maskapai"]; ?>" class="edit"><i class="ri-ball-pen-line"></i>Edit</a>
                    <a href="hapus.php?id=<?= $data["id_maskapai"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="hapus"><i class="ri-delete-bin-6-line"></i>Hapus</a>
                </td>
            </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
        
    </table>
</div>