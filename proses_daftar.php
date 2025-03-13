<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$pelayanan = $_POST['pelayanan'];
$keterangan = $_POST['keterangan'];

$sql = "INSERT INTO pelayan (Nama, No_Handphone, Alamat, Pelayanan, Keterangan) 
        VALUES ('$nama', '$nohp', '$alamat', '$pelayanan', '$keterangan')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Data berasil terkirim');
        window.location.href = 'Tabernakelyouthfellowship-Pelayan.html';
    </script>";
} else {
    echo "<script>
        alert('Gagal mengirim data, coba lagi!');
        window.history.back();
    </script>";
}
mysqli_close($conn);
?>
