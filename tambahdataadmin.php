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
        <form action="proses-tambah-admin.php" method="POST" >
                <div class="form-group">
                  <label>id</label>
                  <input type="text" class="form-control" name="id" placeholder="id" style="width: 250px" value="<?= id_admin(); ?>" readonly>
                </div>
                <div class="form-group">
                  <label>email</label>
                  <input type="text" class="form-control" name="email" placeholder="email" style="width: 250px" >
                </div>
                <div class="form-group">
                  <label>password</label>
                  <input type="text" class="form-control" name="pass" placeholder="password" style="width: 250px" >
                </div>
              <input type="submit" name="submit" value="Simpan" class="btn btn-success">
              <a href="proses-tambah-admin.php"><input type="button" class="btn btn-default" value="Batal" ></a>
              </form>
</div>

</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
