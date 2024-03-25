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

$id = $_GET["id"];
$pengguna = query("SELECT * FROM user WHERE id_user = '$id'")[0];


if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data pengguna berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yah.. data pengguna gagal diedit:(')
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
    <h1>Edit Data Pengguna</h1>
    <form action="" method="POST">
        <input type="hidden" name="id_user" value="<?= $pengguna["id_user"]; ?>">
        <label for="username">Username</label></br>
        <input type="text" name="username" id="username" class="form-control" value="<?= $pengguna["username"]; ?>"></br></br>

        <label for="nama_lengkap">Nama Lengkap</label></br>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $pengguna["nama_lengkap"]; ?>"></br></br>

        <label for="password">Password</label></br>
        <input type="password" name="password" id="password" class="form-control" value="<?= $pengguna["password"]; ?>"></br></br>

        <label for="roles">Roles</label></br>
        <select name="roles" id="roles">
            <option value="<?= $pengguna["roles"]; ?>"><?= $pengguna["roles"]; ?></option>
            <option value="Pelanggan">Pelanggan</option>
            <option value="Maskapai">Maskapai</option>    
        </select></br></br>

        <button type="submit" name="edit">edit</button>
    </form>
</div>