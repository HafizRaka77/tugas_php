<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            font-family: Arial;
        }
    </style>
    <?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['id'];
 
    // Fetech user data based on id
    require "../connection.php";
    $result = mysqli_query($connection, "SELECT * FROM supplier WHERE id= $id LIMIT 1");
 
    while($data = mysqli_fetch_array($result))
    {
	    $nama = $data['nama'];
	    $telpon = $data['telpon'];
        $alamat = $data['alamat'];
    }
    ?>    
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <p class ="fw-semibold" style="font-size:18px;">Edit Supplier
                            <a href="../supplier.php" class="btn btn-danger float-end">Back</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="../backend/proses_edit_supplier.php?id=<?php echo $id; ?>" method="POST">
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>">
                            </div>
                            <div class="mb-3">
                                <label>Telpon</label>
                                <input type="number" name="telpon" class="form-control" value="<?php echo $telpon; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea class="form-control "name="alamat" rows="3"><?php echo $alamat; ?></textarea>
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
