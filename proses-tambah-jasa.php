<?php
include "include/koneksi.php";

$id = $_POST["id_jasa"];
$nama = $_POST["nama_jasa"];
$harga = $_POST["harga_jasa"];

if(empty($_POST["id_jasa"]) || empty($_POST["nama_jasa"]) || empty($_POST["harga_jasa"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatajasa.php">';
}else{
	$sql = "INSERT INTO `jenis_jasa` (`id_jasa`, `nama_jasa`, `harga_jasa`)
			VALUES ('$id', '$nama', '$harga')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=jasa.php">';
}
?>
