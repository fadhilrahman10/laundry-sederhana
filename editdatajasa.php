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
      include "fungsi/fungsi.php";
      include 'include/koneksi.php';

      if(isset($_GET['edit'])){
          $id_jasa = $_GET['edit'];
          $sql = $conn->query("SELECT *FROM jenis_jasa WHERE id_jasa='$id_jasa'");
          $data = $sql->fetch_assoc();
      }
    ?>


  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
      <a class="navbar-brand" href="#">Laundry</a>
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
  <h3>Form Tambah Admin</h3>
  <hr>
  <br>
        <form action="proses-edit-jasa.php" method="POST" >
                <div class="form-group">
                  <label>ID Jasa</label>
                  <input type="text" class="form-control" name="id_jasa" placeholder="id" style="width: 250px" value="<?= $data['id_jasa']; ?>" readonly >
                </div>
                <div class="form-group">
                  <label>Nama Jasa</label>
                  <input type="text" class="form-control" name="nama_jasa" placeholder="Nama" style="width: 250px" value="<?= $data['nama_jasa']; ?>">
                </div>
                <div class="form-group">
                  <label>Haraga Jasa</label>
                  <input type="number" class="form-control" name="harga_jasa" placeholder="Harga" style="width: 250px" value="<?= $data['harga_jasa']; ?>">
                </div>
              <input type="submit" name="submit" value="Simpan" class="btn btn-success">
              <a href="jasa.php"><input type="button" class="btn btn-default" value="Batal" ></a>
              </form>
</div>
    <?php include "include/footer.php"; ?>
</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
