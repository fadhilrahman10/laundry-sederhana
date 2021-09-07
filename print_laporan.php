<?php
include "./include/koneksi.php";

// if (isset($_GET['cetak'])) {
//   var_dump($_GET['cetak']);
//   die;
// }


$bulan_pilihan = '';
if (isset($_POST['submit'])) {
  $bulan = $_POST['bulan'];
  $bln = explode('-', $bulan);
  $bulan = $bln[1];
  $bulan_pilihan = 'Bulan ' . date('F', strtotime($_POST['bulan']));
  $sql = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan AND MONTH(transaksi_pembayaran.tgl)='$bulan'");
  $sql2 = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan AND MONTH(transaksi_pembayaran.tgl)='$bulan'");
}
if (isset($_GET['cetak'])) {
  $sql = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan");
  $sql2 = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan");
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>Print Laporan</title>

</head>

<body>

  <div class="container">
    <div class="row text-center my-4">
      <h1>Laporan Transaksi Laundry <?= $bulan_pilihan; ?></h1>
      <hr>
      <h3 class="mt-0">Maya Laundry</h3>

    </div>
    <div class="row my-4">
      <div class="col-md-6">
        Tanggal : <?= date('d F Y'); ?>
      </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th style="text-align: center;">No</th>
              <th>No Transaksi</th>
              <th>Nama Pelanggan</th>
              <th>Nama Jasa</th>
              <th>Tanggal</th>
              <th>Berat</th>
              <th>Harga</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0 + 1;
            while ($hasil = mysqli_fetch_array($sql)) {
            ?>
              <tr>
                <td style="text-align: center;"><?php echo $i; ?></td>
                <td><?php echo 'TR-0' . $hasil['no_transaksi']; ?></td>
                <td><?php echo $hasil['nama']; ?></td>
                <td><?php echo $hasil['nama_jasa']; ?></td>
                <td><?php echo date('d F Y', strtotime($hasil['tgl'])); ?></td>
                <td><?php echo $hasil['berat'] . ' Kg'; ?></td>
                <td><?php echo 'Rp ' . $hasil['harga_jasa']; ?></td>
                <td><?php echo 'Rp ' . $hasil['total_bayar']; ?></td>
              </tr>
            <?php
              $i++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row justify-content-around">
      <div class="col-3">
        <p>Dibuat Oleh,</p>
        <p style="margin-top: 120px;" class="text-center border-bottom border-3 border-dark">Ramadhani</p>
        <p style="margin-top: -1.3rem;" class="text-center">Admin</p>
      </div>
      <div class="col-3">
        <p>Diterima Oleh,</p>
        <p style="margin-top: 120px;" class="text-center border-bottom border-3 border-dark">Maya</p>
        <p style="margin-top: -1.3rem;" class="text-center">Pemilik</p>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


  <script>
    window.print();
  </script>
</body>

</html>