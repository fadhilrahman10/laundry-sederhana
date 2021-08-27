<?php 
    include 'include/koneksi.php';
    $id_jasa = $_POST['id_jasa'];

    $sql = $conn->query("SELECT harga_jasa FROM jenis_jasa WHERE id_jasa='$id_jasa'");
    $data = $sql->fetch_assoc();
    print json_encode($data['harga_jasa']);


?>