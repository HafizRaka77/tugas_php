<?php

include("../connection.php");

$supplier = mysqli_query($connection,"SELECT * FROM supplier");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            font-family: Arial;
        }
    </style>    
</head>
<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <p class ="fw-semibold" style="font-size:18px;">Add Produk
                            <a href="../produk.php" class="btn btn-danger float-end">Back</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="../backend/proses_add_produk.php" method="POST">
                            <div class="mb-3">
                                <label>Kode Produk</label>
                                <input type="number" name="kode_produk" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Satuan</label>
                                <input type="text" name="satuan" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="id" class="form-label">Id Supplier</label>
                                <select class="form-select" name="id">
                                    <?php
                                        foreach ($supplier as $data) {
                                    ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['id']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>