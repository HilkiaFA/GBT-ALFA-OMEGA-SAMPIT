<?php
include '../../koneksi.php'; // Sesuaikan dengan lokasi file koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $date = $_POST['date'];

    $targetDir = "../../Assets/Ulangtahun/"; 
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO ulangtahun (nama, alamat, date, imgpath) VALUES ('$nama', '$alamat', '$date', '$fileName')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='ulangtahun.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan data.'); window.location.href='ulangtahun.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar.'); window.location.href='ulangtahun.php';</script>";
        }
    } else {
        echo "<script>alert('Format gambar tidak valid. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.location.href='ulangtahun.php';</script>";
    }
} else {
    echo "<script>alert('Akses ditolak!'); window.location.href='ulangtahun.php';</script>";
}

// Tutup koneksi
mysqli_close($conn);
?>
