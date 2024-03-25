<?php

require 'layouts/navbar.php';
if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = 'index.php';
    </script>
    ";
}

?>
<style>
    .checkout-pswt {
    width: 80%;
    margin: 0 auto;
    }

    .checkout {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    }

    .wrapper-checkout {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    } 

    .card-checkout-tiket-pswt {
    width: 30%;
    background-color: #fff;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    }

    .card-checkout-tiket-pswt .image {
    text-align: center;
    }

    .card-checkout-tiket-pswt img {
    max-width: 100%;
    }

    .nama-maskapai {
    font-weight: bold;
    margin-top: 10px;
    }

    .tanggal-pergi,
    .waktu-berangkat,
    .rute-penerabangan,
    .text-harga,
    .total {
    margin-top: 5px;
    }

    h2{
    margin-left: 420px;
    }
    
    button[type='submit'] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    margin-left: 420px;
    }

    button[type='submit']:hover {
    background-color: #45a049;
    }

    label {
    font-weight: bold;
    margin-left: 298px;
    }

    input[type='text'] {
    width: 50%; 
    padding: 10px;
    margin-top: 5px;
    margin-right: 50px;
    border: 1px solid #ccc;
    border-radius: 5px;
    } 

    input[type='text']:disabled {
    background-color: #f2f2f2;
    }
</style>

<?php if(empty($_SESSION["cart"])) {
    ?>
    <h1>Keranjang Kosong</h1>
    <?php
}else{
?>

    <div class="checkout-pswt">
        <h1>Checkout</h1>
        <div class="checkout">
            <form action="" method="post">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"]; ?>">
                <input type="text" value="<?= $_SESSION["nama_lengkap"]; ?>" disabled>
                <?php $grandtotal = 0; ?>
                <?php foreach ($_SESSION["cart"] as $id_tiket => $kapasitas) :
                    $tiket = query("SELECT * FROM jadwal_penerbangan 
                                    INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                    INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                                    WHERE jadwal_penerbangan.id_jadwal = $id_tiket")[0];

                    $totalharga = $tiket["harga"] * $kapasitas;
                    $grandtotal += $totalharga;?>
                        <input type="hidden" name="id_penerbangan" value="<?= $id_tiket; ?>"><br><br>
                        <input type="hidden" name="jumlah_barang" value="<?= $kapasitas; ?>"><br><br>
                        <input type="hidden" name="subtotal" value="<?= $totalHarga; ?>"><br><br>
                <?php endforeach; ?>

                <h1 style="margin-top: 50px;">List Tiket</h1>
                <div class="wrapper-checkout">
                    <?php $grandtotal = 0; ?>
                    <?php foreach ($_SESSION["cart"] as $id_tiket => $kapasitas) :
                        $tiket = query("SELECT * FROM jadwal_penerbangan 
                                        INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                        INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                                        WHERE jadwal_penerbangan.id_jadwal = $id_tiket")[0];
    
                        $totalharga = $tiket["harga"] * $kapasitas;
                        $grandtotal += $totalharga;?>
                                    <div class="card-checkout-tiket-pswt">
                                        <a href="detail.php?id=<?= $tiket["id_jadwal"] ?>" style="text-decoration: none; color: #000;">
                                            <div class="image"><img src="assets/image/<?= $tiket["logo_maskapai"]; ?>" width="100"></div><br>
                                            <div class="nama-maskapai"><?= $tiket["nama_maskapai"]; ?></div>
                                            <div class="tanggal-pergi"><?= $tiket["tanggal_pergi"]; ?></div>
                                            <div class="waktu-berangkat"><?= $tiket["waktu_berangkat"]; ?></div>
                                            <div class="rute-penerabangan"><?= $tiket["rute_asal"] ?> - <?= $tiket["rute_tujuan"]; ?></div>
                                            <div class="text-harga">Rp <?= number_format($tiket["harga"]); ?>@<?= $kapasitas; ?>Tiket</div>
                                            <div class="total">Rp <?= number_format($totalharga); ?></div>
                                        </div>

                    <?php endforeach; ?>
                </div>
                <h2>Grand Total <br>
                Rp. <?= number_format($grandtotal); ?>
                </h2>
                <button type="submit" name="checkout">Checkout</button>
            </form>
        </div>
    </div>
    <?php
} ?>
                                                                                                                                                                                                             
<?php 
    if (isset($_POST['checkout'])){
        if(checkout($_POST)){
            echo "
            <script type='text/javascript'>
                alert('berhasil');
                window.location = 'history.php'
            </script>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }
