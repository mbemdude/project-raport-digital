<?php 
$tahun = $_POST['tahun'];

if (($tahun % 100 > 0) && ($tahun % 400 > 1) && ($tahun % 4 == 0)) {
    echo "Tahun Kabisat";
} elseif ($tahun % 400 == 0) {
    echo "Tahun Kabisat";
} else {
    echo "Bukan Tahun Kabisat";
}

?>