<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktik_individu 2.2</title>
    <style>
        td {
            padding: 5px;

        }

        table,
        td {
            border: 2px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td style="background-color: DodgerBlue;">No</td>
            <td style="background-color: DodgerBlue;">Nama</td>
            <td style="background-color: DodgerBlue;">Kelas</td>
        </tr>
        <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";
                    if ($i % 2 == 0) {
                        for ($j= 0; $j < 3; $j++) {
                        echo "<td>";
                        if ($j == 0) {
                            echo $i;
                        } elseif ($j == 1) {
                            echo "Nama ke-$i";
                        } else {
                            $a = 11;
                            echo "Kelas ", $a - $i;
                        }
                        echo "</td>";
                        }
                    } 
                    else {
                        for ($j= 0; $j < 3; $j++) {
                        echo "<td style='background-color: lightgray'>";
                        if ($j == 0) {
                            echo $i;
                        } elseif ($j == 1) {
                            echo "Nama ke-$i";
                        } else {
                            $a = 11;
                            echo "Kelas ", $a - $i;
                        }
                        echo "</td>";
                    }
                }
            }
            echo "</tr>";
        ?>
    </table>
</body>

</html>