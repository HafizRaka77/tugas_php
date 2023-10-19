<?php
    echo " Nomor 1 : <br>";

    for($no=1;$no<=10;$no++){
        if($no % 2 == 1 ){
            echo "$no " ;echo "adalah bilangan ganjil <br>";
        }
        else{
            echo "$no " ;echo "adalah bilangan genap <br>";
        }
    }
    echo"<br>";

    echo " Nomor 2 : <br>";

    for($tahun=2000; $tahun<=2023; $tahun++){
        if ($tahun % 4 == 0){ 
            echo "$tahun Merupakan tahun kabisat <br>"; 
        }
        else {
            echo "$tahun Bukan merupakan tahun kabisat <br>"; 
        }
    }
    echo"<br>";

    echo " Nomor 3 : <br>";

    for($i = 0; $i < 9; $i++) {
        for($j = 1; $j <= 9 - $i; $j++) {
            echo "$j";
        }
        echo "<br>";
    }
?>