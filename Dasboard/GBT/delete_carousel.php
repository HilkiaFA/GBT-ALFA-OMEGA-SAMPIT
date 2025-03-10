<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $queryGetImage = "SELECT imgpath FROM carousel WHERE id = $id";
    $result = mysqli_query($conn, $queryGetImage);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $filePath = "../../Assets/carousel/" . $row['imgpath'];
        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file gambar
        }
    }

    $queryDelete = "DELETE FROM carousel WHERE id = $id";
    if (mysqli_query($conn, $queryDelete)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='carousel.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.history.back();</script>";
}

mysqli_close($conn);
?>
