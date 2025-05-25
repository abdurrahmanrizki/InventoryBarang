<?php
include 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST['id_barang'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = $_POST['status_barang'];

    $sql = "UPDATE tb_inventory SET 
            kode_barang = '$kode_barang', 
            nama_barang = '$nama_barang', 
            jumlah_barang = $jumlah_barang, 
            satuan_barang = '$satuan_barang', 
            harga_beli = $harga_beli, 
            status_barang = $status_barang 
            WHERE id_barang = $id_barang";

    if ($conn->query($sql)) {
        header("Location: index.php?success=2");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>