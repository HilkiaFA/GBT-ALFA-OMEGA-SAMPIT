<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT imgpath FROM sorotan WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['imgpath'] && file_exists("../../Assets/Sorotan/" . $row['imgpath'])) {
        unlink("../../Assets/Sorotan/" . $row['imgpath']);
    }

    $sql = "DELETE FROM sorotan WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='Sorotan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "'); window.location.href='Sorotan.php';</script>";
    }

    mysqli_close($conn);
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='Sorotan.php';</script>";
}
?>