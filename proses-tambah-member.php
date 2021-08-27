<?php 
include "include/koneksi.php";

$No_member = $_POST["No_member"];
$Nama = $_POST["Nama"];
$No_hp = $_POST["No_hp"];
$Alamat = $_POST["Alamat"];

if(empty($_POST["No_member"]) || empty($_POST["Nama"]) || empty($_POST["Alamat"]) || empty($_POST["No_hp"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatamember.php">';
}else{

	$sql = "INSERT INTO `member` (`No_member`, `Nama`, `No_hp`, `Alamat`)
			VALUES ('$No_member', '$Nama', '$No_hp' , '$Alamat')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=member.php">';
}
 ?>