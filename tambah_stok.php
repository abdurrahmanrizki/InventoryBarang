<?php
include 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID barang tidak valid");
}

$id = (int)$_GET['id'];

$id = $_GET['id'];
$sql = "SELECT * FROM tb_inventory WHERE id_barang = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Barang - Sistem Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Inventory Barang</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Stok Barang</h5>
            </div>
            <div class="card-body">
                <form action="proses_tambah_stok.php" method="POST">
                    <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
                    <input type="hidden" name="current_status" value="<?php echo $row['status_barang']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" value="<?php echo $row['kode_barang']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" value="<?php echo $row['nama_barang']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok Saat Ini</label>
                        <input type="text" class="form-control" value="<?php echo $row['jumlah_barang'] . ' ' . $row['satuan_barang']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_tambah" class="form-label">Jumlah Tambah</label>
                        <input type="number" class="form-control" id="jumlah_tambah" name="jumlah_tambah" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli (per satuan)</label>
                        <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" min="0" value="<?php echo $row['harga_beli']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Stok</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>