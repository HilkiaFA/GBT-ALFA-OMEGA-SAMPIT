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
  <link rel="stylesheet" href="./Css/style.css" />
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
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="ringkasankhotbah.php">Ringkasan Khotbah</a></li>
          <li class="nav-item"><a class="nav-link" href="galerigbt.php">Galeri</a></li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang Kami</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  include 'koneksi.php';
  $sql = "SELECT imgpath FROM carousel";
  $result = $conn->query($sql);
  ?>

  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      $active = "active";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="carousel-item ' . $active . '">
                            <img src="Assets/carousel/' . $row["imgpath"] . '" class="d-block w-100" alt="Slide">
                          </div>';
          $active = ""; // Hanya item pertama yang aktif
        }
      } else {
        echo "<div class='carousel-item active'><p>No images found</p></div>";
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <?php
  ?>


  <!-- Section Visi & Misi -->
  <section class="visi-misi mt-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-center text-lg-start">
          <h2 class="montserrat-regular">VISI</h2>
          <a class="montserrat-Bold text-decoration-none">Menjadi Gereja cemerlang yang siap menjadi mempelai Kristus</a>
          <h3 class="mt-4 montserrat-regular">MISI</h3>
          <a class="montserrat-Bold text-decoration-none">
            Penginjilan, Pujian, Penyembahan, Persekutuan, Pemuridan,
            Pelayanan
          </a>
        </div>
        <div class="col-lg-6 text-center mt-4"> 
            <img
              src=" ./Image/GBT ALFAOMEGA PNG.png"
          alt="Ibadah"
          class="img-fluid rounded" />
      </div>
    </div>
    </div>
  </section>

  <div class="section-2">
    <div class="container py-5">
      <div class="row align-items-center p-4 rounded">
        <div class="col-lg-8">
          <h2 class="fw-bold text-light text-name-pastor">
            Ps. Onisimus Purnama, S.H., M.Th.
          </h2>
          <h4 class="text-muted mb-3">Pastor of GBT ALFA OMEGA SAMPIT</h4>
          <a class="description-pastor text-decoration-none">
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry’s standard dummy text
            ever since the 1500s, when an unknown printer took a galley of
            type and scrambled it to make a type specimen book. It has
            survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged.
          </a>
        </div>
        <div class="col-lg-4 text-center">
          <img
            src="./Image/pastor.png"
            alt="Pastor Onisimus Purnama"
            class="img-fluid rounded img-pastor" />
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center py-5">
    <h2 class="fw-bold montserrat-Bold-sorotan">Komunitas</h2>
    <div class="row justify-content-center mt-5">
      <div class="col-md-4 col-sm-6 d-flex justify-content-center mb-4">
        <a href="PersedoPage.html" class="custom-card text-decoration-none">
          <img src="./Image/logo.png" alt="Persekutuan Doa" />
          <h5 class="fw-bold text-black">Persekutuan Doa</h5>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 d-flex justify-content-center mb-4">
        <a class="custom-card text-decoration-none" href="KomselPage.html">
          <img src="./Image/logo.png" alt="Komsel" />
          <h5 class="fw-bold text-black">Komsel</h5>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 d-flex justify-content-center mb-4">
        <a class="custom-card text-decoration-none">
          <img src="./Image/logo.png" alt="TMC Tabernakel Men Club" />
          <h5 class="fw-bold text-black">TMC</h5>
          <p class="small text-muted">Tabernakel Men Club</p>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 d-flex justify-content-center mb-4">
        <a class="custom-card text-decoration-none">
          <img src="./Image/logo.png" alt="WBT Wanita Bethel Tabernakel" />
          <h5 class="fw-bold text-black">WBT</h5>
          <p class="small text-muted">Wanita Bethel Tabernakel</p>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 d-flex justify-content-center mb-4">
        <a class="custom-card text-decoration-none">
          <img src="./Image/logo.png" alt="TYF Tabernakel Youth Fellowship" />
          <h5 class="fw-bold text-black">TYF</h5>
          <p class="small text-muted">Tabernakel Youth Fellowship</p>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 d-flex justify-content-center mb-4">
        <a class="custom-card text-decoration-none">
          <img src="./Image/logo.png" alt="Sekolah Minggu Hossana" />
          <h5 class="fw-bold text-black">Sekolah Minggu</h5>
          <p class="small text-muted">Hossana</p>
        </a>
      </div>
    </div>
  </div>

  <div class="parallax">
    <h1>GBT</h1>
    <p>Getting Better Together</p>
  </div>

  <div class="container mt-5">
    <h3 class="fw-bold montserrat-Bold-sorotan">Sorotan</h3>
    <div class="highlight-container mt-5">
        <div class="highlight">
            <?php
            $sql = "SELECT imgpath, link FROM sorotan";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="' . htmlspecialchars($row["link"]) . '" target="_blank">
                            <img src="Assets/Sorotan/' . htmlspecialchars($row["imgpath"]) . '" alt="Sorotan" class="img-fluid" />
                          </a>';
                }
            } else {
                echo "<p>No highlights found</p>";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

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
  <script>
    if (!window.location.pathname.endsWith("/index.php")) {
      window.location.href = window.location.pathname + "index.php";
    }
  </script>
</body>

</html>