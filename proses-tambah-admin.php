<?php
include "include/koneksi.php";

$id = $_POST["id"];
$email = $_POST["email"];
$pass = $_POST["pass"];

if(empty($_POST["id"]) || empty($_POST["email"]) || empty($_POST["pass"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdataadmin.php">';
}else{
	$sql = "INSERT INTO `admin` (`id`, `email`, `pass`)
			VALUES ('$id', '$email', '$pass')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=admin.php">';
}
?>
