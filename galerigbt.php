<?php
include 'koneksi.php'; // Pastikan file koneksi.php sudah benar

// Ambil data gambar dari database
$query = "SELECT * FROM galerigbt";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="Image/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GBT ALFA OMEGA SAMPIT</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="./Css/stylegalerigbt.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./Image/logo.png" alt="Logo" height="50" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="ringkasankhotbah.php">Ringkasan Khotbah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Galeri</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-content mt-5">
    <div class="gallery">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <img src="Assets/Galeri GBT/<?php echo htmlspecialchars($row['imgpath']); ?>" alt="Gambar" onclick="openModal(this)">
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center fw-bold">Gambar tidak tersedia</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Preview Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" alt="Preview">
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(imgElement) {
        document.getElementById('modalImage').src = imgElement.src;
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();
    }
</script>

    <!-- Footer -->
    <footer class="footer text-light py-5 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
                    <img
                        src="./Image/logo.png"
                        alt="GBT ALFA OMEGA"
                        class="logo-footer" />
                </div>

                <!-- Hubungi Kami & Media -->
                <div class="col-md-5 text-center text-md-start">
                    <h5 class="fw-bold">HUBUNGI KAMI</h5>
                    <p class="m-0">Telephone</p>
                    <p class="m-0">Email</p>
                    <h5 class="fw-bold mt-3">MEDIA</h5>
                    <p class="m-0">Instagram</p>
                    <p class="m-0">Youtube</p>
                    <p class="m-0">Facebook</p>
                </div>

                <div class="maps col-md-4 text-center text-md-end">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8329.119336741998!2d112.93991378853949!3d-2.5390042007364726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de2be4ab832aca7%3A0x8170a2f6bc43f20b!2sGereja%20Beth-el%20Tabernakel%20Alfa%20Omega!5e1!3m2!1sid!2sid!4v1738916036611!5m2!1sid!2sid"
                        width="100%"
                        height="150"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="text-center mt-3">
                <p class="mt-0">
                    Copyright © 2025. Gereja GBT ALFA OMEGA SAMPIT. Developed by Jerry
                    Grou
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>