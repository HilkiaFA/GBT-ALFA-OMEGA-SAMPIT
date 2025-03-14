<!DOCTYPE html>
<html lang="id">

<head>
<link rel="icon" type="image/png" href="Image/logo.png">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tabernakel Youth Fellowship</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <style>
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

    $currentMonth = date('m');

    $query = "SELECT id, nama, date, imgpath FROM ulangtahun WHERE MONTH(date) = $currentMonth";
    $result = mysqli_query($conn, $query);
    ?>

<div class="row">
    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php
            $dob = new DateTime($row['date']);
            $today = new DateTime();
            $age = $today->diff($dob)->y;
            $encoded_id = $row['id'];
            ?>
            <div class="col-md-6">
                <div class="card d-flex flex-row align-items-center p-3">
                    <img src="Assets/Ulangtahun/<?php echo htmlspecialchars($row['imgpath']); ?>" 
                        alt="Profile" width="80" height="80" 
                        class="clickable-image" 
                        data-bs-toggle="modal" 
                        data-bs-target="#imageModal"
                        data-img="Assets/Ulangtahun/<?php echo htmlspecialchars($row['imgpath']); ?>" />
                    <div class="card-body">
                        <div class="card-text">
                            <strong><?php echo htmlspecialchars($row['nama']); ?></strong><br>
                            <a><?php echo $age; ?> Tahun</a> |
                            <a><?php echo strftime("%d %B %Y", strtotime($row['date'])); ?></a><br><br>
                            <a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#ucapanModal-<?php echo $row['id']; ?>">Berikan Ucapan</a>
                            |
                            <a href="halaman_ucapan.php?id=<?php echo encryptID($row['id']); ?>" class="btn-link">Lihat Ucapan</a>
                          </div>
                    </div>
                </div>
            </div>

            <!-- Modal Ucapan -->
            <div class="modal fade" id="ucapanModal-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ucapanModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ucapanModalLabel">Berikan Ucapan untuk <?php echo htmlspecialchars($row['nama']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses_ucapan.php?id=<?php echo encryptID($row['id']); ?>" method="POST">
                                <input type="hidden" name="id_ulangtahun" value="<?php echo $row['id']; ?>">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ucapan" class="form-label">Ucapan</label>
                                    <textarea class="form-control" id="ucapan" name="ucapan" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Ucapan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-center fw-bold">Tidak ada data ulang tahun bulan ini.</p>
    <?php endif; ?>
</div>

<!-- Modal untuk Perbesar Gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="modalImage" class="img-fluid" src="" alt="Gambar besar">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".clickable-image").forEach(img => {
            img.addEventListener("click", function () {
                document.getElementById("modalImage").src = this.getAttribute("data-img");
            });
        });
    });
</script>

    <?php mysqli_close($conn); ?>

  </div>

  <!-- Modal -->
  <div
    class="modal fade"
    id="ucapanModal"
    tabindex="-1"
    aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">
            Silahkan tuliskan ucapan selamat anda
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" />
            </div>
            <div class="mb-3">
              <label for="ucapan" class="form-label">Ucapan</label>
              <textarea class="form-control" id="ucapan" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">
              Kirim Ucapan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

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