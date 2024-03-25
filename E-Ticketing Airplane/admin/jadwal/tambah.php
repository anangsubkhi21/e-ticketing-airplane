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

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "<script type='text/javascript'>
        setTimeout(function () {
            swal({
                    title: 'Berhasil',
                    text: 'Yay! data berhasil ditambahkan',
                    type: 'success',
                    timer: 3200,
                    showConfirmButton: true
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('index.php');
            } ,2000);
            </script>";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data jadwal penerbangan gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");


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
    width: 95%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    display: block;
    width: 95%;
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
    <h1>Tambah Jadwal Penerbangan</h1>
        <form action="" method="POST">
            <label for="id_rute">Pilih Rute</label><br />
            <select name="id_rute" id="id_rute">
                <?php foreach($rute as $data) : ?>
                <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
                <?php endforeach; ?>
            </select><br /> <br />

            <label for="waktu_berangkat">Waktu Berangkat</label><br />
            <input type="time" name="waktu_berangkat" id="waktu_berangkat"><br /><br />

            <label for="waktu_tiba">Waktu Tiba</label><br />
            <input type="time" name="waktu_tiba" id="waktu_tiba"><br /><br />

            <label for="harga">Harga</label><br />
            <input type="number" name="harga" id="harga"><br /><br />

            <label for="kapasitas_kursi">Kapasitas</label><br/>
            <input type="number" name="kapasitas_kursi" id="kapasitas_kursi"><br><br>

            <button type="submit" name="tambah">Tambah</button>
        </form>
</div>