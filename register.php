<?php
$title = "Register | McDonald's";
$page = "regist";

session_start();
ob_start();

require_once "config/url.php";
require_once "libs/validate.php";
require_once "data/pelanggan.php";

// Jika sudah ada session login
if (isset($_SESSION["login"])){
    // apakah session login pelanggan / administrator / manager 
    if ($_SESSION['login'] == 'pelanggan') {
        header("Location: menu.php");
        exit();
    } else {
        header("Location: admin/index.php");
        exit();
    }
}

$errors = array();
if (isset($_POST["submit"])) {
    validateRegister($errors, $_POST, $_FILES);

    if (empty($errors)) $success = insertCustomer($_POST, $_FILES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="website icon" href="<?= BASEASSET; ?>/img/logo/icon.png">
    <link rel="stylesheet" href="<?= BASEASSET;?>/css/base.css">
    <link rel="stylesheet" href="<?= BASEASSET;?>/css/login.css">
    
    <title><?= $title; ?></title>
</head>
<body>
    <!-- Container Start -->
    <div class="container">
        <!-- Content Start -->
        <div class="content middle">
            <div class="register">
                <h2>Register</h2>
                <!-- Form Start -->
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <!-- Success Alert  -->
                    <?php 
                        if (isset($success) && $success) {
                            echo "<div class='form-success'>Data Berhasil Ditambah</div>";
                            header("Refresh: 1; url=login.php");
                        }
                    ?>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= $_POST['nama'] ?? "" ?>">
                    <span class="errForm">
                        <?= ($errors['nameErr'] ?? ''); ?>
                    </span>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"
                        value="<?= $_POST['username'] ?? "" ?>">
                    <span class="errForm">
                        <?= ($errors['usernameErr'] ?? ''); ?>
                    </span>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?= $_POST['password'] ?? "" ?>">
                    <span class="errForm">
                        <?= ($errors['passwordErr'] ?? ''); ?>
                    </span>
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2">
                    <span class="errForm">
                        <?= ($errors['password2Err'] ?? ''); ?>
                    </span>
                    <label for="foto"> Foto Profil</label>
                    <input type="file" id='gambar' name='gambar'>
                    <span class="errForm">
                        <?= ($errors['gambarErr'] ?? ''); ?>
                    </span>
                    <label for="nohp">No Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input class="input-group-input" type="text" name="nohp" id="nohp" placeholder="8XXXXXXXXXXXX"
                            value="<?= $_POST['nohp'] ?? "" ?>">
                    </div>
                    <span class="errForm">
                        <?= ($errors['nohpErr'] ?? ''); ?>
                    </span>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        value="<?= $_POST['alamat'] ?? "" ?>">
                    <span class="errForm">
                        <?= ($errors['alamatErr'] ?? ''); ?>
                    </span>
                    <label for="jenis_kelamin">Jenis-Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <span class="errForm">
                        <?php echo $attention ?? '' ?>
                    </span>
                    <button type="submit" class="btn btn-yellow submit" name="submit">Daftar</button>
                    <p>Sudah punya akun? <span><a href="login.php">Login</a></span></p>
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Content End -->
    </div>
    <!-- Container End -->
</body>
</html>