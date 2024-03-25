<?php

session_start();
unset($_SESSION["username"]);
echo "
    <script type = 'text/javascript'>
        alert('Anda berhasil logout')
        window.location = 'index.php'
    </script>
";

?>