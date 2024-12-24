<nav class="navbar">
  <a href="index.php" class="navbar-logo">
    <img src="<?= BASEASSET; ?>/img/logo/white.png" alt="Logo Website" />
  </a>
  <div class="navbar-nav">
    <a href="index.php" class="<?= ($page=="home") ? "active" : ""; ?>">Beranda</a>
    <?php if(!isset($_SESSION['login'])):?>
      <a href="login.php">Login</a>
      <a href="register.php">Register</a>
    <?php else: ?>
      <a href="promo.php" class="<?= ($page=="promo") ? "active" : ""; ?>">Promo</a>
      <a href="menu.php" class="<?= ($page=="menu") ? "active" : ""; ?>">Menu</a>
      <a href="pesanan.php" class="<?= ($page=="dafpes" || $page=="detpes" || $page=="konfpem") ? "active" : ""; ?>">Daftar Pesanan</a>
        <a href="edit_profil.php" class="<?= ($page=="edprof") ? "active" : ""; ?>">
          <img src="<?= BASEASSET . "/img/profil/" . $_SESSION['pelanggan']['PROFIL']; ?>" alt="edit profil" />
        </a>
      <a href="logout.php">Logout</a> |
      <a href="maps.php" class="<?= ($page=="mps") ? "active" : ""; ?>">Toko Terdekat</a>
    <?php endif; ?>
  </div>
</nav>