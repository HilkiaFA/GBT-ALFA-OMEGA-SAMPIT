<?php
include '../../koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $link = $_POST['link'];

    $target_dir = "../../Assets/Sorotan/";
    $image = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File bukan gambar!'); window.location.href='FormSorotan.php';</script>";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan!'); window.location.href='FormSorotan.php';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Gagal mengupload file.'); window.location.href='FormSorotan.php';</script>";    
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO sorotan (Nama, imgpath, link) VALUES ('$nama', '$image', '$link')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='FormSorotan.php';</script>";    
                exit();
            } else {
                echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "'); window.location.href='FormSorotan.php';</script>";
            }
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengupload file!'); window.location.href='FormSorotan.php';</script>";
        }
    }
}

mysqli_close($conn);
?>