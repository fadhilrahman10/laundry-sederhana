<?php
include "include/koneksi.php";

$No_Identitas = $_POST["No_Identitas"];
$Nama = $_POST["Nama"];
$status = $_POST["status"];

// var_dump($status);die;

if(empty($_POST["No_Identitas"]) || empty($_POST["Nama"]) || empty($_POST["status"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatapelanggan.php">';
}else{
	$sql = "INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `status`)
			VALUES ('$No_Identitas', '$Nama', '$status')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=pelanggan.php">';
}
?>
