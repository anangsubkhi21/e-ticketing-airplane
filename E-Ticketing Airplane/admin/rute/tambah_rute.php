<?php
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
$kota = query("SELECT * FROM kota");

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data rute berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yahhh data rute gagal ditambahkan:(')
                window.location = 'index.php'
            </script>
        ";
    }
}
?>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

.main {
    width: 30%;
    margin: 0 auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h1 {
    text-align: center;
    color: #333;
}

select,input {
    width: 90%;
    margin: 0 auto;
    background-color: #fff;
    padding: 8px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
    color: #333;
}

button {
    display: block;
    width: 90%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>

<?php require '../../layouts/sidebar_admin.php'; ?>
<div class="main" style="margin-top: 50px;">
    <h1>Tambah Rute</h1>
        <form action="" method="POST">
            <label for="id_maskapai">Nama Maskapai</label><br/>
            <select name="id_maskapai" id="id_maskapai">
                <?php foreach($maskapai as $namaMaskapai) : ?>
                    <option value="<?= $namaMaskapai["id_maskapai"]; ?>"><?= $namaMaskapai["nama_maskapai"]; ?></option>
                <?php endforeach; ?>
            </select><br/><br/>

            <label for="rute_asal">Rute Asal</label><br/>
            <select name="rute_asal" id="rute_asal">
                <?php foreach($kota as $namaKota) : ?>
                    <option value="<?= $namaKota["nama_kota"]; ?>"><?= $namaKota["nama_kota"]; ?></option>
                <?php endforeach; ?>
            </select><br/><br/>

            <label for="rute_tujuan">Rute Tujuan</label><br/>
            <select name="rute_tujuan" id="rute_tujuan">
                <?php foreach($kota as $namaKota) : ?>
                    <option value="<?= $namaKota["nama_kota"]; ?>"><?= $namaKota["nama_kota"]; ?></option>
                <?php endforeach; ?>
            </select><br/><br/>

            <label for="tanggal_pergi">Tanggal Pergi</label><br/>
            <input type="date" name="tanggal_pergi" id="tanggal_pergi"><br/><br/>

            <button type="submit" name="tambah">Tambah</button>
        </form>
</div>