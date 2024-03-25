<?php

require 'layouts/navbar.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = 'index.php';
    </script>
    ";
}

$id_user = $_SESSION["id_user"];
$orderTiket = mysqli_query($conn, "SELECT order_tiket.id_order, order_tiket.struk, order_tiket.status, order_detail.id_order, order_detail.id_user, user.id_user FROM order_tiket
INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order
INNER JOIN user ON order_detail.id_user = user.id_user WHERE user.id_user = '$id_user' GROUP BY order_tiket.id_order");

?>

<style>
    /* Style untuk tabel */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Style untuk header kolom */
th {
    background-color:#7FFFD4;
    text-align: left;
    padding: 8px;
}

/* Style untuk baris pada tabel 
tr:nth-child(even) {
    background-color: #f2f2f2;
}
*/

/* Style untuk sel pada tabel */
td {
    padding: 8px;
}

/* Style untuk tautan Aksi */
td a {
    text-decoration: none;
    color: #756AB6;
    background-color: #D0E7D2;
}

td a:hover {
    color: #DFCCFB;
}

h1 {
    color: #DC8686;
}

.main {
    padding: 20px;
}

</style>
<div class="list-tiket-pesawat">
    <h1>History Pemesanan</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No Order</th>
            <th>Struk</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <td><?= $data["status"]; ?></td>
            <td>
                <a href="detail_history.php?id=<?= $data['id_order']; ?>">Detail</a>
            </td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</div>
