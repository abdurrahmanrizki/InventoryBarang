<?php require __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventory Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Inventory Barang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah_barang.php">Tambah Barang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Barang</h5>
                <a href="tambah_barang.php" class="btn btn-primary">Tambah Barang</a>
            </div>
            <div class="card-body">
                <table id="inventoryTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_inventory";
                        $result = $conn->query($sql);
                        $no = 1;
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>".$no++."</td>
                                    <td>".$row['kode_barang']."</td>
                                    <td>".$row['nama_barang']."</td>
                                    <td>".$row['jumlah_barang']."</td>
                                    <td>".$row['satuan_barang']."</td>
                                    <td>Rp ".number_format($row['harga_beli'], 2, ',', '.')."</td>
                                    <td>".($row['status_barang'] ? '<span class="badge bg-success">Available</span>' : '<span class="badge bg-danger">Not Available</span>')."</td>
                                    <td>
                                        <a href='edit_barang.php?id=".$row['id_barang']."' class='btn btn-sm btn-warning btn-action'>Edit</a>
                                        <a href='pakai_barang.php?id=".$row['id_barang']."' class='btn btn-sm btn-info btn-action'>Pakai</a>
                                        <a href='tambah_stok.php?id=".$row['id_barang']."' class='btn btn-sm btn-primary btn-action'>Tambah Stok</a>
                                        <a href='hapus_barang.php?id=".$row['id_barang']."' class='btn btn-sm btn-danger btn-action' onclick='return confirmDelete()'>Hapus</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Tidak ada data barang</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inventoryTable').DataTable();
        });
        
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus barang ini?');
        }
    </script>
</body>
</html>
<?php $conn->close(); ?>