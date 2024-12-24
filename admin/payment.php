<?php 
$title = "payment Makanan | Admin Dashboard";
$page = "pay";
include "templates/header.php";

require_once BASEPATH . "/libs/validate.php";
require_once BASEPATH . "/data/pembayaran.php";

// Menambah Pembayaran
if (isset($_POST["bri"])) {
    $errors = validatePayment($errors, $_POST);

    if (empty($errors)) $add = editPayment($_POST);
}

$metode = getAllPayment();
$no = 1;
$subTotal = 0;
?>  
<!-- Form Payment Start -->
<div class= form-edit >
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <h3>Tambahkan Metode Pembayaran</h3>

            <!-- SUccess Alert For Payment -->
            <?php 
                if (isset($add) && $add) {
                    echo "<div class='form-success'>Data Berhasil Ditambah</div>";
                    header("Refresh: 1");
                }
            ?>
            
            <div class="input-group">
                <label for="bri">Rekening BRI</label>
                <div class="err-group">
                    <input type="text" id="bri" name="bri" value="<?= $_POST['bri'] ?? getPaymentById("1")['NO_REKENING'] ?? ""; ?>">
                    <span class="errForm"><?= ($errors['bri'] ?? ''); ?></span>
                </div>
            </div>
            <div class="input-group">
                <label for="bca">Rekening BCA</label>
                <div class="err-group">
                    <input type="text" id="bca" name="bca" value="<?= $_POST['bca'] ?? getPaymentById("2")['NO_REKENING'] ?? ""; ?>">
                    <span class="errForm"><?= ($errors['bca'] ?? ''); ?></span>
                </div>
            </div>
            <div class="input-group">
                <label for="dana">Digital DANA</label>
                <div class="err-group">
                    <input type="text" id="dana" name="dana" value="<?= $_POST['dana'] ?? getPaymentById("3")['NO_REKENING'] ?? ""; ?>">
                    <span class="errForm"><?= ($errors['dana'] ?? ''); ?></span>
                </div>
            </div>
            <div class="input-group">
                <label for="ovo">Digital OVO</label>
                <div class="err-group">
                    <input type="text" id="ovo" name="ovo" value="<?= $_POST['ovo'] ?? getPaymentById("4")['NO_REKENING'] ?? ""; ?>">
                    <span class="errForm"><?= ($errors['ovo'] ?? ''); ?></span>
                </div>
            </div>

            <button type="submit" class="btn btn-green">
                <i class="fa fa-plus"></i>
                Tambah Metode
            </button>
    </form>
</div>
<!-- Form Payment End -->