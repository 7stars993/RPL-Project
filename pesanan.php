<?php 
$title = "Daftar Pesanan | McDonald's";
$page = "dafpes";
include "templates/header.php";

require_once "data/transaksi.php";
if(isset($_GET['hapus'])) $success = deleteOrdersById($_GET['hapus']);

// Mengatur Pagination
$orders = getAllOrdersById();
$total_transaksi = count($orders);
$limit = 8;
$total_page = ceil($total_transaksi / $limit);
$active_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($active_page > 1) ? ($active_page * $limit) - $limit : 0;

$orders = getAllOrdersByIdAndLimit($limit, $offset);
$no = ($active_page * $limit) - $limit + 1;
?>
<!-- Navbar Include -->
<?php include "templates/navbar.php" ?>

<!-- Content Start -->
<div class="content">
    <!-- Pesanan Page Start -->
    <div class="pesanan-page">
        <!-- Header Start -->
        <div class="header">
            <h1>Daftar Pesanan Anda</h1>

            <!-- Success Alert -->
            <?php 
                if (isset($success) && $success) {
                    echo "<div class='form-success'>Pesanan berhasil dibatalkan</div>";
                    header("Refresh: 1; url=pesanan.php");
                }
            ?>
        </div>
        <!-- Header End -->

        <!-- Table Start -->
        <div class="table-style">
            <table>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pesan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($orders): ?>
                    <?php foreach ($orders as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['TANGGAL_PESAN']; ?></td>
                        <td><?= "Rp " . number_format($row["TOTAL"], 0, ',', '.');?></td>
                        <td><?= $row['STATUS'] == 0 ? "Belum Dibayar" : "Sudah Dibayar"; ?></td>
                        <td class="action-orders">
                            <?php if ($row['STATUS'] == 0): ?>
                                <a href="konfirmasi.php?id=<?= $row['KODE_TRANSAKSI']; ?>" class="btn btn-blue">Bayar Pesanan</a>
                                <a href="?hapus=<?= $row['KODE_TRANSAKSI']; ?>" class="btn btn-red">Batalkan</a>
                            <?php else: ?>
                                <a href="detail_pesanan.php?id=<?= $row['KODE_TRANSAKSI']; ?>" class="btn btn-yellow">Detail Pesanan</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="empty-orders">
                        <td colspan="5">Pesanan Masih Kosong</td>
                    </tr>
                <?php endif ?>
                </table>
        </div>
        <!-- Table End -->

        <!-- Pagination View -->
        <?php pagination($total_page, $active_page); ?>
    </div>
    <!-- Pesanan Page End -->
</div>
<!-- Content End -->
<?php include "templates/footer.php" ?>
