<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi 29</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            font-family: ;
        }
        nav{
            margin-bottom: 30px;
        }
    </style>    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" 
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item me-4">
                    <a class="nav-link fw-semibold active"aria-current="page"href="index.php">Pelanggan</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link fw-semibold active"aria-current="page"href="supplier.php">Supplier</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link fw-semibold active"aria-current="page"href="produk.php">Produk</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <p class="fw-semibold" align ="center">Data Produk</p>
    <?php
        include "connection.php";
        $query = mysqli_query($connection, "SELECT kode_produk, nama_produk, harga, stok, satuan, nama FROM produk JOIN supplier ON produk.supplier_id = supplier.id;");
    ?>
        <table class ="table table-bordered table-striped" style="width:600px" align ="center">
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Nama Supplier</th>>
            </tr>
        <?php
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo number_format($data["kode_produk"]);?></td>
                <td><?php echo $data["nama_produk"];?></td>
                <td><?php echo " Rp ".number_format($data["harga"]);?></td>
                <td><?php echo $data["stok"];?></td>
                <td><?php echo $data["satuan"];?></td>
                <td><?php echo $data["nama"];?></td>
            </tr>
            <?php $no++; } ?>
        </table>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>