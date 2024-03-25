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
$kota = query("SELECT * FROM kota WHERE id_kota = '$id'")[0];


if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data kota berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yahhh data kota gagal diedit:(')
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
    width: 18%;
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

input{
    width: 85%;
    margin: 0 auto;
    background-color: #fff;
    padding: 5px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

button {
    display: block;
    width: 85%;
    padding: 8px;
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
<div class="main" style="margin-top:50px">
    <h1>Edit Data Kota</h1>
    <form action="" method="POST">
        <input type="hidden" name="id_kota" value="<?= $kota["id_kota"]; ?>">
  
        <label for="nama_kota">Nama Kota</label></br></br>
        <input type="text" name="nama_kota" id="nama_kota" value="<?= $kota["nama_kota"]; ?>"></br></br>

        <button type="submit" name="edit">edit</button>
    </form>
</div>