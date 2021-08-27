<?php
include "include/koneksi.php";

$no_order = $_POST["no_order"];
$tgl_terima = $_POST["tanggal"];

// if(empty($_POST["No_Order"]) || empty($_POST["No_Identitas"]) || empty($_POST["total_berat"]) || empty($_POST["diskon"]) || empty($_POST["total_bayar"]) || empty($_POST["tanggal"])){
// 	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
// 	// echo '<meta http-equiv="refresh" content="0; url=tambahdatatransaksi.php">';
// }else{
if(empty($_POST["no_order"]) || empty($_POST["tanggal"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=editdatatransaksi.php?edit=<?php echo $no_order ?>">';
}else{
	$sql = "UPDATE `transaksi` SET tgl_ambil='$tgl_terima', status='sudah' WHERE `no_order`='$no_order'";
				$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di Edit');</script>";
			echo '<meta http-equiv="refresh" content="0; url=transaksi.php">';
}

?>
