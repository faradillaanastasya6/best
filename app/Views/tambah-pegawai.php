<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Edit Karyawan</title>

    <!-- Poppin Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;800&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/asset/style-karyawan.css" />
</head>

<body>
    <section class="container">
        <header>Form Tambah Pegawai</header>
        <form action="http://localhost:8080/pegawai/tambah" method="post" class="form">
            <div class="input-box">
                <label>NIP</label>
                <input type="text" placeholder="Masukkan NIP" name="nip" required />
            </div>
            <div class="input-box">
                <label>Nama</label>
                <input type="text" placeholder="Masukkan Nama" name="nama" required />
            </div>
            <div class=" input-box">
                <label>Username</label>
                <input type="text" placeholder="Masukkan Username" name="username" required />
            </div>
            <div class=" input-box">
                <label>Password</label>
                <input type="password" placeholder="Masukkan Password" name="password" required />
            </div>
            <div class=" input-box">
                <label>Tim</label>
                <input type="text" placeholder="Masukkan Tim" name="tim" required />
            </div>
            <div class=" tombol">
                <button type="submit">Tambah</button>
                <button>Back</button>
            </div>
        </form>
    </section>
</body>

</html>