<?php
    include_once("../connection.php");
    // menyimpan data kedalam variabel
    if (isset($_POST["submit"])) {
        $kode_produk    = $_POST['kode_produk'];
        $nama_produk    = $_POST['nama_produk'];
        $harga          = $_POST['harga'];
        $stok           = $_POST['stok'];
        $satuan         = $_POST['satuan'];
        $id             = $_POST['id'];
        // query SQL untuk insert data
        $result = mysqli_query($connection, "INSERT INTO produk SET kode_produk='$kode_produk',nama_produk='$nama_produk',harga='$harga',stok= '$stok',satuan='$satuan', supplier_id='$id'");
        
        // mengalihkan ke halaman index.php
        if ($result) {
            header("Location: ../produk.php?msg=Data Added Successfully");
        } else {
            echo "Failed: " . mysqli_error($connection);
        }
    }
?>
