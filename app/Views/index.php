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
    rel="stylesheet" />

  <!-- Feather Icon  -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- dataTables -->
  <!-- <link rel="stylesheet" href="/asset/dataTables/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/asset/dataTables/css/dataTables.bootstrap5.css" /> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">

  <link rel="stylesheet" href="/asset/style-admin.css" />

</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">BPS Kabupaten Tulang Bawang</a>

    <div class="navbar-menu">
      <a href="#slider">Home</a>
      <a href="#variabel">Variabel</a>
      <a href="#pegawai">Pegawai</a>
    </div>

    <div class="navbar-logout">
      <a href="#" id="user"><i data-feather="user"></i></a>
      <a href="#" id="logout"><i data-feather="log-out"></i></a>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Slider Section Start -->
  <section class="slider" id="slider">
    <div class="slider-container">
      <!-- <h1>Best Employee Selection Tool</h1>
      <p>
        Platform digital inovatif yang dirancang untuk mempermudah proses
        pemilihan pegawai terbaik secara mudah, adil, dan transparan. Dengan
        fitur voting anonim, kriteria yang sesuai, dan hasil yang real-time.
        Ayo tingkatkan semangat kerja kita dengan memberikan penghargaan
        kepada yang paling layak!
      </p> -->
      <div class="slider-item">
        <img src="/asset/slide1.jpg" alt="">
        <div class="slider-content">
          <h2 class="slider-title">Employee of The Month</h2>
          <p class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores quod, sequi voluptas dolorem illum maiores eaque delectus alias voluptatem facere nesciunt veritatis. Iusto, omnis eius?</p>
          <a class="slider-action" href="#">MASUK</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Slider Section End -->

  <!-- Variabel Section Start -->
  <section class="variabel" id="variabel">
    <div class="table-title">
      <h1>Variabel</h1>
    </div>
    <div class="table">
      <table id="tabel-variabel" class="display">
        <thead>
          <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>CKP</th>
            <th>KipApp</th>
            <th>KJK</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($variabel as $baris): ?>
            <tr>
              <td><?php echo $baris['nip'] ?></td>
              <td><?php echo $baris['nama'] ?></td>
              <td><?php echo $baris['ckp'] ?></td>
              <td><?php echo $baris['kipapp'] ?></td>
              <td><?php echo $baris['kjk'] ?></td>
              <td>
                <a href="/karyawan/tambah">
                  <button class="tombol-sukses">
                    <i data-feather="edit"></i> Edit
                  </button>
                </a>
                <a href="#">
                  <button class="tombol-sukses">
                    <i data-feather="trash"></i> Delete
                  </button>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
  <!-- Variabel Section End -->

  <!-- Pegawai Section Start -->
  <section class="pegawai" id="pegawai">
    <div class="table-title">
      <h1>Pegawai</h1>
    </div>
    <div class="table">
      <table id="tabel-pegawai" class="display">
        <thead>
          <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tim</th>
            <th>Username</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pegawai as $baris): ?>
            <tr>
              <td><?php echo $baris['nip'] ?></td>
              <td><?php echo $baris['nama'] ?></td>
              <td><?php echo $baris['tim'] ?></td>
              <td><?php echo $baris['username'] ?></td>
              <td>
                <a href="/karyawan/tambah">
                  <button class="tombol-sukses">
                    <i data-feather="edit"></i> Edit
                  </button>
                </a>
                <a href="#">
                  <button class="tombol-sukses">
                    <i data-feather="trash"></i> Delete
                  </button>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
  <!-- Pegawai Section End -->

  <!-- Footer Start -->
  <footer>
    <div class="credit">
      <p>
        &copy; 2025 Pegawai Teladan
        <span>|| BPS Kabupaten Tulang Bawang</span>
      </p>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- Feather Icon -->
  <script>
    feather.replace();
  </script>

  <!-- dataTables -->
  <!-- <script src="/asset/dataTables/js/bootstrap.bundle.min.js"></script>
    <script src="/asset/dataTables/js/dataTables.bootstrap5.js"></script>
    <script src="/asset/dataTables/js/dataTables.js"></script>
    <script src="/asset/dataTables/js/jquery-3.7.1.js"></script> -->

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

  <script>
    new DataTable('#tabel-variabel', {
      columnDefs: [{
        'className': 'dt-left',
        targets: [0, 2, 3, 4, 5]
      }]
    });

    new DataTable('#tabel-pegawai', {
      columnDefs: [{
        'className': 'dt-left',
        targets: [0, 1, 2, 3]
      }]
    });
  </script>

</body>

</html>