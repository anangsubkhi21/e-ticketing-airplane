<?php require 'layouts/navbar.php'; ?>

<?php 
$jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai ORDER BY tanggal_pergi, waktu_berangkat");

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = $_GET['query'];
    $jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
                                INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                                WHERE nama_maskapai LIKE '%$search_query%' OR rute_asal LIKE '%$search_query%' OR rute_tujuan LIKE '%$search_query%' 
                                ORDER BY tanggal_pergi, waktu_berangkat");
}

?>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="100">
      <img src="assets/image/banner.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="100">
      <img src="assets/image/banner1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/image/banner2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> 

<h1 style="color: #DC8686;">Jadwal Penerbangan E-Ticketing</h1>
<form action="index.php" method="get">
    <input type="text" id="search_query" name="query" placeholder="Mau pergi kemana nih?" required>
    <button type="submit">Search</button>
</form>

<div class="list-tiket-pswt">
    <div class="wrapper-tiket-pswt">
        <?php if (empty($jadwalPenerbangan)) : ?>
            <p>Penerbangan Tidak ada</p>
        <?php else : ?>
            <?php foreach($jadwalPenerbangan as $data) : ?>
                <div class="card-tiket-pswt">
                    <a href="detail.php?id=<?= $data["id_jadwal"] ?>">
                        <div class="image"><img src="assets/image/<?= $data["logo_maskapai"]; ?>" width="80"></div><br>
                        <div class="nama-maskapai"><?= $data["nama_maskapai"]; ?></div>
                        <div class="rute-penerbangan"><?= $data["rute_asal"] ?> - <?= $data["rute_tujuan"]; ?></div>
                        <div class="text-harga">Rp<?= number_format($data["harga"]); ?></div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<footer class="footer-content">2024 Astrella Elga Ananta All rights reserved.</footer>