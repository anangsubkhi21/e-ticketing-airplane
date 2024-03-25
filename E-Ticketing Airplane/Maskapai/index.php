<?php
$page = "Dashboard"; 

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!')
        window.location = '../auth/login/'
    </script>
";
}

?>

<?php require '../layouts/sidebar_maskapai.php'; ?>
<style>
    h1{
        margin-left:270px;
        text-align: center;
        margin-top: 200px;
    }
    .text{
        margin-left:270px;
        text-align: center;
    }
</style>
<h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
<div class="text">
    <h3>Selamat Datang Di Halaman Maskapai</h3>
</div>
