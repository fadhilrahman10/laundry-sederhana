<?php 

    $conn = mysqli_connect('localhost', 'root', '', 'maya-laundry');
    // global $conn;

    function id_pelanggan()
    {
        global $conn;
        $sql = $conn->query("SELECT MAX(id_pelanggan) AS id FROM pelanggan");
        $data = $sql->fetch_array();
        $id_barang = $data['id'];
        $urutan = (int)substr($id_barang, 3,3);
        $urutan++;
        $huruf = "P";
        $kode = $huruf.sprintf("%03s", $urutan);
        return $kode; 
    }

    function no_order()
    {
        global $conn;
        $sql = $conn->query("SELECT MAX(no_order) AS id FROM laundry");
        $data = $sql->fetch_array();
        $id_barang = $data['id'];
        $urutan = (int)substr($id_barang, 3,3);
        $urutan++;
        $huruf = "OR";
        $kode = $huruf.sprintf("%03s", $urutan);
        return $kode; 
    }
    function id_jasa()
    {
        global $conn;
        $sql = $conn->query("SELECT MAX(id_jasa) AS id FROM jenis_jasa");
        $data = $sql->fetch_array();
        $id_barang = $data['id'];
        $urutan = (int)substr($id_barang, 3,3);
        $urutan++;
        $huruf = "JS";
        $kode = $huruf.sprintf("%03s", $urutan);
        return $kode; 
    }
    
    function id_admin()
    {
        global $conn;
        $sql = $conn->query("SELECT MAX(id) AS id FROM admin");
        $data = $sql->fetch_array();
        $id_barang = $data['id'];
        $urutan = (int)substr($id_barang, 3,3);
        $urutan++;
        $huruf = "ADM";
        $kode = $huruf.sprintf("%03s", $urutan);
        return $kode; 
    }

?>