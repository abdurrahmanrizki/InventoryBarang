<?php include 'config.php'; 

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Sistem Inventory</title>
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
                <h5>Tambah Barang Baru</h5>
            </div>
            <div class="card-body">
                <form action="proses_tambah_barang.php" method="POST">
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Barang/Barcode</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="satuan_barang" class="form-label">Satuan Barang</label>
                        <select class="form-select" id="satuan_barang" name="satuan_barang" required>
                            <option value="">Pilih Satuan</option>
                            <option value="pcs">pcs</option>
                            <option value="kg">kg</option>
                            <option value="liter">liter</option>
                            <option value="meter">meter</option>
                            <option value="box">box</option>
                            <option value="pack">pack</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Barang</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_barang" id="status_available" value="1" checked>
                            <label class="form-check-label" for="status_available">Available</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_barang" id="status_not_available" value="0">
                            <label class="form-check-label" for="status_not_available">Not Available</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>