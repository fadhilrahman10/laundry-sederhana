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
  <h3>Form Edit Transaksi Laundry</h3>
  <hr>
        <div class="row">
          <div class="col-md-4">
            <form name="form" action="proses-edit-transaksi.php" method="POST" >
            <?php
            include "./include/koneksi.php";

            $No_Order = $_GET['edit'];
            $sql = mysqli_query($conn, "SELECT transaksi.diskon, transaksi.no_order, pelanggan.nama, transaksi.total_berat, jenis_jasa.nama_jasa, transaksi.total_bayar from transaksi, pelanggan, jenis_jasa where pelanggan.id_pelanggan=transaksi.id_pelanggan AND jenis_jasa.id_jasa=transaksi.id_jasa AND no_order='$No_Order'");
            $hasil = mysqli_fetch_assoc($sql);
              ?>
                <div class="form-group">
                  <label>No. Order</label>
                  <input type="text" class="form-control" name="no_order" value="<?php echo $hasil['no_order']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <input type="text" name="nama_pelanggan" class="form-control" value="<?= $hasil['nama']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Jenis Jasa</label>
                  <input type="text" id="jenis_jasa" class="form-control" name="jenis_jasa" placeholder="kategori" readonly value="<?php echo $hasil['nama_jasa']; ?>" >
                </div>
                <div class="form-group">
                  <label>Total Berat</label>
                  <input type="text" id="total_berat" readonly class="form-control" name="total_berat" placeholder="Total Berat" value="<?php echo $hasil['total_berat']; ?>">
                </div>
                <div class="form-group">
                  <label>Diskon</label>
                  <input type="text" id="diskon" class="form-control" name="diskon" placeholder="Diskon" readonly value="<?php echo $hasil['diskon']; ?>" >
                </div>
                <div class="form-group">
                  <label>Total Bayar</label>
                  <input type="text" readonly id="total"  class="form-control" name="total_bayar" value="<?php echo $hasil['total_bayar']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Pembayaran</label>
                  <input type="number" id="bayar" class="form-control" name="total_berat" placeholder="Bayar">
                </div>
                <div class="form-group">
                  <label>Kembalian</label>
                  <input type="number" id="kembalian" readonly class="form-control" name="total_berat" placeholder="Kembalian">
                </div>
                <input type="hidden" class="form-control" name="tanggal" value="<?php $tgl=date('Y-m-d'); echo $tgl; ?>">
                
                <input type="submit" name="submit" value="Bayar" class="btn btn-success">
                <a href="transaksi.php"><input type="button" class="btn btn-default" value="Batal" ></a>

              </form>
          </div>

              </tbody>
              </table>
              </div>
          </div>
        </div>
</div>


<!-- Modal Tambah Data -->
		<!-- <div class="modal fade" id="ModalTambah" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Transaksi Pakaian</h4>
					</div>

					<div class="modal-body">
						<form id="tambah" method="POST" >
              <?php
                $sql = mysqli_query($conn, "SELECT No_Order FROM transaksi WHERE No_Order = $No_Order");
                while ($hasil = mysqli_fetch_array($sql)){
                  $na = $hasil['No_Order'];
              }
              ?>
              <input type="text" class="form-control" name="No_Order" value="<?php echo $na;  ?>" >
              <div class="form-group">
                <label>Jenis Pakaian</label>
                <select class="form-control" name="Id_Pakaian">
                  <?php
                    $sql = mysqli_query($conn, "SELECT * FROM pakaian ORDER BY Jenis_Pakaian");
                    while ($hasil = mysqli_fetch_array($sql)){

                  ?>
                  <option value="<?=$hasil['Id_Pakaian'];?>"><?=$hasil['Jenis_Pakaian'];?></option>
                  <?php
                  }
                   ?>
                </select>
              </div>
							<div class="form-group">
								<label>Jumlah Pakaian</label>
								<input type="text" class="form-control" name="Jumlah_Pakaian" placeholder="Jumlah pakaian" >
							</div>
							<div class="modal-footer">
								<button class="btn btn-success" type="submit" >Simpan</button>
								<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> -->

<?php include "include/footer.php"; ?>

<script type="text/javascript">

  $('#bayar').keyup(function(){
    var total = $('#total').val();
    var bayar = $('#bayar').val();

    var kembalian = parseInt(bayar) - parseInt(total);
    $('#kembalian').val(kembalian);

  })

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
    url: 'proses-tambah-detail-transaksi-edit.php',
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
</script>
</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
