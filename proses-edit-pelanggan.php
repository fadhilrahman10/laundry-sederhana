<?php
include "include/koneksi.php";

$No_Identitas = $_POST["No_Identitas"];
$Nama = $_POST["Nama"];
$status = $_POST["status"];
// $Alamat = $_POST["Alamat"];
// $No_Hp = $_POST["No_Hp"];

if(empty($_POST["No_Identitas"]) || empty($_POST["Nama"]) || empty($_POST["status"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatapelanggan.php">';
}else{
	$sql = "UPDATE `pelanggan` SET `nama`='$Nama', `status`='$status' WHERE `id_pelanggan` = '$No_Identitas'";
				$kueri = mysqli_query($conn, $sql);
				echo "<script language='javascript'>alert('Berhasil di Edit');</script>";
				echo '<meta http-equiv="refresh" content="0; url=pelanggan.php">';
	}
?>
