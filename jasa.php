<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maya Prasista Laundry - Jasa</title>
    <?php
      include "include/header.php";
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
  <h3>Data Pelanggan</h3>
  <hr>
  <div class="tombol" >
    <a href="tambahdatajasa.php"><button type="button" class="btn btn-success btn-md " >Tambah Data </button></a>
  </div>
  <br>
  <table id="table" class="table table-striped table-bordered table-responsive" >
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th>ID Jasa</th>
        <th>Nama</th>
        <th>Harga</th>
        <th style="text-align: center;" >Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php
        include "./include/koneksi.php";
        $i = 0 + 1;
        $sql = mysqli_query($conn, "SELECT * FROM jenis_jasa ORDER BY `id_jasa`");
        while ($hasil = mysqli_fetch_array($sql)) {
     ?>
  <tr>
      <td style="text-align: center;"><?php echo $i; ?></td>
      <td><?php echo $hasil['id_jasa']; ?></td>
      <td><?php echo $hasil['nama_jasa']; ?></td>
      <td><?php echo $hasil['harga_jasa']; ?></td>
      <td style="text-align: center;"><a href="editdatajasa.php?edit=<?php echo $hasil['id_jasa']; ?>" class="btn btn-warning">Edit</a>
      <a href="proses-hapus-jasa.php?hapus=<?php echo $hasil['id_jasa']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a></td>
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
