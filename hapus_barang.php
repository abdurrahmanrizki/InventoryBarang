<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM tb_inventory WHERE id_barang = $id";
    
    if ($conn->query($sql)) {
        header("Location: index.php?success=5");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>