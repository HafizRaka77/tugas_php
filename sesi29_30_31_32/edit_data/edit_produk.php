<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            font-family: Arial;
        }
    </style>
    <?php
    // Display selected user data based on id
    // Getting id from url
    $id_produk = $_GET['id_produk'];
 
    // Fetech user data based on id
    require "../connection.php";
    $result = mysqli_query($connection, "SELECT * FROM produk WHERE id_produk= $id_produk LIMIT 1");
 
    while($data = mysqli_fetch_array($result))
    {
	    $kode_produk = $data['kode_produk'];
        $nama_produk = $data['nama_produk'];
        $harga       = $data['harga'];
        $stok        = $data['stok'];
        $satuan      = $data['satuan'];
        $supplier_id = $data['supplier_id'];
    }
        $supplier = mysqli_query($connection,"SELECT * FROM supplier");
    ?>    
</head>
<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <p class ="fw-semibold" style="font-size:18px;">Edit Produk
                            <a href="../produk.php" class="btn btn-danger float-end">Back</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="../backend/proses_edit_produk.php?id=<?php echo $id_produk; ?>" method="POST">
                            <div class="mb-3">
                                <label>Kode Produk</label>
                                <input type="number" name="kode_produk" class="form-control" required="" value="<?php echo $kode_produk;?>">
                            </div>
                            <div class="mb-3">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" required="" value="<?php echo $nama_produk;?>">
                            </div>
                            <div class="mb-3">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" required="" value="<?php echo $harga; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stok" required="" value="<?php echo $stok; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Satuan</label>
                                <input type="text" name="satuan" class="form-control" required="" value="<?php echo $satuan;?>">
                            </div>
                            <div class="mb-3">
                                <label>Id Supplier</label>
                                <select class="form-select" name="supplier_id">
                                <?php
                                    foreach ($supplier as $data) {
                                ?>
                                    <option value="<?php if ($data['id']  .' - '. $data['nama'] == $supplier_id) { 
                                    echo $supplier_id;
                                } else {
                                    echo $data['id'] .' - '. $data['nama'];
                                } ?>"<?php if ($data['id'] .' - '. $data['nama'] == $supplier_id) { 
                                    echo "selected";
                                } ?>
                                ><?php if ($data['id'] .' - '. $data['nama'] == $supplier_id) { 
                                    echo $supplier_id;
                                } else {
                                echo $data['id'] .' - '. $data['nama'];
                                } ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update"class="btn btn-primary">Update</button>
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
