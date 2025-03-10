<?php
include '../../koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $uploadDir = "../../Assets/Galeri GBT/"; 
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $query = "INSERT INTO galerigbt (imgpath) VALUES ('$fileName')";
                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('Gambar berhasil diunggah!'); window.location='galeri.php';</script>";
                } else {
                    echo "<script>alert('Gagal menyimpan data ke database!'); window.location='galeri.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah file!'); window.location='galeri.php';</script>";
            }
        } else {
            echo "<script>alert('Format file tidak valid! Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.location='galeri.php';</script>";
        }
    } else {
        echo "<script>alert('Harap pilih file untuk diunggah!'); window.location='galeri.php';</script>";
    }
} else {
    echo "<script>alert('Akses ditolak!'); window.location='galeri.php';</script>";
}
?>
