<?php
session_start();

require 'functions.php';

$id = $_GET["id"];

if(hapusMaskapai($id) > 0) {
    echo "
    <script type='text/javascript'>
        alert('Yay! data maskapai berhasil dihapus!')
        window.location = 'index.php'
    </script>
";
}else{
    echo "
    <script type='text/javascript'>
        alert('Yahhh data maskapai gagal dihapus:(')
        window.location = 'index.php'
    </script>
";

}

?>