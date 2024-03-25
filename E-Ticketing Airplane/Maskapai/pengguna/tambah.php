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
                alert('Yah.. data pengguna gagal ditambahkan:(')
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
    padding-left: 200px;
}

h1 {
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
    align-items: center;
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


<?php require '../../layouts/sidebar_maskapai.php'; ?>
<div class="main" style="margin-top: 50px;">
    <h1>Tambah Data Pengguna</h1>
    <form action="" method="POST">
        <label for="username">Username</label></br>
        <input type="text" name="username" id="username" class="form-control"></br></br>

        <label for="nama_lengkap">Nama Lengkap</label></br>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"></br></br>

        <label for="password">Password</label></br>
        <input type="password" name="password" id="password" class="form-control"></br></br>

        <label for="roles">Roles</label></br>
        <select name="roles" id="roles">
            <option value="Maskapai">Maskapai</option>
            <option value="Pelanggan">Pelanggan</option>
        </select></br></br>

        <button type="submit" name="tambah">Tambah</button>
    </form>
</div>