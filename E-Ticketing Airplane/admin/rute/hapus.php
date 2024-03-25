<?php 

require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "
        <script type='text/javascript'>
            alert('Yay! data rute berhasil dihapus');
            window.location = 'index.php';
        </script>
    ";
}else{
    echo "
        <script type='text/javascript'>
            alert(Yahhh data rute gagal dihapus:(');
            window.location = 'index.php';
        </script
    ";
}
?>