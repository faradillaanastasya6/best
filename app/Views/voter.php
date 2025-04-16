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
      <div><strong>Nama User</strong></div>
      <div>NIP</div>
      <a href="#">Log Out</a>
    </div>
  </div>

  <!-- Home Section Start -->
  <section id="home-section">
    <div class="penjelasan">
      Penilaian dilakukan secara objektif berdasarkan indikator yang telah ditentukan.
      Partisipasi Anda sangat dihargai untuk menciptakan lingkungan kerja yang inspiratif dan berintegritas.
    </div>

    <div class="carousel-container">
      <div class="carousel-wrapper" id="carouselWrapper">
        <!-- Slide 1 -->
        <div class="carousel-slide">
          <h3>Change Ambassador (CA)</h3>
          <p>Untuk pegawai yang mendorong perubahan positif</p>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-slide">
          <h3>Employee of the Month (EOM)</h3>
          <p>Untuk kontribusi unggul dalam periode bulanan</p>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-slide">
          <h3>Employee of the Year (EOY)</h3>
          <p>Untuk inspirasi luar biasa sepanjang tahun</p>
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
    <div class="filter-container" id="vote-filter">
      <div class="filter-item">
        <label for="tahun">Tahun:</label>
        <select id="tahun" name="tahun">
          <option value="2025">2025</option>
          <option value="2024">2024</option>
        </select>
      </div>

      <div class="filter-item">
        <label for="bulan">Bulan:</label>
        <select id="bulan" name="bulan">
          <option value="januari">Januari</option>
          <option value="februari">Februari</option>
          <option value="maret">Maret</option>
          <option value="april">April</option>
          <option value="mei">Mei</option>
          <option value="juni">Juni</option>
          <option value="juli">Juli</option>
          <option value="agustus">Agustus</option>
          <option value="september">September</option>
          <option value="oktober">Oktober</option>
          <option value="november">November</option>
          <option value="desember">Desember</option>
        </select>
      </div>

      <div class="filter-item">
        <label for="event">Event:</label>
        <select id="event" name="event">
          <option value="eoy">Employee Of The Year</option>
          <option value="eom">Employee Of The Month</option>
          <option value="ca">Change Ambassador</option>
        </select>
      </div>
    </div>
    <div class="vote-button-container">
      <button id="mulai-voting" class="vote-button">Mulai Voting</button>
    </div>
  </section>


  <!-- Vote Carousel -->
  <section id="vote-carousel" style="display:none;">
    <div id="kandidat-container"></div>
    <div class="vote-navigation">
      <button id="prevKandidat" style="display: none;">Sebelumnya</button>
      <button id="nextKandidat">Selanjutnya</button>
      <button id="submitVote" style="display: none;">Submit</button>
    </div>
    <div id="terima-kasih" style="display: none; text-align: center; margin-top: 2rem;">
      <h3>Terima kasih sudah memberikan penilaian!</h3>
      <p>Vote Anda sudah tercatat</p>
    </div>
  </section>
  <!-- Vote Section End -->

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
            </tr>
          </thead>
          <tbody>
            <?php foreach ($voters as $v): ?>
              <tr>
                <td><?= $v['nama'] ?></td>
                <td><?= $v['nip'] ?></td>
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

  <script>
    // ===============================
    // DATA KANDIDAT & PERTANYAAN
    // ===============================
    const kandidatData = [{
        nama: "Andi Saputra",
        jabatan: "Statistisi Ahli Pertama",
        nilai: Array(21).fill(0)
      },
      {
        nama: "Siti Aminah",
        jabatan: "Pranata Komputer Ahli Muda",
        nilai: Array(21).fill(0)
      },
      {
        nama: "Dedi Pratama",
        jabatan: "Statistisi Terampil",
        nilai: Array(21).fill(0)
      }
    ];

    const pertanyaan = Array.from({
      length: 21
    }, (_, i) => `Pertanyaan ${i + 1}`);
    const kandidatContainer = document.getElementById("kandidat-container");

    // ===============================
    // GENERATE KANDIDAT DAN PERTANYAAN
    // ===============================

    kandidatData.forEach((kandidat, index) => {
      const kandidatElement = document.createElement("div");
      kandidatElement.classList.add("kandidat");
      kandidatElement.dataset.index = index;
      kandidatElement.style.display = "none";

      kandidatElement.innerHTML = `
       <div class="card">
    <h3>${kandidat.nama}</h3>
    <p>${kandidat.jabatan}</p>
    <div class="pertanyaan-container">
      ${pertanyaan.map((q, i) => `
        <div class="pertanyaan-item">
          <p>${q}</p>
          <div class="rating" data-index="${index}" data-question="${i}">
            ${[1, 2, 3, 4, 5].map(j => `
              <i class="star" data-value="${j}">&#9733;</i>
            `).join('')}
          </div>
        </div>
      `).join('')}
      </div>
    <button class="lanjut-kandidat btn-lanjut">Lanjut</button>
  </div>
    </div>
  </div>
`;

      kandidatContainer.appendChild(kandidatElement);
    });


    // ===============================
    // FUNGSI SET RATING BINTANG
    // ===============================
    kandidatContainer.addEventListener("click", function(e) {
      if (e.target.classList.contains("star")) {
        const star = e.target;
        const ratingValue = parseInt(star.dataset.value);
        const ratingDiv = star.parentElement;
        const kandidatIndex = parseInt(ratingDiv.dataset.index);
        const questionIndex = parseInt(ratingDiv.dataset.question);

        // Simpan nilai
        kandidatData[kandidatIndex].nilai[questionIndex] = ratingValue;

        // Update tampilan bintang
        const allStars = ratingDiv.querySelectorAll(".star");
        allStars.forEach((s, i) => {
          s.classList.toggle("selected", i < ratingValue);
        });
      }
    });

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
    // CAROUSEL KANDIDAT (VOTING)
    // ===============================
    let currentIndex = 0;
    const kandidatList = document.querySelectorAll(".kandidat");
    const prevButton = document.getElementById("prevKandidat");
    const nextButton = document.getElementById("nextKandidat");
    const submitButton = document.getElementById("submitVote");
    const startButton = document.getElementById("mulai-voting");

    startButton.addEventListener("click", () => {
      // Sembunyikan filter dan tombol mulai
      document.querySelector(".filter-container").style.display = "none";
      startButton.style.display = "none";

      // Tampilkan voting
      document.getElementById("vote-carousel").style.display = "block";

      // Set kandidat pertama
      currentIndex = 0;
      updateNavigationButtons();
    });

    function updateNavigationButtons() {
      kandidatList.forEach((el, i) => {
        el.style.display = i === currentIndex ? "block" : "none";
      });

      prevButton.style.display = currentIndex > 0 ? "inline-block" : "none";
      nextButton.style.display = currentIndex < kandidatList.length - 1 ? "inline-block" : "none";

      document.getElementById("submitVote").style.display =
        currentIndex === kandidatList.length - 1 ? "block" : "none";
    }

    nextButton.addEventListener("click", () => {
      if (currentIndex < kandidatList.length - 1) {
        currentIndex++;
        updateNavigationButtons();
      }
    });

    prevButton.addEventListener("click", () => {
      if (currentIndex > 0) {
        currentIndex--;
        updateNavigationButtons();
      }
    });

    // Tombol "Lanjut" dalam Card Kandidat
    kandidatContainer.addEventListener("click", function(e) {
      if (e.target.classList.contains("lanjut-kandidat")) {
        if (currentIndex < kandidatList.length - 1) {
          currentIndex++;
          updateNavigationButtons();
        } else {
          // Sembunyikan tombol lanjut saat sudah di kandidat terakhir dan munculkan tombol submit
          document.getElementById("submitVote").style.display = "block";
        }
      }
    });

    // ===============================
    // HANDLER UNTUK TOMBOL SUBMIT
    // ===============================
    submitButton.addEventListener("click", function() {
      // Cek apakah semua kandidat sudah dinilai
      let isValid = true;

      kandidatData.forEach(kandidat => {
        // Periksa apakah ada pertanyaan yang belum dinilai
        if (kandidat.nilai.includes(0)) {
          isValid = false;
        }
      });

      if (!isValid) {
        // Tampilkan peringatan jika ada yang belum dinilai
        alert("Semua pertanyaan harus dinilai sebelum submit.");
        return; // Hentikan proses jika ada yang belum dinilai
      }

      // Jika semua sudah dinilai, lanjutkan ke proses submit
      let allVotes = [];
      kandidatData.forEach((kandidat, index) => {
        allVotes.push({
          nama: kandidat.nama,
          nilai: kandidat.nilai
        });
      });

      // Tampilkan nilai di console (atau kirim ke server)
      console.log("Votes:", allVotes);

      // Kirim data ke server
      fetch("<?= base_url('voter/simpan') ?>", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(allVotes)
        })
        .then(response => response.json())
        .then(data => {
          console.log("Server response:", data);
          alert("Voting berhasil disimpan!");

          // Reset voting setelah berhasil
          kandidatData.forEach(kandidat => kandidat.nilai = Array(21).fill(0));

          document.getElementById("terima-kasih").style.display = "block";
          document.getElementById("vote-section").style.display = "none";
        })
        .catch(error => {
          console.error("Gagal mengirim voting:", error);
          alert("Terjadi kesalahan saat menyimpan voting.");
        });

      // Tampilkan pesan terima kasih
      alert("Terima kasih, voting Anda sudah tercatat!");

      // Reset voting atau lakukan tindakan lain
      kandidatData.forEach(kandidat => kandidat.nilai = Array(21).fill(0)); // Reset nilai

      // Mungkin ganti tampilan untuk menampilkan pesan selesai
      document.getElementById("terima-kasih").style.display = "block";
      document.getElementById("vote-section").style.display = "none";
    });

    // ===============================
    // AUTO MULAI VOTING JIKA ADA PARAMETER
    // ===============================
    document.addEventListener("DOMContentLoaded", () => {
      showSlide(currentSlide);
      showSection('home-section');

      const tahun = "<?= $tahun ?>";
      const bulan = "<?= $bulan ?>";
      const event = "<?= $event ?>";

      if (tahun && bulan && event) {
        showSection('vote-section');
        document.querySelector(".filter-container").style.display = "none";
        document.getElementById("mulai-voting").style.display = "none";
        document.getElementById("vote-carousel").style.display = "block";

        if (kandidatList.length > 0) {
          kandidatList.forEach((k, i) => k.style.display = "none");
          kandidatList[0].style.display = "block";
          currentIndex = 0;
          updateNavigationButtons();
        }
      }
    });
  </script>

  <!-- Feather Icon -->
  <script>
    feather.replace();
  </script>

</body>

</html>