<?php 
include "include/koneksi.php";

$No_member = $_POST["No_member"];
$Nama = $_POST["Nama"];
$No_hp = $_POST["No_hp"];
$Alamat = $_POST["Alamat"];

if(empty($_POST["No_member"]) || empty($_POST["Nama"]) || empty($_POST["No_hp"]) || empty($_POST["Alamat"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatamember.php">';
}else{

	$sql = "UPDATE `member` SET `No_member`='$No_member', `Nama`='$Nama', `No_hp`='$No_hp' , `Alamat`='$Alamat' WHERE `No_member` = '$No_member'";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=member.php">';
}
 ?>