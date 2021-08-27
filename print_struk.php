
<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry</title>
    <?php
      include "include/header.php";
    ?>
  </head>
  <body>
    
<?php
    include "./include/koneksi.php";
    if(isset($_GET['no_order'])){
        $no_order = $_GET['no_order'];
        $sql = $conn->query("SELECT laundry.*, pelanggan.nama FROM laundry, pelanggan WHERE pelanggan.id_pelanggan=laundry.id_pelanggan AND laundry.no_order='$no_order'");
        $data = $sql->fetch_assoc();
    }
?>
<div class="container" id="el">
  <h3>Struk Transaksi</h3>
  <hr>
  <div class="row">
    <div class="col-md-6">
    <?php 
        $tgl = date('d F Y', strtotime($data['tgl']));
    ?>
        <h4>No Order    : <?= $data['no_order']; ?></h4>
        <p>Tanggal : <?= $tgl; ?></p>
        <br>
        <div class="table-responsive">
            <table class="table" >
                <tbody>
                <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <th style="text-align: center;" ><?= $data['nama']; ?></th>
                </tr>
                <tr>
                    <th>Jenis Jasa</th>
                    <th>:</th>
                    <th style="text-align: center;" ><?= $data['nama_jasa']; ?></th>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <th style="text-align: center;" >Rp <?= $data['harga_jasa']; ?> /Kg</th>
                </tr>
                <tr>
                    <th>Total Berat</th>
                    <th>:</th>
                    <th style="text-align: center;" ><?= $data['berat']; ?> Kg</th>
                </tr>
                <tr>
                    <th>Total Bayar</th>
                    <th>:</th>
                    <th style="text-align: center;" >Rp <?= $data['total_bayar']; ?></th>
                </tr>
                </tbody>
            </table>
            <a href="laundry.php" class="btn btn-default hidden-print">Kembali</a>
            <button type="button" class="btn btn-info hidden-print" onclick="printContent('el')">Cetak</button>
        </div>
    </div>
  </div>
  
  <br>
  <br>
</div>
<?php include "include/footer.php"; ?>
<script>
    $(document).ready(function() {
	   $('#table').DataTable();
	} );
</script>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
