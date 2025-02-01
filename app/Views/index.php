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
      <a href="#home">Home</a>
      <a href="#variabel">Variabel</a>
      <a href="#karyawan">Karyawan</a>
    </div>

    <div class="navbar-logout">
      <a href="#" id="user"><i data-feather="user"></i></a>
      <a href="#" id="logout"><i data-feather="log-out"></i></a>
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
        alt="electronic-voting" />
    </div>
  </section>
  <!-- Home Section End -->

  <!-- Variabel Section Start -->
  <section class="variabel" id="variabel">
    <div class="table-title">
      <h1>Variabel</h1>
    </div>
    <div class="table">
      <table id="table" class="display">
        <thead>
          <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>KJK</th>
            <th>CKP</th>
            <th>KipApp</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($karyawan as $baris): ?>
            <tr>
              <td><?php echo $baris['nip'] ?></td>
              <td><?php echo $baris['nama'] ?></td>
              <td><?php echo $baris['kjk'] ?></td>
              <td><?php echo $baris['ckp'] ?></td>
              <td><?php echo $baris['kipapp'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
  <!-- Variabel Section End -->

  <!-- Karyawan Section Start -->
  <section class="karyawan" id="karyawan">
    <div class="table-title">
      <h1>Karyawan</h1>
    </div>
    <!-- Karyawan Section End -->

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
      new DataTable('#table', {
        columnDefs: [{
          'className': 'dt-left',
          targets: [0, 2, 3, 4]
        }]
      });
    </script>

</body>

</html>