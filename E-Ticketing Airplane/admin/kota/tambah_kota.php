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

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data kota berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yah.. data kota gagal ditambahkan:(')
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

h1 {
    text-align: center;
    color: #333;
}

form {
    width: 20%;
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
    <h1>Tambah Data Kota</h1>
    <form action="" method="POST">

        <label for="nama_kota">Nama Kota</label></br>
        <input type="text" name="nama_kota" id="nama_kota" class="form-control"></br></br>

        <button type="submit" name="tambah">Tambah</button>
    </form>
</div>