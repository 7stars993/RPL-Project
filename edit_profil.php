<?php 
$title = "Edit Profil | McDonald's";
$page = "edprof";
include "templates/header.php";

require_once "data/pelanggan.php";
require_once "data/pembayaran.php";
require_once "libs/validate.php";
$pelanggan = getCustomerById();

// Melakukan edit data
$errors = array();
if (isset($_POST["edit"])) {
    $errors = validateEdit($errors, $_POST, $_FILES);

    if (empty($errors)) $edit = editCustomer($_POST, $_FILES);
}
?>
<!-- Include Navbar -->
<?php include "templates/navbar.php"; ?>

<!-- Form Edit Start -->
<div class="form-edit">    
    <!-- Form Profile Start -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <!-- Success Alert For Profile -->
        <?php 
            if (isset($edit) && $edit) {
                echo "<div class='form-success'>Data Berhasil Diubah</div>";
                header("Refresh: 1");
            }
        ?>
        
        <div class="input-group">
            <label for="username">Username</label>
            <div class="err-group">
                <input type="text" id="username" name="username" value="<?= $pelanggan['USERNAME_PELANGGAN']; ?>" readonly>
            </div>
        </div>
        <div class="input-group">
            <label for="nama">Nama</label>
            <div class="err-group">
                <input type="text" id="nama" name="nama" value="<?= $_POST['nama'] ?? $pelanggan['NAMA_PELANGGAN']; ?>">
                <span class="errForm"><?= ($errors['nameErr'] ?? ''); ?></span>
            </div>
        </div>
        <div class="input-group">
            <label for="nohp">Nomor Telepon</label>
            <div class="err-group">
                <input type="text"  id="nohp" name="nohp" value="<?= $_POST['nohp'] ?? $pelanggan['NO_TELP_PELANGGAN']; ?>">
                <span class="errForm"><?= ($errors['nohpErr'] ?? ''); ?></span>
            </div>
        </div>
        <div class="input-group">
            <label for="alamat">Alamat</label>
            <div class="err-group">
                <input type="text"  id="alamat" name="alamat" value="<?= $_POST['alamat'] ?? $pelanggan['ALAMAT_PELANGGAN']; ?>"> 
                <span class="errForm"><?= ($errors['alamatErr'] ?? ''); ?></span>
            </div>
        </div>
        <div class ="input-group">
            <label for="foto"> Foto Profil</label>
            <div class="err-group">
                <input type="file" id="gambar" name="gambar">
                <span class="errForm"><?= ($errors['gambarErr'] ?? ''); ?></span>
            </div>
        </div>
        <div class="input-group">
            <label>Jenis Kelamin</label>
            <div id="jenis_kelamin">
                <input type="radio" name="jenis_kelamin" id="jk1" value="L" <?= $pelanggan['JENIS_KELAMIN'] == "L" || (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "L") ? "checked" : "" ; ?> /> 
                <label for="jk1">Laki-Laki</label>
                <input type="radio" name="jenis_kelamin" id="jk2" value="P" <?= $pelanggan['JENIS_KELAMIN'] == "P" || (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "P") ? "checked" : "" ; ?> /> 
                <label for="jk2">Perempuan</label> 
            </div>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <div class="err-group">
                <input type="password" id="password" name="password" value="<?= $_POST['password'] ?? ""; ?>">
                <span class="errForm"><?= ($errors['passwordErr'] ?? ''); ?></span>
            </div>
        </div>
        <div class="input-group">
            <label for="password2">Konfirmasi Password</label>
            <div class="err-group">
                <input type="password" id="password2" name="password2">
                <span class="errForm"><?= ($errors['password2Err'] ?? ''); ?></span>
            </div>
        </div>

        <button type="submit" name="edit" class="btn btn-blue">
            <i class="fa fa-floppy-o"></i>
            Simpan Perubahan
        </button>
    </form>
    <!-- Form Profile End -->
</div>
<!-- Form Edit End -->
<?php include "templates/footer.php" ?>