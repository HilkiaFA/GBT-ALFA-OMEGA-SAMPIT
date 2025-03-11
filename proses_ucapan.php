<?php
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_ulangtahun = intval($_POST['id_ulangtahun']);
    $id = $_GET['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $ucapan = mysqli_real_escape_string($conn, $_POST['ucapan']);

    if (!empty($nama) && !empty($ucapan)) {
        $query = "INSERT INTO ucapan (idulangtahun, nama, deskripsi) VALUES ('$id_ulangtahun', '$nama', '$ucapan')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.href='halaman_ucapan.php?id=$id';</script>";
        } else {
            echo "<script>alert('Gagal mengirim ucapan.'); window.location.href='Tabernakelyouthfellowship-UlangTahun.php';</script>";
        }
    } else {
        echo "<script>alert('Nama dan ucapan tidak boleh kosong!'); window.location.href='Tabernakelyouthfellowship-UlangTahun.php';</script>";
    }
} else {
    echo "<script>alert('Akses ditolak!'); window.location.href='Tabernakelyouthfellowship-UlangTahun.php';</script>";
}

// Tutup koneksi
mysqli_close($conn);
?>
