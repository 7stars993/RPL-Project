<?php 
require_once BASEPATH . "/data/connection.php";

function getAllCustomer() {
    try {
		$statement = DB->query("SELECT * FROM pelanggan");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
    catch(PDOException $err){
        echo $err->getMessage();
    }
}

function getAllCustomerByLimit($limit, $offset) {
    try {
		$statement = DB->prepare("SELECT * FROM pelanggan LIMIT :limit OFFSET :offset");
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
    catch(PDOException $err){
        echo $err->getMessage();
    }
}

function getCustomerById() {
    try {
		$statement = DB->prepare("SELECT * FROM pelanggan WHERE ID_PELANGGAN = :id_pelanggan");
        $statement->bindValue(':id_pelanggan', $_SESSION['id_pelanggan']);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}
    catch(PDOException $err){
        echo $err->getMessage();
    }
}

function insertCustomer($data, $file) {
    $name = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars(hash('sha256', $data['password']));
    $nohp = htmlspecialchars($data['nohp']);
    $alamat = htmlspecialchars($data['alamat']);
    $profil = htmlspecialchars($file['gambar']['name']);
    $jeniskelamin = htmlspecialchars($data['jenis_kelamin']);

    try {
        $statement = DB->prepare("INSERT INTO pelanggan (
            USERNAME_PELANGGAN,
            PASSWORD_PELANGGAN,
            NAMA_PELANGGAN,
            NO_TELP_PELANGGAN,
            ALAMAT_PELANGGAN,
            PROFIL,
            JENIS_KELAMIN)
            VALUES 
            (:username,
            :password,
            :name,
            :nohp,
            :alamat,
            :profil,
            :jeniskelamin)");

        $statement->bindValue(':name', $name);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':nohp', $nohp);
        $statement->bindValue(':alamat', $alamat);
        $statement->bindValue(':profil', $profil);
        $statement->bindValue(':jeniskelamin', $jeniskelamin);
        $statement->execute();

        return true;
    } catch (PDOException $err) {
        echo $err->getMessage();
        return false;
    }
}

function editCustomer($data, $file) {
    $customer = getCustomerById();
    $name = htmlspecialchars($data['nama']);
    $password = !empty($data['password']) ? htmlspecialchars(hash('sha256', $data['password'])) : $customer['PASSWORD_PELANGGAN'];
    $nohp = htmlspecialchars($data['nohp']);
    $alamat = htmlspecialchars($data['alamat']);
    $profil = htmlspecialchars($file['gambar']['name']);
    $jeniskelamin = htmlspecialchars($data['jenis_kelamin']);

    try {
        $statement = DB->prepare("UPDATE pelanggan SET 
            PASSWORD_PELANGGAN = :password,
            NAMA_PELANGGAN = :name,
            NO_TELP_PELANGGAN = :nohp,
            ALAMAT_PELANGGAN = :alamat,
            PROFIL = :profil,
            JENIS_KELAMIN = :jeniskelamin WHERE ID_PELANGGAN = :id_pelanggan");

        $statement->bindValue(':name', $name);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':nohp', $nohp);
        $statement->bindValue(':alamat', $alamat);
        $statement->bindValue(':profil', $profil);
        $statement->bindValue(':jeniskelamin', $jeniskelamin);
        $statement->bindValue(':id_pelanggan', $_SESSION['id_pelanggan']);
        $statement->execute();

        return true;
    } catch (PDOException $err) {
        echo $err->getMessage();
        return false;
    }
}