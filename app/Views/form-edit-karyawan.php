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
        <header>Form Edit Karyawan</header>
        <form action="#" class="form">
            <div class="input-box">
                <label>NIP</label>
                <input type="text" placeholder="Masukkan NIP" value="<?php echo $nip ?>" required />
            </div>
            <div class="input-box">
                <label>Nama</label>
                <input type="text" placeholder="Masukkan Nama" value="<?php echo $nama ?>" required />
            </div>
            <div class=" input-box">
                <label>Username</label>
                <input type="text" placeholder="Masukkan Username" value="<?php echo $username ?>" required />
            </div>
            <div class=" input-box">
                <label>Tim</label>
                <input type="text" placeholder="Masukkan Tim" value="<?php echo $tim ?>" required />
            </div>
            <div class=" tombol">
                <button>Edit</button>
                <button>Back</button>
            </div>
        </form>
    </section>
</body>

</html>