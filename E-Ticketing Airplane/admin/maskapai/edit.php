<?php
session_start();
require 'functions.php';

$id = $_GET["id"];
$maskapai = query("SELECT * FROM maskapai WHERE id_maskapai = '$id'")[0];

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$maskapai = query("SELECT * FROM maskapai WHERE id_maskapai = '$id'")[0];

if(isset($_POST["kirim"])){
    if(editMaskapai($_POST) > 0){
        echo"
            <script type='text/javascript'>
                alert('Yay! Data maskapai berhasil diedit');
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo"
        <script type='text/javascript'>
            alert('Yahhh Data maskapai gagal diedit:(');
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

h3 {
    text-align: center;
    color: #333;
}

form {
    width: 30%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
    color: #333;
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
<div class="main" style="margin-top:50px;">
    <h3>Edit Data Maskapai</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_maskapai" value="<?= $maskapai["id_maskapai"]; ?>">

            <label for="logo_maskapai">Logo Maskapai</label>
            <input type="file" name="logo_maskapai" id="logo_maskapai" class="form-control" value="<?= $maskapai["logo_maskapai"] ?>"><br><br>

            <label for="nama_maskapai">Nama maskapai</label>
            <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control" value="<?= $maskapai["nama_maskapai"] ?>"> <br><br>

            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="<?= $maskapai["kapasitas"] ?>"> <br><br>

            <button type="submit" name="kirim">Edit</button>
        </form>
</div>