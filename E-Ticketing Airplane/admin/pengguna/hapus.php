<?php
session_start();

require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "
    <script type='text/javascript'>
        alert('Yay! data pengguna berhasil dihapus!')
        window.location = 'index.php'
    </script>
";
}else{
    echo "
    <script type='text/javascript'>
        alert('Yah.. data pengguna gagal dihapus:(')
        window.location = 'index.php'
    </script>
";
}

?>