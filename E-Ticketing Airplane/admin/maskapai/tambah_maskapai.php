<?php 
session_start();
require 'functions.php';


if(isset($_POST["kirim"])){
    if(tambahMaskapai($_POST) > 0){
        echo "
        <script type='text/javascript'>
            alert('Yay! Data Maskapai Berhasil Ditambahkan')
            window.location = 'index.php';
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Yahhh Data Maskapai Gagal Ditambahkan:(')
            window.location = 'index.php';
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
<div class="main" style="margin-top: 50px;">
    <div class="box">
        <h3>Tambah Data Maskapai</h3>
        <form action="" method="POST" enctype="multipart/form-data">

        <label for="logo_maskapai">Logo Maskapai</label><br>
            <input type="file" name="logo_maskapai" id="logo_maskapai" class="form-control"><br><br/>

            <label for="nama_maskapai">Nama Maskapai</label><br>
            <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control"><br><br/>


            <label for="kapasitas">Kapasitas</label><br>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control"><br><br/>
            </select>
            <button tytpe="submit" name="kirim">Tambah</button>
        </form>
    </div>
</div>