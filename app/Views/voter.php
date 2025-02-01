<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Employee Selection Tool</title>

    <!-- Poppin Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;800&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icon  -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="asset/style.css" />
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">BPS Kabupaten Tulang Bawang</a>

      <div class="navbar-menu" id="navbar-menu">
        <a href="#home">Home</a>
        <a href="#rekap">Rekap Hasil</a>
        <a href="#vote">Vote</a>
      </div>

      <div class="navbar-logout">
        <a href="#" id="user"><i data-feather="user"></i></a>
        <a href="#" id="logout"><i data-feather="log-out"></i></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Home Section Start -->
    <section class="home" id="home">
      <div class="content">
        <h1>Best Employee Selection Tool</h1>
        <p>
          Platform digital inovatif yang dirancang untuk mempermudah proses
          pemilihan pegawai terbaik secara mudah, adil, dan transparan. Dengan
          fitur voting anonim, kriteria yang sesuai, dan hasil yang real-time.
          Ayo tingkatkan semangat kerja kita dengan memberikan penghargaan
          kepada yang paling layak!
        </p>
      </div>
      <div class="img">
        <img
          width="400px"
          src="asset/electronic-voting.png"
          alt="electronic-voting"
        />
      </div>
    </section>
    <!-- Home Section End -->

    <!-- Rekap Section Start -->
    <section class="rekap">
      <div class="pemilihan">
        <a href="#ca">Change Ambassador</a>
        <a href="#eom">Employee of the Month</a>
        <a href="#eoy">Employee of the Year</a>
      </div>
      <div class="calon">
        <p>Calon 1</p>
        <p>Calon 2</p>
        <p>Calon 3</p>
      </div>
    </section>
    <!-- Rekap Section End -->

    <!-- Vote Section Start -->

    <!-- Vote Section End -->

    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>

    <script src="js/script.js"></script>
  </body>
</html>
