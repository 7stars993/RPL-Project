<?php 
$title = "data promo | Admin Dashboard";
$page = "pro";
include "templates/header.php";

require_once BASEPATH . "/data/promo.php";

if (isset($_GET['hapus'])) {
  $success = deletePromo($_GET['hapus']);
}

// Mengatur pagination
$promo = getAllPromo();
$total_promo = count($promo);
$limit = 10;
$total_page = ceil($total_promo / $limit);
$active_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($active_page > 1) ? ($active_page * $limit) - $limit : 0;


$no = ($active_page * $limit) - $limit + 1;
?>
<!-- Main Start -->
<main class="main-container">
  <div class="main-title">
    <h2>DATA PROMO</h2>
    <a href="kelola_promo.php" class="btn btn-blue">
      <i class="fa fa-plus"></i>
      Tambah
    </a>
    
    <!-- Success Alert -->
    <?php 
        if (isset($success) && $success) {
            echo "<div class='form-success'>Data Berhasil DIhapus</div>";
            header("Refresh: 1; url=promo.php");
        }
    ?>
  </div>

  <!-- Pagination View -->
  <?php pagination($total_page, $active_page) ?>

  <!-- Table Start -->
  <div class="table-style">
    <table>
      <tr>
        <th>Kode</th>
        <th>Nama Promo</th>
        <th>Potongan</th>
        <th>Keterangan</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Aksi</th>
      </tr>
      <?php foreach ($promo as $row): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['NAMA_PROMO']; ?></td>
        <td><?= $row['POTONGAN']; ?></td>
        <td><?= $row['KETERANGAN']; ?></td>
        <td><?= $row['TANGGAL_MULAI']; ?></td>
        <td><?= $row['TANGGAL_SELESAI']; ?></td>
        <td>
          <a href="kelola_promo.php?ubah=<?= $row['KODE_PROMO']; ?>" class="icon btn-yellow">
            <i class="fa fa-edit"></i>
          </a>
          <a href="?hapus=<?= $row['KODE_PROMO']; ?>" class="icon btn-red">
            <i class="fa fa-trash"></i>
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <!-- Table End -->
</main>
<!-- Main End -->
<?php include "templates/footer.php" ?>