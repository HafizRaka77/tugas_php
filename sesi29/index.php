<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi 29</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        nav{
            margin-bottom: 50px;
        }
        tr:nth-child(even) {
            background-color: #CCCCCC;
        }

        tr:nth-child(odd) {
          background-color: #FFFFFF;
        }
        tr:nth-child(1){
            background-color: #00BFFF ;
        }
        td {
            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>    
</head>
<body>
    <nav class="navbar bg-warning ">
        <div class="container-fluid">
            <span class="navbar-brand mb-2 px-5 mt-2 h3">Table Pelanggan</span>
        </div>
    </nav>
    <?php
        include "connection.php";
        $query = mysqli_query($connection, "SELECT * FROM pelanggan");
    ?>
        <form action="" method="post">
            <table align = "center">
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Jenis Kelamin</td>
                    <td>Telpon</td>
                    <td>Alamat</td>
                </tr>
                <?php if (mysqli_num_rows($query)>0) { ?>
                <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data["nama"];?></td>
                    <td><?php echo $data["jenis_kelamin"];?></td>
                    <td><?php echo $data["telpon"];?></td>
                    <td><?php echo $data["alamat"];?></td>
                </tr>
                <?php $no++; } ?>
                <?php } ?>
        </table>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>