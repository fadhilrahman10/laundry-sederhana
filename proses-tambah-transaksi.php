<?php
include "include/koneksi.php";

if(isset($_GET['no_order'])){
	$no_order = $_GET['no_order'];
	
	$sql = $conn->query("SELECT *FROM laundry WHERE no_order='$no_order'");
	$data = $sql->fetch_assoc();

	
	$nama_jasa = $data['nama_jasa'];
	$harga_jasa = $data['harga_jasa'];
	$berat = $data['berat'];
	$tgl = $data['tgl'];
	$total_bayar = $data['total_bayar'];
	$id_admin = $data['id_admin'];
	$id_pelanggan = $data['id_pelanggan'];
	
	$add = "INSERT INTO transaksi_pembayaran (no_transaksi, nama_jasa, harga_jasa, berat, tgl, total_bayar, id_admin, id_pelanggan) VALUES ('', '$nama_jasa', '$harga_jasa', '$berat', '$tgl', '$total_bayar', '$id_admin', '$id_pelanggan')";
	$insert = $conn->query($add);
	
	$status = "UPDATE laundry SET status='sudah' WHERE no_order='$no_order'";
	$ubah = $conn->query($status);

	echo "<script language='javascript'>alert('Pembayaran Berhasil');</script>";
	echo '<meta http-equiv="refresh" content="0; url=laundry.php">';

}


// $no_order = $_POST["no_order"];
// $id_pelanggan = $_POST["id_pelanggan"];
// $id_jasa = $_POST["jenis_jasa"];
// $total_berat = $_POST["total_berat"];
// $diskon = $_POST["diskon"];
// $total_bayar = $_POST["total_bayar"];
// $tgl_terima = $_POST["tanggal"];
// $id_admin = $_POST['id_admin'];
// if(empty($_POST["No_Order"]) || empty($_POST["No_Identitas"]) || empty($_POST["total_berat"]) || empty($_POST["diskon"]) || empty($_POST["total_bayar"]) || empty($_POST["tanggal"])){
// 	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
// 	// echo '<meta http-equiv="refresh" content="0; url=tambahdatatransaksi.php">';
// }else{
// if(empty($_POST["no_order"]) || empty($_POST["id_pelanggan"]) || empty($_POST["total_berat"]) || empty($_POST["total_bayar"]) || empty($_POST["tanggal"])){
// 	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
// 	echo '<meta http-equiv="refresh" content="0; url=tambahdatatransaksi.php">';
// }else{
// 	$sql = "INSERT INTO `transaksi` (`no_order`, `id_pelanggan`, `tgl_terima`, `total_berat`, `diskon`, `total_bayar`, `admin_id`, `status`, `id_jasa`)
// 			VALUES ('$no_order', '$id_pelanggan', '$tgl_terima', '$total_berat', '$diskon', '$total_bayar', '$id_admin', 'belum', '$id_jasa')";
// 			// var_dump($sql);die;
// 			$kueri = mysqli_query($conn, $sql);
// 			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
// 			echo '<meta http-equiv="refresh" content="0; url=transaksi.php">';
// }

?>
