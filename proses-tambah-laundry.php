<?php
include "include/koneksi.php";

$no_order = $_POST["no_order"];
$id_pelanggan = $_POST["id_pelanggan"];
$nama_jasa = $_POST["nama_jasa"];
$harga_jasa = $_POST["harga_jasa"];
$berat = $_POST["berat"];
$total_bayar = $_POST["total_bayar"];
$tgl = $_POST["tanggal"];
$id_admin = $_POST['id_admin'];
// if(empty($_POST["No_Order"]) || empty($_POST["No_Identitas"]) || empty($_POST["total_berat"]) || empty($_POST["diskon"]) || empty($_POST["total_bayar"]) || empty($_POST["tanggal"])){
// 	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
// 	// echo '<meta http-equiv="refresh" content="0; url=tambahdatatransaksi.php">';
// }else{
if(empty($_POST["no_order"]) || empty($_POST["id_pelanggan"]) || empty($_POST["berat"]) || empty($_POST["total_bayar"]) || empty($_POST["tanggal"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatatransaksi.php">';
}else{
	$sql = "INSERT INTO `laundry` (`no_order`, `id_pelanggan`, `tgl`, `berat`, `total_bayar`, `id_admin`, `status`, `nama_jasa`, `harga_jasa`)
			VALUES ('$no_order', '$id_pelanggan', '$tgl', '$berat', '$total_bayar', '$id_admin', 'belum', '$nama_jasa', '$harga_jasa')";
			// var_dump($sql);die;
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=laundry.php">';
}

?>
