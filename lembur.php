<?php 
$jk = $_POST['jk'];

if ($jk <= 40) {
    $hasil = $jk * 2000;
} elseif ($jk > 40) {
    $hasil = (($jk-40)*3000) + (40 * 2000);
}
    echo "Gaji karyawan : ". $hasil;
?>