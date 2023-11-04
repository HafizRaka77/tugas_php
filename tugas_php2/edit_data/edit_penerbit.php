<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            font-family: Arial;
        }
    </style>
    <?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET["id"];

    // Fetech user data based on id
    require "../connection.php";
    $result = mysqli_query($connection,"SELECT * FROM penerbit WHERE id_penerbit = '$id'");

    while($data = mysqli_fetch_array($result)){    
        $id = $data['id_penerbit'];
        $nama = $data['nama_penerbit'];
        $email = $data['email'];
        $telp = $data['telp'];
        $alamat = $data['alamat'];
    }
    ?>    
</head>
<body>
    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <p class ="fw-semibold" style="font-size:18px;">Edit Penerbit
                            <a href="../penerbit.php" class="btn btn-danger float-end">Back</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="../backend/proses_edit_penerbit.php?id=<?php echo $id; ?>" method="post">
                            <div class="mb-3">
                                <label>Id Penerbit</label>
                                <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Nama Penerbit</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Telp</label>
                                <input type="number" class="form-control" name="telp" value="<?php echo $telp; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
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