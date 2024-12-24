<?php 
$title = "Konfirmasi Pembayaran | McDonald's";
$page = "konfpem";
include "templates/header.php";

require_once BASEPATH . "/libs/validate.php";
require_once "data/transaksi.php";
require_once "data/pembayaran.php";
require_once "data/promo.php";

$id = $_GET['id'];
if (isset($_POST['pay'])) {

  $errors = validateUploadBukti($errors, $_FILES);

  if (empty($errors)) $success = editOrders($id, $_POST, $_FILES);
} // mengubah status pada pesanan

$ordersDetail = getAllOrdersDetail($id);
$metode = getAllPayment();
$no = 1;
$subTotal = 0;
$potongan= getAllPromoNotExpired();
$diskon = count($potongan) < 1 ? 0 : $_POST['potongan'] ?? $potongan[0]['POTONGAN'];
?>

<!-- Include Navbar -->
<?php include "templates/navbar.php" ?>

<!-- Content Start -->
<div class="content">
  <!-- Konfirmasi Bayar Page Start -->
  <div class="konfirmasi-bayar-page">
    <!-- Form STart -->
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
      <!-- Header Start -->
      <div class="header">
        <h1>Konfirmasi Pembayaran - <?= $id; ?></h1>
        <div class="action">
          <div>
            <a class="back" href="pesanan.php">&laquo; Kembali</a>
          </div>
          <div>
            <h3>Pilih metode Pembayaran</h3>
            <select name="metode_bayar" id="metode_bayar">
              <?php if(empty($metode)): ?>
                <option value="0">--- Kosong ---</option>
              <?php else: ?>
                <?php foreach ($metode as $row): ?>
                <option value="<?= $row['NAMA_METODE']; ?>"><?= $row['NAMA_METODE'] ?> <?= $row['NO_REKENING'] ?></option>
                <?php endforeach; ?>
              <?php endif; ?>

            </select>
            
            <button class="btn btn-yellow bayar" type="<?= empty($metode) ? "button" : "submit"; ?>" name="pay">Bayar</button>
          </div>
        </div>
      </div>
      <!-- Header End -->

      <!-- Table Start -->
      <div class="table-style konfirmasi-bayar">
        <table>
            <tr>
              <th>No</th>
              <th>Nama Makanan</th>
              <th>Jumlah Pesanan</th>
              <th>Harga Makanan</th>
              <th>SubTotal</th>
            </tr>
            <?php if(empty($ordersDetail)): ?>
              <tr>
                <td colspan="5" class="empty-orders">Tidak ada Pesanan</td>
              </tr>
            <?php else: ?>
              <?php foreach ($ordersDetail as $row): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['NAMA_MAKANAN']; ?></td>
                <td class="action">
                  <input type="text" value="<?= $row['QTY']; ?>" data-stok="<?= $row['STOK_PRODUK']; ?>" name="qty[]" class="qty" readonly>
                  <input type="hidden" name="kode_makanan[]" value="<?= $row['KODE_MAKANAN']; ?>">
                  <input type="hidden" name="sisa_stok[]" value="<?= $row['STOK_PRODUK'] - $row['QTY']; ?>">
                </td>
                <td><?= "Rp " . number_format($row["HARGA_MAKANAN"], 0, ',', '.');?></td>
                <?php $hargaBaru = $row['QTY'] * $row['HARGA_MAKANAN']; $subTotal += $hargaBaru; ?>
                <td><?= "Rp " . number_format($hargaBaru, 0, ',', '.');?></td>
              </tr>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php 
              $ongkir = 5 / 100 * $subTotal;
              $total = $subTotal + $ongkir;
              $totalbayar = $total - $total * $diskon / 100;
            ?>

            <input type="hidden" name="total" value="<?= $total ?>">

            <tr>
              <th colspan="4">Ongkos Kirim</th>
              <td><?= "Rp " . number_format($ongkir, 0, ',', '.');?></td>
            </tr>
            <tr>
              <th colspan="4">Total</th>
              <td><?= "Rp " . number_format($total, 0, ',', '.');?></td>
            </tr>
            <tr>
              <th colspan="4"> Potongan </th>
              <td>
                <form action="" method="post"> 
                  <select name="potongan"> 
                    <?php if(empty($potongan)): ?>
                      <option value="0">--- Kosong ---</option>
                    <?php else: ?>
                      <?php foreach ($potongan as $row): ?>
                      <option value="<?= $row['POTONGAN']; ?>"><?= $row['NAMA_PROMO']; ?> <?= $row['POTONGAN'] ?> % </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                  <button type="submit">submit</button>
                </form>
              </td>
            </tr>
            <tr>
              <th colspan="4">Total Bayar</th>
              <td><b><?= "Rp " . number_format($totalbayar, 0, ',', '.');?></b></td>
            </tr>
            <tr>
              <th colspan="4"> Upload Bukti Pembayaran </th>
              <td>
                <input type="file" id="gambar" name="gambar">
                <span class="errForm"><?= ($errors['gambarErr'] ?? ''); ?></span>
              </td>
            </tr>
        </table>
      </div>
      <!-- Table End -->
    </form>
    <!-- Form End -->
  </div>
  <!-- Konfirmasi Bayar Page End -->
</div>
<!-- Content End -->
<?php include "templates/footer.php" ?>