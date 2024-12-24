<?php 
require_once BASEPATH . "/data/connection.php";

function getAllPromo() {
    try {
		$statement = DB->query("SELECT * FROM promo");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
    catch(PDOException $err){
        echo $err->getMessage();
    }
}

function getAllPromoNotExpired(){
    try {
		$statement = DB->query("SELECT * FROM promo where TANGGAL_SELESAI > NOW()");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
    catch(PDOException $err){
        echo $err->getMessage();
    }
}


function getPromoByKode($kode_promo) {
    try {
		$statement = DB->prepare("SELECT p.KODE_PROMO, NAMA_PROMO, POTONGAN, KETERANGAN, TANGGAL_MULAI, TANGGAL_SELESAI, FOTO_PROMO FROM promo p
		WHERE p.KODE_PROMO = :kode_promo ");
        $statement->bindValue(':kode_promo', $kode_promo);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}
    catch(PDOException $err){
        echo $err->getMessage();
    }
}

function insertPromo($data, $file) {
	$nama = htmlspecialchars($data['nama']);
	$potongan = htmlspecialchars($data['diskon']);
	$keterangan = htmlspecialchars($data['ket']);
	$mulai = htmlspecialchars($data['tanggal_mulai']);
	$selesai = htmlspecialchars($data['tanggal_selesai']);
	$foto = htmlspecialchars($file['gambar']['name']);
	try{
		$statement = DB->prepare("INSERT INTO promo 
		(NAMA_PROMO, POTONGAN, KETERANGAN, TANGGAL_MULAI, TANGGAL_SELESAI, FOTO_PROMO)
		VALUES 
		(:nama, :potongan, :keterangan, :mulai, :selesai, :foto)");
		$statement->bindValue(":nama", $nama);
		$statement->bindValue(":potongan", $potongan);
		$statement->bindValue(":keterangan", $keterangan);
		$statement->bindValue(":mulai", $mulai);
		$statement->bindValue(":selesai", $selesai);
		$statement->bindValue(":foto", $foto);
		$statement->execute();

		return "Ditambah";
	}
	catch(PDOException $err){
		echo $err->getMessage();
		return false;
	}
}

function editPromo($data, $file) {
	// var_dump($data);
	// die;
	$kode = htmlspecialchars($data['kodepromo']);
	$nama = htmlspecialchars($data['nama']);
	$potongan = htmlspecialchars($data['diskon']);
	$keterangan = htmlspecialchars($data['ket']);
	$mulai = htmlspecialchars($data['tanggal_mulai']);
	$selesai = htmlspecialchars($data['tanggal_selesai']);
	$foto = htmlspecialchars($file['gambar']['name']);
	$fotoLama = htmlspecialchars($data['fotoLama']);
	try{
		$statement = DB->prepare("UPDATE promo SET
		NAMA_PROMO = :nama, 
		POTONGAN = :potongan, 
		KETERANGAN = :keterangan, 
		TANGGAL_MULAI = :mulai, 
		TANGGAL_SELESAI = :selesai, 
		FOTO_PROMO = :foto WHERE KODE_PROMO = :kode");
		
		$statement->bindValue(":kode", $kode);
		$statement->bindValue(":nama", $nama);
		$statement->bindValue(":potongan", $potongan);
		$statement->bindValue(":keterangan", $keterangan);
		$statement->bindValue(":foto", $foto);
		$statement->bindValue(":mulai", $mulai);
		$statement->bindValue(":selesai", $selesai);
		$statement->execute();
		
		if($fotoLama != $foto) {
			$result = getAllPromo($kode);
			unlink(BASEPATH . '/assets/img/promo/' . $fotoLama);
		} 
		return "Diubah";
	}
	catch(PDOException $err){
		echo $err->getMessage();
		return false;
	}
}

function deletePromo($kode_promo) {
	$result = getPromoByKode($kode_promo);

	try{
		$statement = DB->prepare("DELETE FROM promo WHERE KODE_promo = :kode_promo");
		$statement->bindValue(':kode_promo',$kode_promo);
		$statement->execute();
		unlink(BASEPATH . '/assets/img/promo/' . $result['FOTO_PROMO']);
		return true;
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}