<?php
require_once 'koneksi.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_GET['id'])) {
        $iducapan = decryptID($_GET['id']);
        if (!$iducapan) {
            die("ID tidak valid!");
        }
    } else {
        die("ID tidak ditemukan!");
    }

    if (!isset($_POST['id_ulangtahun'], $_POST['nama'], $_POST['ucapan'])) {
        echo "<script>alert('Data tidak lengkap!'); window.location.href='Tabernakelyouthfellowship-UlangTahun.php';</script>";
        exit;
    }

    $id_ulangtahun = intval($_POST['id_ulangtahun']);
    $nama = mysqli_real_escape_string($conn, trim($_POST['nama']));
    $ucapan = mysqli_real_escape_string($conn, trim($_POST['ucapan']));

    if (empty($nama) || empty($ucapan)) {
        echo "<script>alert('Nama dan ucapan tidak boleh kosong!'); window.location.href='Tabernakelyouthfellowship-UlangTahun.php';</script>";
        exit;
    }

    $query = "INSERT INTO ucapan (idulangtahun, nama, deskripsi) VALUES ('$id_ulangtahun', '$nama', '$ucapan')";

    if (mysqli_query($conn, $query)) {
        echo "<script>window.location.href='halaman_ucapan.php?id=" . urlencode($_GET['id']) . "';</script>";
    } else {
        echo "<script>alert('Gagal mengirim ucapan.'); window.location.href='Tabernakelyouthfellowship-UlangTahun.php';</script>";
    }
} else {
    echo "<script>alert('Akses ditolak!'); window.location.href='Tabernakelyouthfellowship-UlangTahun.php';</script>";
}

// Tutup koneksi
mysqli_close($conn);
?>
