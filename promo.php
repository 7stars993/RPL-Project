<?php 
$title = "Beranda | McDonald's";
$page = "promo";                
include "templates/header.php";

require_once "data/promo.php";
$data = getAllPromoNotExpired();
?>
<div class="promo-page">
  <!-- Header Start -->
  <header id="promo">
    <!-- Navbar Include -->
    <?php include "templates/navbar.php" ?>

    <!-- Hero Start -->
    <div class="hero">
      <div class="content">
        <span class="title"> - Selamat Datang - </span>
        <h1>McDonald's</h1>
        <p>Menyediakan makan-makan Cepat Saji</p>
      </div>
    </div>
    <!-- Hero End -->
  </header>
  <!-- Header End -->

  <!-- Promo Start -->
  <div class="promo-selection" id="promo">
    <h1>Promo Makanan</h1>
    <div class="promo-menu">
        <?php foreach($data as $row): ?>
        <div class="promo-menu-list">
          <div class="promo-menu-list-head">
            <img src="<?= BASEASSET . "/img/Promo/" . $row['FOTO_PROMO']; ?>" alt="<?= $row['NAMA_PROMO']; ?>" />
          </div>
          <div class="promo-menu-list-desc">
            <h3><?= $row['NAMA_PROMO']; ?></h3>
            <p></p>
            <p><?= $row['TANGGAL_MULAI']; ?> Sampai <?= $row['TANGGAL_SELESAI']; ?></p>
          </div>
        </div>
        <?php endforeach ?>
    </div>
  </div>
  <!-- promo End -->

  <!-- Footer Start -->
  <footer class="footer">
    <div class="row">
      <div class="footer-col">
        <h4>company</h4>
        <ul>
          <li><a href="#">about us</a></li>
          <li><a href="#">our services</a></li>
          <li><a href="#">privacy policy</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>get help</h4>
        <ul>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">order status</a></li>
          <li><a href="#">payment options</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>online delivery</h4>
        <ul>
          <li><a href="#">McDonald's</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>follow us</h4>
        <div class="social-links">
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer End -->
</div>
<?php include "templates/footer.php" ?>