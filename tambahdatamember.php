<?php 
session_start();
if(isset($_SESSION['id'])){
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Member</title>

    <?php
      include "include/header.php";
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
  <h3>Form Tambah Data Member</h3>
  <hr>
  <br>
        <form action="proses-tambah-member.php" method="POST" >
                <div class="form-group">
                  <label>No Member</label>
                   <input type="text" class="form-control" name="No_member" placeholder="No. Member" style="width: 250px" >
                </div>
                 <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="Nama" placeholder="Nama" style="width: 250px" >
                </div>
                <div class="form-group">
                  <label>No_hp</label>
                  <input type="text" class="form-control" name="No_hp" placeholder="No_hp" style="width: 250px" >
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="Alamat" placeholder="Alamat" style="width: 250px" >
                </div>
                <input type="submit" name="submit" value="Simpan" class="btn btn-success">
            </div>
             <a href="member.php"><input type="button" class="btn btn-default" value="Batal" ></a>
              </form>

</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
