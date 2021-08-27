<?php
// include 'include/koneksi.php';
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maya Prasista Laundry - Pelanggan</title>
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
    <a href="tambahdatapelanggan.php"><button type="button" class="btn btn-success btn-md " >Tambah Data </button></a>
  </div>
  <br>
  <table id="table" class="table table-striped table-bordered table-responsive" >
    <thead>
      <tr>
        <th style="text-align: center;">No</th>
        <th>No. Identitas</th>
        <th>Nama</th>
        <th>Status</th>
        <th style="text-align: center;" >Aksi</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php
        include "./include/koneksi.php";
        $i = 0 + 1;
        $sql = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY `id_pelanggan`");
        while ($hasil = mysqli_fetch_array($sql)) {
     ?>
  <tr>
      <td style="text-align: center;"><?php echo $i; ?></td>
      <td><?php echo $hasil['id_pelanggan']; ?></td>
      <td><?php echo $hasil['nama']; ?></td>
      <td><?php echo $hasil['status']; ?></td>
      <td style="text-align: center;">
        <a href="editdatapelanggan.php?edit=<?php echo $hasil['id_pelanggan']; ?>" class="btn btn-warning">Edit</a>
        <a href="proses-hapus-pelanggan.php?hapus=<?php echo $hasil['id_pelanggan']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a>
      </td>
      <td class="text-center">
        <?php if($hasil['status'] == 'member') :?>
        <a href="?cetak=<?php echo $hasil['id_pelanggan']; ?>" onclick="printContent('dataPelanggan')" class="btn btn-info">Cetak</a>
        <?php endif ?>
      </td>
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

<?php 
  if(isset($_GET['cetak'])) : ?>
  <?php 
    $id_pelanggan = $_GET['cetak'];
    $query = $conn->query("select *from pelanggan where id_pelanggan = '$id_pelanggan'");
    $data = $query->fetch_assoc();
  ?>
<div id='dataPelanggan' class="visible-print-block">
  <div class="row ">
    <div class="col-md-6">
      <center>
        <h1>Maya Parista Laundry</h1>
        <h3>Kartu Member</h3>
      </center>
      <br><br>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <center>
        <table class="table">
          <tr>
              <td width="50">ID Pelanggan</td>
              <td width="50" class="text-center">:</td>
              <td><?= $data['id_pelanggan']; ?></td>
          </tr>
          <tr>
              <td>Nama</td>
              <td width="50" class="text-center">:</td>
              <td><?= $data['nama']; ?></td>
          </tr>
        </table>
      </center>
    </div>
  </div>
</div>
<?php endif ?>

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
