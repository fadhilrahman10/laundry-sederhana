<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maya Prasista Laundry - Tambah laundry</title>

    <?php
      include "include/header.php";
      // var_dump($_SESSION['id']);
    ?>

    <style type="text/css">
    		.css_pesan { background-color: #F0FFED; border: 1px solid #215800; padding: 10px; width: 180px; margin-bottom: 20px; }
    	</style>
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
  <h3>Form Tambah Laundry</h3>
        <a href="tambahdatapelanggan.php" class="btn btn-success">Tambah Pelanggan</a>
  <hr>
        <div class="row" style="margin-bottom: 10rem;">
          <div class="col-md-4">
            <form name="form" action="proses-tambah-laundry.php" method="POST" >
            <?php
            include "fungsi/fungsi.php";
              
              ?>
              <input type="hidden" name="id_admin" value="<?= $_SESSION['id']; ?>">
                <div class="form-group">
                  <label>No. Order</label>
                  <input type="text" class="form-control" id="no_order" name="no_order" value="<?php echo no_order(); ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <select name="id_pelanggan" class="form-control">
                    <option value="" selected>Pilih Pelanggan</option>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM pelanggan");
                        while ($hasil = mysqli_fetch_array($sql)) {
                    ?>
                    <option value="<?= $hasil['id_pelanggan']; ?>"><?= $hasil['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Jasa</label>
                  <select name="nama_jasa" id="jasa" class="form-control">
                    <option value="" selected>Pilig Jasa</option>
                    <option value="cuci-gosok" data-price="5000">Cuci Gosok</option>
                    <option value="cuci" data-price="3000">Cuci</option>
                    <option value="gosok" data-price="2000">Gosok</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" id="harga" class="form-control" name="harga_jasa" placeholder="Harga" readonly value="0">
                </div>
                <div class="form-group">
                  <label>Total Berat</label>
                  <input type="number" id="total_berat" class="form-control" name="berat" placeholder="Total Berat" value="0" required>
                </div>
                <div class="form-group">
                  <label>Total Bayar</label>
                  <input type="text"  class="form-control" id="total_bayar" name="total_bayar" readonly>
                </div>
                <input type="hidden" class="form-control" name="tanggal" value="<?php $tgl=date('Y-m-d'); echo $tgl; ?>">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="" class="btn btn-default">Batal</a>
                </form>
          </div>
        </div>

</div>

<?php include 'include/footer.php'; ?>

<script>

  $('#jasa').change(function(){
    const price = $('#jasa option:selected').data('price');
    $('#harga').val(price);
  })

  $('#total_berat').keyup(function(){
    var harga = $('#harga').val();
    var berat = $('#total_berat').val();
    var total = $('#total_bayar').val();

    var result = parseInt(harga) * parseInt(berat);
    $('#total_bayar').val(result);

  })

</script>


<!-- <script type="text/javascript">
d=eval(form.No_Order.value)
e = d+1
form.No_Order.value=e
function tambah()
    {
    a=eval(form.total_berat.value)
    b=eval(form.diskon.value)
    c=(a*7000)-b
    // b=eval(form.b.value)
    // c=a+b
    form.total_bayar.value=c
    }


$('#tambah').submit(function() {
  $.ajax({
    type: 'POST',
    url: 'proses-tambah-detail-transaksi.php',
    data: $(this).serialize(),
    success: function(data) {
      $("#pesan").addClass("css_pesan");
      $("#ModalTambah").modal('hide');
      $('#pesan').html(data);
    }
  })
  return false;
});

function hapus(order,id){
			swal({
				title: "Apa anda yakin?",
				text: "Anda tidak akan bisa mengembalikan data yang sudah terhapus!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Ya, hapus!",
				closeOnConfirm: false
			},

			function(){
				var no_id = id;
        var no_order = order;
				$.ajax({
					url: "crud/hapus.php",
					type: "GET",
					data : {Id_Pakaian: no_id, No_Order : no_order},
					success: function (data) {
                    swal("Terhapus!", "Data berhasil dihapus.", "success");

                }
				});
				//document.location = url;
				setTimeout("location.href='tambahdatatransaksi.php';",1000);
			}

			);
		};
</script> -->
</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
