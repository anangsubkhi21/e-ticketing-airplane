<?php
require 'layouts/navbar.php';

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = 'index.php';
    </script>
    ";
    exit; // Menghentikan eksekusi script jika pengguna belum login
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "
    <script type='text/javascript'>
        alert('Parameter id tiket tidak valid!');
        window.location = 'index.php';
    </script>
    ";
    exit; // Menghentikan eksekusi script jika parameter id tiket tidak valid
}

$id_order = $_GET['id'];

$tickets = query("SELECT * FROM order_detail 
                INNER JOIN order_tiket ON order_detail.id_order = order_tiket.id_order
                INNER JOIN user ON order_detail.id_user = user.id_user
                INNER JOIN jadwal_penerbangan ON order_detail.id_jadwal = jadwal_penerbangan.id_jadwal
                INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute
                INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai
                WHERE order_detail.id_order = '$id_order'");
                
$grandtotal = 0; // Initialize grand total

foreach ($tickets as $data) {
    $totalharga = $data["harga"] * $data["jumlah_tiket"];
    $grandtotal += $totalharga;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>      
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .main {
            margin-top: 50px;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #D3756B;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            color: #555;
        }
        th {
            background-color: #f9f9f9;
        }
        .table-container{
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            padding: 80px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .total-box {
            margin-top: 20px;
            text-align: center; 
            background-color: #7FFFD4;
            border-radius: 8px; 
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); 
        }

        .h4 {       
            font-size: 18px;
            color: #333;
            margin-bottom: 10px; 
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>Detail Pemesanan</h1>
        <div class="table-container">
            <?php foreach ($tickets as $data) : ?><br>
                <th>Nomor Order : </th>
                <td><?= $data["id_order"]; ?></td>
            <table>
                    <tr>
                        <th>Nama Maskapai</th>
                        <td><?= $data["nama_maskapai"]; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Tiket</th>
                        <td><?= $data["jumlah_tiket"]; ?></td>
                    </tr>
                    <tr>
                        <th>Rute Asal</th>
                        <td><?= $data["rute_asal"]; ?></td>
                    </tr>
                    <tr>
                        <th>Rute Tujuan</th>
                        <td><?= $data["rute_tujuan"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Keberangkatan</th>
                        <td><?= $data["tanggal_pergi"]; ?></td>
                    </tr>
                    <tr>
                        <th>Waktu Berangkat</th>
                        <td><?= $data["waktu_berangkat"]; ?></td>
                    </tr>
                    <tr>
                        <th>Waktu Tiba</th>
                        <td><?= $data["waktu_tiba"]; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp <?= number_format($data["harga"]); ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $data["status"]; ?></td>
                    </tr>
                    
                </table>
                <?php endforeach; ?>

                <div class="total-box">
                    <h4> Total = Rp. <?= number_format($grandtotal); ?>
                    </h4>
                </div>
        </div>
    </div>
</body>
</html>
