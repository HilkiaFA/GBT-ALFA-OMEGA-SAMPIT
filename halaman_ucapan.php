<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Youth Fellowship</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <style>
        html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
}
        .card {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 15px;
        }

        .card img {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            align-items: center;
        }

        .card-text {
            margin-left: 15px;
        }

        .btn-link {
            text-decoration: none;
        }

        .logo-footer {
            width: 100px;
            height: auto;
        }

        footer {
            height: 300px;
            font-size: 14px;
            background-color: #1a1a1a;
        }

        .container {
    flex: 1;
}
        .footer-copyright {
            display: flex;
            margin-top: 60px;
            justify-content: center;
            height: 50px;
            background-color: #313131;
        }

        @media (max-width: 992px) {
            .maps {
                margin-top: 70px;
            }

            .footer-copyright {
                display: flex;
                margin-top: 0px;
                justify-content: center;
                height: 70px;
                background-color: #313131;
            }
        }

        @media (max-width: 768px) {
            footer {
                height: 700px;
                font-size: 14px;
                background-color: #1a1a1a;
            }

            .footer-copyright {
                display: flex;
                margin-top: 100px;
                justify-content: center;
                height: 70px;
                background-color: #313131;
            }
        }
    </style>
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
                        <a class="nav-link me-md-3" href="tyfalfaomega.html">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-md-3" href="#">Jadwal</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Pelayan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php
        include 'koneksi.php';

        $id = $_GET['id'];
        $query = "SELECT id, nama, deskripsi FROM ucapan WHERE idulangtahun=$id";
        $result = mysqli_query($conn, $query);
        ?>

        <div class="row">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-6">
                        <div class="card d-flex flex-row align-items-center p-3">
                            <div class="card-body">
                                <div class="card-text">
                                    <strong><?php echo htmlspecialchars($row['nama']); ?></strong>
                                    <br>
                                    <br>
                                    <a><?php echo $row['deskripsi']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center fw-bold">Tidak ada Ucapan.</p>
            <?php endif; ?>
        </div>

        <?php mysqli_close($conn); ?>
    </div>

    <!-- Modal -->
   

    <footer class="footer text-light py-5">
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