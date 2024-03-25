<?php
require 'functions.php';
$id = $_GET["id"];

$query = mysqli_query($conn, "UPDATE order_tiket SET status = 'berhasil' WHERE id_order = '$id'");
if($query){
    echo "
        <script type='text/javascript'>
            alert('Data telah diverifikasi!');
            window.location = 'index.php';
        </script>
    ";
}
?>