<?php
$No_Identitas		=  $_GET['cetak'];
include "include/koneksi.php";
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
// ob_start(); 
$dompdf = new Dompdf();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kartu Member</title>
  <link rel="stylesheet" type="text/css" href="./asset/css/bootstrap.min.css">
  <style media="screen">
  /* table, th, td, tr {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 5px;
    text-align: left;
    */
    hr{
      border: 1px solid black;
    } 
    </style>
</head>
<body>
<?= $html ='<center><h1>Maya Parista Laundry</h1>
<h3>Kartu Member</h3></center>
<hr>'; ?>

<?php
$sql = mysqli_query($conn, "SELECT nama, id_pelanggan from pelanggan WHERE id_pelanggan = '$No_Identitas'");
$hasil = mysqli_fetch_array($sql);
?>
<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <?php $html.='<table class="table"> 
        <thead>
          <tr>
            <th width="50">ID Pelanggan</th>
            <th width="50" class="text-center">=</th>
            <th>'.$hasil['id_pelanggan'].'</th>
          </tr>
          <tr>
            <th width="50">Nama Pelanggan</th>
            <th width="50" class="text-center">=</th>
            <th>'.$hasil['nama'].'</th>
          </tr>
        </thead>
      </table>'; ?>
    </div>
  </div>
</div>

</body>
<?php $html.='</html>'; ?>

  <?php
  include "include/footer.php";

// $html = ob_get_clean();
// require_once 'dompdf/autoload.inc.php';
// use Dompdf\Dompdf;
// $dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper("A4");
$dompdf->render();
$dompdf->stream('kartu Member.pdf');

?>