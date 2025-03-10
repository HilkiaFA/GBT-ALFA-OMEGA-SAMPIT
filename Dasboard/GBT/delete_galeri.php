<?php
include '../../koneksi.php'; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT imgpath FROM galerigbt WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imgPath = $row['imgpath'];
        $filePath = "../../Assets/Galeri GBT/" . $imgPath; 

        if (!empty($imgPath) && file_exists($filePath)) {
            unlink($filePath);
        }

        $deleteQuery = "DELETE FROM galerigbt WHERE id = $id";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "<script>alert('Gambar berhasil dihapus!'); window.location.href='galeri.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus gambar.'); window.location.href='galeri.php';</script>";
        }
    } else {
        echo "<script>alert('Gambar tidak ditemukan.'); window.location.href='galeri.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid.'); window.location.href='galeri.php';</script>";
}

mysqli_close($conn);
?>
