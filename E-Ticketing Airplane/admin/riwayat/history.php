<?php
$page = "riwayat";

// Mulai session
session_start();

// Inisialisasi koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'e-ticketing airplane');

// Ambil ID user dari session
$id_user = $_SESSION["id_user"];

// Query untuk mendapatkan data pemesanan
$query = "SELECT order_tiket.id_order, order_tiket.struk, order_tiket.status
          FROM order_tiket
          INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order
          INNER JOIN user ON order_detail.id_user = user.id_user
          WHERE user.id_user = '$id_user'
          GROUP BY order_tiket.id_order";

$orderTiket = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pemesanan</title>

<style> 
h1 {
    text-align: center;
    margin-bottom: 20px;
}

a:hover {
    background-color: #45a049;
}

table {
    width: 80%;
    border-collapse: collapse;
    margin-left: 290px;
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

button {
    background-color: #7FFFD4;
}

</style>

</head>
<body>
<?php require '../../layouts/sidebar_admin.php'; ?>
    <div class="list-tiket-pesawat">
        <h1>Riwayat Transaksi</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No Order</th>
                <th>Struk</th>
                <th>Status</th>
            </tr>

            <?php $no = 1; ?>
            <?php while ($data = mysqli_fetch_assoc($orderTiket)) : ?>
            <tr>
                <td><?= $data["id_order"]; ?></td>
                <td><?= $data["struk"]; ?></td>
                <td><?= $data["status"]; ?></td>
                <!-- Tambahkan opsi sesuai kebutuhan -->
            </tr>
            <?php $no++; ?>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
// Tutup koneksi database
mysqli_close($conn);
?>