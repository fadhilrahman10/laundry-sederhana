<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maya Prasista Laundry - Pengambilan Laundry</title>
    <?php
      include "include/header.php";
    ?>
  </head>
  <body>
    <nav class="navbar navbar-default" >
      <div class="container-fluid">
        <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:black;">Maya Prasista Laundry</a>
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
  <h3>Data Laundry</h3>
  <hr>
  <br>
  <div class="table-responsive">
  <table id="table" class="table table-striped table-hover table-bordered" >
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th>No. Order</th>
        <th>Nama</th>
        <!-- <th>Tanggal Terima</th>
        <th>Tanggal Ambil</th> -->
        <th>Jasa</th>
        <!-- <th>Berat</th>
        <th>Diskon</th> -->
        <th>Total Bayar</th>
        <th style="text-align: center;" >Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php
        include "./include/koneksi.php";
        $i = 1;
        $sql = mysqli_query($conn, "SELECT laundry.no_order, pelanggan.nama, laundry.total_bayar, laundry.nama_jasa FROM laundry, pelanggan WHERE pelanggan.id_pelanggan=laundry.id_pelanggan AND laundry.status='belum'");
        while ($hasil = mysqli_fetch_array($sql)) {
          $no_order = $hasil['no_order'];
     ?>
  <tr>
      <td onclick="location.href='editdatalaundry.php?edit=<?php echo $no_order; ?>'" style="text-align: center;"><?php echo $i; ?></td>
      <td onclick="location.href='editdatalaundry.php?edit=<?php echo $no_order; ?>'"><?php echo $hasil['no_order']; ?></td>
      <td onclick="location.href='editdatalaundry.php?edit=<?php echo $no_order; ?>'"><?php echo $hasil['nama']; ?></td>
      <td onclick="location.href='editdatalaundry.php?edit=<?php echo $no_order; ?>'"><?php echo $hasil['nama_jasa']; ?></td>
      <td onclick="location.href='editdatalaundry.php?edit=<?php echo $no_order; ?>'"><?php echo $hasil['total_bayar']; ?></td>
      <td style="text-align: center;">
        <a href="proses-hapus-laundry.php?hapus=<?php echo $hasil['no_order']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?');">Hapus</a>
        <a href="print_struk.php?no_order=<?= $hasil['no_order']; ?>" class="btn btn-info">Cetak</a>
        <a href="editdatalaundry.php?no_order=<?= $hasil['no_order']; ?>" class="btn btn-success">Bayar</a>
      </td>
  </tr>
  <?php
      $i++;
      }
    ?>

  </tbody>
  </table>
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

</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
