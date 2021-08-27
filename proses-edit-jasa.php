<?php
include "include/koneksi.php";

$id = $_POST["id_jasa"];
$nama = $_POST["nama_jasa"];
$harga = $_POST["harga_jasa"];

if(empty($_POST["id_jasa"]) || empty($_POST["nama_jasa"]) || empty($_POST["harga_jasa"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatajasa.php">';
}else{
	$sql = "UPDATE jenis_jasa SET nama_jasa='$nama', harga_jasa='$harga' WHERE id_jasa='$id'";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di edit');</script>";
			echo '<meta http-equiv="refresh" content="0; url=jasa.php">';
}
?>
