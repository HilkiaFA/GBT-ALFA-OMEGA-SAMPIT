<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $upload_dir = "../../Assets/carousel/"; 
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array(strtolower($image_ext), $allowed_ext)) {
            echo "<script>alert('Format gambar tidak valid! Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.history.back();</script>";
            exit();
        }

        $new_image_name = time() . '_' . uniqid() . '.' . $image_ext;
        $image_path = $upload_dir . $new_image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {
            $sql = "INSERT INTO carousel (nama, imgpath) VALUES ('$nama', '$new_image_name')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='carousel.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan data ke database: " . mysqli_error($conn) . "'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah gambar!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Silakan pilih gambar untuk diunggah!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid!'); window.history.back();</script>";
}

mysqli_close($conn);
?>
