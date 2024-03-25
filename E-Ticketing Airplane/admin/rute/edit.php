<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Silahkan login terlebih dahulu ya!');
            window.location = '../auth/login/'
        </script>
    ";
}

$id = $_GET["id"];
$rute = query("SELECT * FROM rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_rute = '$id'")[0];

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");

if(isset($_POST["edit"])){
    if(edit($_POST) > 0){                                                      
        echo "
        <script type='text/javascript'>
            alert('Yay! data rute berhasil di edit!');
            window.location = 'index.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Yah... data rute gagal di edit!');
            window.location = 'index.php'
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
    width: 30%;
    margin: 0 auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  
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
    <h1>Edit Rute</h1>
    <form action="" method="POST">
        <input type="hidden" name="id_rute" value="<?= $rute["id_rute"]; ?>">

        <label for="nama_maskapai">Nama Maskapai</label><br />
            <select name="id_maskapai" id="id_maskapai">  
                <option value="<?= $rute["id_maskapai"]; ?>"><?= $rute["nama_maskapai"]; ?></option>
                <?php foreach($maskapai as $data) : ?>
                    <?php if($data["id_maskapai"] != $rute["id_maskapai"]) : ?>
                        <option value="<?= $data["id_maskapai"]; ?>"><?= $data["nama_maskapai"]; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select><br /> <br />

            <label for="rute_asal">Rute Asal</label><br />
            <select name="rute_asal" id="rute_asal">
                <option value="<?= $rute["rute_asal"]; ?>"><?= $rute["rute_asal"]; ?></option>
                <?php foreach($kota as $data) : ?>
                    <?php if($data["nama_kota"] != $rute["rute_asal"]) : ?>
                        <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select><br /> <br />

            <label for="rute_tujuan">Rute Tujuan</label><br />
            <select name="rute_tujuan" id="rute_tujuan">
                <option value="<?= $rute["rute_tujuan"]; ?>"><?= $rute["rute_tujuan"]; ?></option>
                <?php foreach($kota as $data) : ?>
                    <?php if($data["nama_kota"] != $rute["rute_tujuan"]) : ?>
                        <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select><br /> <br />

        <label for="tanggal_pergi">Tanggal Pergi</label><br />
        <input type="date" name="tanggal_pergi" id="tanggal_pergi" value="<?= $rute["tanggal_pergi"]; ?>"><br /><br />

        <button type="submit" name="edit">Edit</button>
    </form>
</div>