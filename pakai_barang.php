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
    <title>Pakai Barang - Sistem Inventory</title>
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
                <h5>Pakai Barang</h5>
            </div>
            <div class="card-body">
                <form action="proses_pakai_barang.php" method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
                    <input type="hidden" id="current_stock" value="<?php echo $row['jumlah_barang']; ?>">
                    
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
                        <label for="jumlah_pakai" class="form-label">Jumlah Pakai</label>
                        <input type="number" class="form-control" id="jumlah_pakai" name="jumlah_pakai" min="1" max="<?php echo $row['jumlah_barang']; ?>" required>
                        <div id="errorMessage" class="text-danger mt-2" style="display: none;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Proses Pemakaian</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            const jumlahPakai = parseInt(document.getElementById('jumlah_pakai').value);
            const currentStock = parseInt(document.getElementById('current_stock').value);
            const errorMessage = document.getElementById('errorMessage');
            
            if (jumlahPakai > currentStock) {
                errorMessage.textContent = "Jumlah pemakaian tidak boleh melebihi stok yang tersedia!";
                errorMessage.style.display = "block";
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>
<?php $conn->close(); ?>