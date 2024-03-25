<?php
session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$jadwal = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id'")[0];

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");

if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data jadwal penerbangan berhasil diedit!');
                window.location = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yahhh data jadwal penerbangan gagal diedit :(');
                window.location = 'index.php';
            </script>
        ";
    }
}

?>

<style> 
h1 {
    text-align: center;
    color: #333;
}

.main {
    width: 35%;
    margin: 0 auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   justify-content: center;
}

label {
    font-weight: bold;
}

input,select {
    width: 90%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
button {
    display: block;
    width: 100%;
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
<div class="main" style="margin-top: 70px;">
    <h1>Edit Data Jadwal Penerbangan</h1>
    <form action="" method="post">
        <input type="hidden" name="id_jadwal" value="<?= $jadwal["id_jadwal"]; ?>">

        <label for="id_rute">Pilih Rute</label><br>
        <select name="id_rute" id="id_rute" class="form-control">
            <option value="<?= $jadwal["id_rute"]; ?>"><?= $jadwal["nama_maskapai"]; ?> - <?= $jadwal["rute_asal"]; ?> - <?= $jadwal["rute_tujuan"]; ?></option>
            <?php foreach($rute as $data) : ?>
                <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="waktu_berangkat">Waktu Berangkat</label><br>
        <input type="time" name="waktu_berangkat" class="form-control" id="waktu_berangkat" value="<?= $jadwal["waktu_berangkat"]; ?>"><br><br>

        <label for="waktu_tiba">Waktu Tiba</label><br>
        <input type="time" name="waktu_tiba" class="form-control" id="waktu_tiba" value="<?= $jadwal["waktu_tiba"]; ?>"><br><br>

        <label for="harga">Harga</label><br>
        <input type="number" name="harga" class="form-control" id="harga" value="<?= $jadwal["harga"]; ?>"><br><br>

        <label for="kapasitas_kursi">Kapasitas</label><br>
        <input type="number" name="kapasitas_kursi" id="kapasitas_kursi" value="<?= $jadwal["kapasitas_kursi"]; ?>"><br><br>

        <button type="submit" name="edit">Edit</button>
    </form>
</div>