<?php
session_start();
if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maya Prasista Laundry - Laporan</title>
    <?php
    include "include/header.php";
    include "./include/koneksi.php";
    $bulan_pilihan = '';
    if (isset($_POST['submit'])) {
      $bulan = $_POST['bulan'];
      $bln = explode('-', $bulan);
      $bulan = $bln[1];
      $bulan_pilihan = 'Bulan ' . date('F', strtotime($_POST['bulan']));
      // var_dump($bulan);die;
      $sql = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan AND MONTH(transaksi_pembayaran.tgl)='$bulan'");
      $sql2 = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan AND MONTH(transaksi_pembayaran.tgl)='$bulan'");
    } else {
      $sql = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan");
      $sql2 = $conn->query("SELECT transaksi_pembayaran.*, pelanggan.nama FROM transaksi_pembayaran, pelanggan WHERE pelanggan.id_pelanggan=transaksi_pembayaran.id_pelanggan");
    }
    ?>
  </head>

  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Maya Prasista Laundry</a>
        </div>
        <ul class="nav navbar-nav">
          <?php
          include "include/list.php"
          ?>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <h3>Laporan Transaksi Laundry</h3>
      <hr>
      <div class="tombol">
        <form action="print_laporan.php" method="POST" target="_blank" class="form-inline">
          <input type="month" name="bulan" value="<?= date('Y-m'); ?>" id="bulan" class="form-control" style="width: 250px;">
          <button type="submit" name="submit" class="btn btn-info">Sort</button>
        </form>
      </div>
      <br>
      <a href="print_laporan.php?cetak=laporan" target="_blank" class="btn btn-default">Print</a>
      <br>
      <br>
      <table id="table" class="table table-striped table-bordered table-responsive">
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
      <br>
      <br>
    </div>

    <div class="container" id="laporan" style="display: none;">
      <div class="row">
        <div class="col-md-6 text-center">
          <h2>Laporan Transaksi Laundry <?= $bulan_pilihan; ?></h2>
          <h5>Maya Laundry</h5>
          <hr>
        </div>
        <div class="col-md-12">
          <table class="table table-striped table-bordered table-responsive">
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
              while ($hasil = mysqli_fetch_array($sql2)) {
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
      <div class="row" style="margin-bottom: 10rem;">
        <div class="col-md-6">
          <p>Dibuat oleh : <?= $_SESSION['email']; ?></p>
          Pekanbaru, <?= date('d F Y'); ?>
        </div>
      </div>
      <div class="row" style="margin-left: 5rem;">
        <div class="col-md-6">
          <p><strong>MAYA</strong></p>
        </div>
      </div>
    </div>

    <?php include "include/footer.php"; ?>

    <script>
      $(document).ready(function() {
        $('#table').DataTable({});
      });
    </script>

    <script>
      function printContent(el) {
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
} else {
  header("location:login/index.php");
}
