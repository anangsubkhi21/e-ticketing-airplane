<?php 

require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "
        <script type='text/javascript'>
            alert('Yay! data kota berhasil dihapus');
            window.location = 'index.php';
        </script>
    ";
}else{
    echo "
        <script type='text/javascript'>
            alert(Yahh data kota gagal dihapus:(');
            window.location = 'index.php';
        </script
    ";
}
?>