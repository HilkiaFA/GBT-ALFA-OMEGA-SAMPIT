<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']); 
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $ringkasan = mysqli_real_escape_string($conn, $_POST['ringkasan']);

    $sql = "UPDATE ringkasankhotbah SET 
                Judul = '$judul', 
                Nama = '$nama', 
                Ringkasan = '$ringkasan' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location='ringkasankhotbah.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui data: " . mysqli_error($conn) . "'); window.history.back();
              </script>";
    }

    mysqli_close($conn); 
} else {
    echo "<script>
            alert('Akses tidak diizinkan!');
            window.location='ringkasankhotbah.php';
          </script>";
}
?>
