<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            font-family: Arial;
        }
        nav{
            margin-bottom: 30px;
        }
    </style>    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-warning p-1 px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/book.png" alt="book" width="35" height="35">
            </a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item me-4">
                    <a class="nav-link fw-semibold active"aria-current="page"href="index.php">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link fw-semibold active"aria-current="page"href="pengarang.php">Pengarang</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link fw-semibold active"aria-current="page"href="penerbit.php">Penerbit</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link fw-semibold active"aria-current="page"href="buku.php">Buku</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php
        require "connection.php";
        $result = mysqli_query($connection, "SELECT * FROM penerbit");
    ?>
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <p class ="fw-semibold" style="font-size:18px;" >Data Penerbit
                            <a href="add_data/add_penerbit.php" class="btn btn-primary float-end">Add Penerbit</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Id Penerbit</th>
                                <th>Nama Penerbit</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                            <?php                          
                                while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_penerbit'] ?></td>
                                    <td><?php echo $data['nama_penerbit'];?></td>
                                    <td><?php echo $data['email'];?></td>
                                    <td><?php echo $data['telp'];?></td>
                                    <td><?php echo $data['alamat'];?></td>
                                     <td>
                                        <a class="btn btn-success btn-sm" href="edit_data/edit_penerbit.php?id=<?php echo $data['id_penerbit']?>">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="delete_data/delete_penerbit.php?id=<?php echo $data['id_penerbit']?>" role="button" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <footer>
        <div class="text-center text-dark p-1" style="background-color: orange;"><b>
            Copyright © 2023 Hafiz Raka Pradana<b>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>