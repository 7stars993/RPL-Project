<?php 
$title = isset($_GET['ubah']) ? "Ubah Promo" : "Tambah Promo";
$title .= " | Admin Dashboard";
$page = "kp";
include "templates/header.php";

require_once BASEPATH . "/libs/validate.php";
require_once BASEPATH . "/data/promo.php";

if (isset($_GET['ubah'])) {
  $promo = getPromoByKode($_GET['ubah']);
} else {
  $promo = [
    'KODE_PROMO' => '',
    'NAMA_PROMO' => '',
    'POTONGAN' => '',
    'KETERANGAN' => '',
    'TANGGAL_MULAI' => '',
    'TANGGAL_SELESAI' => '',
    'FOTO_PROMO' => '',
  ];
}

if (isset($_POST['ubah'])) {
  $errors = validatePromo($errors, $_POST, $_FILES);

  if (empty($errors)) $success = editPromo($_POST, $_FILES);
} else if (isset($_POST['tambah'])){
  $errors = validatePromo($errors, $_POST, $_FILES);

  if (empty($errors)) $success = insertPromo($_POST, $_FILES);
}
?>

<!-- Main Start -->
<main class="main-container">
  <div class="main-title">
    <h2><?= isset($_GET['ubah']) ? "Ubah Data Promo" : "Tambah Data Promo"; ?></h2>

    <!-- Success Alert -->
    <?php 
        if (isset($success) && $success) {
            echo "<div class='form-success'>Data Berhasil $success</div>";
            header("Refresh: 1; url=promo.php");
        }
    ?>
  </div>

  <!-- Form Start -->
  <div class="form-content">
    <form action="<?= $_SERVER['PHP_SELF'] . (isset($_GET['ubah']) ? '?ubah=' . $_GET['ubah'] : '') ; ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="fotoLama" value="<?= $promo['FOTO_PROMO']; ?>">
      <input type="hidden" name="kodepromo" value="<?= $promo['KODE_PROMO']; ?>">
      <div class="input-group">
          <label for="nama">Nama Promo</label>
          <div class="err-group">
              <input type="text" id="nama" name="nama" value="<?= $_POST['nama'] ?? $promo['NAMA_PROMO']; ?>">
              <span class="errForm"><?= ($errors['nameErr'] ?? ''); ?></span>
          </div>
      </div>
      <div class="input-group">
          <label for="diskon">Potongan</label>
          <div class="err-group">
              <input type="text" id="diskon" name="diskon" value="<?= $_POST['diskon'] ?? $promo['POTONGAN']; ?>">
              <span class="errForm"><?= ($errors['potonganErr'] ?? ''); ?></span>
          </div>
      </div>
      <div class="input-group">
          <label for="ket">Keterangan</label>
          <div class="err-group">
              <input type="text" id="ket" name="ket" value="<?= $_POST['ket'] ?? $promo['KETERANGAN']; ?>">
          </div>
      </div>
      <div class="input-group">
          <label for="gambar">Foto Promo</label>
          <div class="err-group">
              <input type="file" id="gambar" name="gambar" data-path="<?= $promo['FOTO_PROMO']; ?>" onchange="previewImg()">
              <span class="errForm"><?= ($errors['gambarErr'] ?? ''); ?></span>
          </div>
      </div>
      <div class="input-group">
          <label for="mulai">Tanggal Mulai</label>
          <div class="err-group">
            <input type="date" id="mulai" name="tanggal_mulai" value="<?= $_POST['tanggal_mulai'] ?? $promo['TANGGAL_MULAI']; ?>">
            <span class="errForm"><?= ($errors['tanggalMulaiErr'] ?? ''); ?></span>
          </div>
      </div>
      <div class="input-group">
          <label for="selesai">Tanggal Selesai</label>
          <div class="err-group">
            <input type="date" id="selesai" name="tanggal_selesai" value="<?= $_POST['tanggal_selesai'] ?? $promo['TANGGAL_SELESAI']; ?>">
            <span class="errForm"><?= ($errors['tanggalSelesaiErr'] ?? ''); ?></span>
          </div>
      </div>

      <!-- Action Submit -->
      <div class="input-action">
      <?php if(isset($_GET['ubah'])): ?>
        <button type="submit" name="ubah" class="btn btn-blue"> 
          <i class="fa fa-floppy-o"></i>
          Simpan Perubahan
        </button>
      <?php else: ?>
        <button type="submit" name="tambah" class="btn btn-green"> 
          <i class="fa fa-send"></i>
          Tambah
        </button>
      <?php endif; ?>
        <a href="promo.php" class="btn btn-red"> 
          <i class="fa fa-times"></i>
          Batal
        </a>
      </div>
    </form>

    <!-- Image Preview -->
    <div class="file-prev">
      <?php $path = $promo['FOTO_PROMO'] ? BASEASSET . '/img/promo/' . $promo['FOTO_PROMO'] : BASEASSET . '/img/menu/no-image.png' ?>
      <h3>Tampilan Gambar</h3>
      <img src="<?= $path ?>" class="img-prev" alt="Gambar Promo">
    </div>
  </div>
  <!-- Form End -->
</main>
<!-- Main End -->

<script>
  function previewImg() {
    const gambar = document.querySelector('#gambar');
    const gambarPromo = document.querySelector('.img-prev');

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function(e) {
      gambarPromo.src = e.target.result;
    }
  }
</script>
<?php include "templates/footer.php" ?>
