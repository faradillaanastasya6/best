<?php
$status = $status ?? 'berlangsung';
$hasil = $hasil ?? [];
$voters = $voters ?? [];
$tahun = $tahun ?? '';
$bulan = $bulan ?? '';
$event = $event ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Best Employee Selection Tool</title>

  <!-- Poppin Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;800&display=swap"
    rel="stylesheet" />

  <!-- Feather Icon  -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="/asset/style-voter.css" />
</head>

<body>

  <!-- Header -->
  <div class="header">
    <div class="logo">
      <img src="/asset/logo.png" alt="Logo" style="width: 24px; vertical-align: middle; margin-right: 6px;">
      <span>BPS Tulang Bawang</span>
    </div>
    <div id="hamburgerBtn"><i data-feather="menu"></i></div>
    <div class="user-menu" id="userMenu">
      <div><strong><?= session('name'); ?></strong></div>
      <div><?= session('nip'); ?></div>
      <a href="/logout">Logout</a>
    </div>
  </div>

  <!-- Home Section Start -->
  <section id="home-section">
    <!-- hide
    <div class="penjelasan">
      Penilaian dilakukan secara objektif berdasarkan indikator yang telah ditentukan.
      Partisipasi Anda sangat dihargai untuk menciptakan lingkungan kerja yang inspiratif dan berintegritas.
    </div>

    <div class="carousel-container">
      <div class="carousel-wrapper" id="carouselWrapper">
        
        <div class="carousel-slide">
          <h3>Change Ambassador (CA)</h3>
          <p>Untuk pegawai yang mendorong perubahan positif</p>
        </div>
        
        <div class="carousel-slide">
          <h3>Employee of the Month (EOM)</h3>
          <p>Untuk kontribusi unggul dalam periode bulanan</p>
        </div>
        
        <div class="carousel-slide">
          <h3>Employee of the Year (EOY)</h3>
          <p>Untuk inspirasi luar biasa sepanjang tahun</p>
        </div>
      </div>
      -->


    <!-- delete soon -->
    <div class="slider-container">
      <div class="slider-item">
        <div class="slider-content">
          <h2 class="slider-title">Employee of The Month</h2>
          <p class="quote">~ Karena setiap apresiasi berarti ~</p>
        </div>
      </div>
    </div>

    <!-- Nav Buttons -->
    <button class="carousel-btn left" id="prevBtn"><i data-feather="chevron-left"></i></button>
    <button class="carousel-btn right" id="nextBtn"><i data-feather="chevron-right"></i></button>
    </div>
  </section>
  <!-- Home Section End -->

  <!-- Vote Section Start -->
  <!-- Filter Pemilihan -->
  <section id="vote-section" style="display: none;">
    <div class="vote-container">
      <div class="event-info">
        <h2><?= $event['name'] ?></h2>
        <p class="event-dates">
          <span><?= date('d F Y H:i:s', strtotime($event['start_date'])) ?></span><br>
          <span>sampai dengan</span><br>
          <span><?= date('d F Y H:i:s', strtotime($event['end_date'])) ?></span>
        </p>
      </div>
      <div class="vote-button-container">
        <button id="mulai-voting" class="vote-button">Mulai Voting</button>
      </div>
    </div>
  </section>

  <!-- Rekap Section Start-->
  <section id="rekap-section" style="display:none;">
    <div class="rekap-section">
      <h2>Rekap Voting Pegawai Teladan</h2>
      <p>Status Voting:
        <?php if ($status === 'selesai'): ?>
          <span style="color:green; font-weight:bold;">Sudah Selesai</span>
        <?php else: ?>
          <span style="color:orange; font-weight:bold;">Masih Berlangsung</span>
        <?php endif; ?>
      </p>

      <?php if ($status === 'selesai'): ?>
        <h3>Hasil Voting</h3>
        <table border="1" cellpadding="8" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Kandidat</th>
              <th>Jabatan</th>
              <th>Total Nilai</th>
              <th>Rata-rata</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($hasil as $row): ?>
              <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= array_sum($row['nilai']) ?></td>
                <td><?= round(array_sum($row['nilai']) / count($row['nilai']), 2) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      <?php else: ?>
        <h3>Daftar Voter yang Sudah Melakukan Voting</h3>
        <table border="1" cellpadding="8" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Voter</th>
              <th>NIP</th>
              <th>Tanggal Pilih</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($employee as $e): ?>
              <tr>
                <td><?= $e['name'] ?></td>
                <td><?= $e['nip'] ?></td>
                <td><?= $e['created_at'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </section>
  <!-- Rekap Section End-->

  <!-- Navbar Bawah -->
  <div class="navbar">
    <a href="#" onclick="showSection('home-section')">
      <i class="bi bi-house-door"></i> Home
    </a>

    <a href="#" onclick="showSection('vote-section')">
      <i class="bi bi-check2-circle"></i> Vote
    </a>
    <a href="#" onclick="showSection('rekap-section')">
      <i class="bi bi-bar-chart-fill"></i> Rekap
    </a>
  </div>
  <pre>

  <script>
    // ===============================
    // MENU USER (HAMBURGER TOGGLE)
    // ===============================
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const userMenu = document.getElementById("userMenu");

    hamburgerBtn.addEventListener("click", () => userMenu.classList.toggle("active"));

    document.addEventListener("click", (event) => {
      const isClickInside = userMenu.contains(event.target) || hamburgerBtn.contains(event.target);
      if (!isClickInside) userMenu.classList.remove("active");
    });

    // ===============================
    // CAROUSEL SLIDER (HOME)
    // ===============================
    const slides = document.querySelectorAll('.carousel-slide');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
      });
    }

    prevBtn.addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    });

    nextBtn.addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    });

    document.addEventListener("DOMContentLoaded", () => {
      showSlide(currentSlide);
      showSection('home-section');
    });

    // ===============================
    // TAMPILKAN SECTION
    // ===============================
    function showSection(sectionId) {
      document.querySelectorAll("section").forEach((section) => {
        section.style.display = "none";
      });
      document.getElementById(sectionId).style.display = "block";
    }

    // ===============================
    // HALAMAN VOTE
    // ===============================
    document.getElementById('mulai-voting').addEventListener('click', function() {
      let eventId = "<?= $event['id_event']; ?>";
      window.location.href = `/voter/${eventId}`;
    });
  </script>

  <!-- Feather Icon -->
  <script>
    feather.replace();
  </script>

</body>

</html>