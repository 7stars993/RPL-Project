<?php 
$title = "Beranda | McDonald's";
$page = "home";
include "templates/header.php";
?>
<div class="home-page">
  <!-- Header Start -->
  <header id="home">
    <!-- Navbar Include -->
    <?php include "templates/navbar.php" ?>

    <!-- Hero Start -->
    <div class="hero">
      <div class="content">
        <span class="title"> - Selamat Datang - </span>
        <h1>McDonald's</h1>
        <p>Menyediakan semua jenis makanan dan Minuman</p>
      </div>
    </div>
    <!-- Hero End -->
  </header>
  <!-- Header End -->

  <!-- Description Content Start -->
  <div class="restorant">
    <div class="restorant-content">
      <div class="restorant-content-head">
        <img src="<?= BASEURL; ?>/assets/img/home/gambar1.jpg" alt="gambar 1" />
      </div>
      <div class="description-content-desc">
        <p>
          Selamat datang di Dunia McDonald's, sebuah tempat yang menggabungkan kelezatan dengan kenyamanan dalam setiap kunjungan Anda.
          Di situs web ini, kami mengajak Anda untuk memasuki dunia kami yang penuh variasi rasa dan kegembiraan. 
          Mulai dari ikoniknya Big Mac yang memikat selera hingga kelezatan McNuggets yang tidak bisa ditolak, menu kami dirancang untuk memenuhi selera dan keinginan setiap pelanggan.
        </p>
        <p>
          Dapatkan pengalaman menjelajah yang menarik dengan menjelajahi menu kami yang luas, termasuk makanan utama, hidangan sampingan, camilan, dan minuman yang menyegarkan. 
          Setiap hidangan dipersiapkan dengan bahan-bahan berkualitas dan disajikan dengan cinta, sehingga setiap gigitan membawa kebahagiaan yang tak terlupakan.
        </p>
        <p>
        Namun, McDonald's bukan hanya tentang makanan; kami juga bangga menjadi bagian dari komunitas Anda. 
        Di sini, Anda akan menemukan informasi tentang inisiatif kami dalam mendukung lingkungan, kesehatan, dan pendidikan. 
        Kami berkomitmen untuk memberikan kontribusi positif kepada masyarakat di mana kami beroperasi, dan kami berharap dapat berbagi semangat kami dengan Anda.
        </p>
        <p>
        Nikmati berbagai penawaran menarik, promosi eksklusif, dan berita terbaru tentang produk kami yang selalu diperbarui. Temukan lokasi restoran terdekat dengan mudah dan lihat jam operasionalnya untuk merencanakan kunjungan Anda secara optimal.
        </p>
        <p>
        Dalam situs web kami, Anda akan menemukan segala sesuatu yang Anda butuhkan untuk pengalaman bersantap Anda bersama McDonald's. Dengan layanan yang cepat, ramah, dan penuh kehangatan, kami berkomitmen untuk membuat setiap kunjungan Anda menjadi momen yang menyenangkan dan tak terlupakan.
        </p>
        <P>
        Terima kasih telah memilih McDonald's sebagai pilihan Anda untuk bersantap. Kami berharap Anda menikmati setiap detiknya, dari setiap gigitan hingga senyum yang kami bagikan. Selamat menikmati!
        </P>
      </div>
    </div>
  </div>
  <!-- Description End  -->

  <!-- Kategori Start -->
  <div class="menu-selection" id="menu">
    <h1>Kategori Makanan</h1>

    <div class="category-menu">
      <a href="menu.php?kat=Sarapan">
        <div class="category-menu-list">
          <div class="category-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/home/kategori1.jpg" alt="Kategori Ramen" />
          </div>
          <div class="category-menu-list-desc">
            <h3>Sarapan Pagi</h3>
          </div>
        </div>
      </a>

      <a href="menu.php?kat=Daging">
        <div class="category-menu-list">
          <div class="category-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/home/kategori2.jpg" alt="Kategori Sushi" />
          </div>
          <div class="category-menu-list-desc">
            <h3>Daging Sapi</h3>
          </div>
        </div>
      </a>

      <a href="menu.php?kat=Ayam">
        <div class="category-menu-list">
          <div class="category-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/home/kategori3.jpg" alt="Kategori Onigiri" />
          </div>
          <div class="category-menu-list-desc">
            <h3>Ayam</h3>
          </div>
        </div>
      </a>

      <a href="menu.php?kat=Ikan">
        <div class="category-menu-list">
          <div class="category-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/home/kategori4.jpg" alt="Kategori Udon" />
          </div>
          <div class="category-menu-list-desc">
            <h3>Ikan</h3>
          </div>
        </div>
      </a>

      <a href="menu.php?kat=Minuman">
        <div class="category-menu-list">
          <div class="category-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/home/kategori5.jpg" alt="Kategori Sashimi" />
          </div>
          <div class="category-menu-list-desc">
            <h3>Minuman</h3>
          </div>
        </div>
      </a>
    </div>
  </div>
  <!-- Kategori End -->

  <!--Promo Start-->
  <div class="promo-selection" id="promo">
    <h1>Promo Makanan</h1>

    <div class="promo-menu">
      <a href="promo.php">
        <div class="promo-menu-list">
          <div class="promo-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/promo/promo1.jpg" alt="Promo Akhir Bulan" />
          </div>
          <div class="promo-menu-list-desc">
            <h3>Akhir Bulan Ceria!</h3>
            <p>diskon 30% atau 30rb di aplikasi McDonald's</p>
            <p>Berlaku 24-25 april 2024</p>
          </div>
        </div>
      </a>

      <a href="promo.php">
        <div class="promo-menu-list">
          <div class="promo-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/promo/promo2.jpg" alt="Berdua Lebih Hemat" />
          </div>
          <div class="promo-menu-list-desc">
            <h3>Berdua Lebih Hemat</h3>
            <p>Khusus Pesan Antar</p>
            <p>Berlaku hingga 31 Mei 2024</p>
          </div>
        </div>
      </a>

      <a href="promo.php">
        <div class="promo-menu-list">
          <div class="promo-menu-list-head">
            <img src="<?= BASEURL; ?>/assets/img/promo/promo3.jpg" alt="Frappe Carnival" />
          </div>
          <div class="promo-menu-list-desc">
            <h3>Frappe Carnival</h3>
            <p>Setiap Hari Jumat Selama Bulan April</p>
            <p>Berlaku hingga26 april 2024</p>
          </div>
        </div>
      </a>
    </div>
  </div>
  <!--Promo End-->

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