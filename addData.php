<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data barang berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data barang gagal ditambahkan!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Bootstrap Icons -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <!-- Font Google -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <!-- animasi Css Aos -->
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     <!-- My CSS -->
     <link rel="stylesheet" href="css/style.css">

     <title>Tambah Data</title>
</head>

<body background="img/bg/bck.png">
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
          <div class="container">
               <a class="navbar-brand" href="index.php">Sistem Informasi Manajemen Fasilitas</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="index.php">Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#about">About</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="logout.php">Logout</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <!-- Close Navbar -->

     <!-- Container -->
     <div class="container">
          <div class="row my-2">
               <div class="col-md text-light">
                    <h3 class="fw-bold text-uppercase Tambah_data"></h3>
               </div>
               <hr>
          </div>
          <div class="row my-2 text-light">
               <div class="col-md">
                    <form action="" method="post" enctype="multipart/form-data">
                         <div class="mb-3">
                              <label for="nis" class="form-label">No Barang</label>
                              <input type="number" class="form-control w-50" id="nis" placeholder="No Barang" min="1"
                                   name="nis" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="nama" class="form-label">Nama Barang</label>
                              <input type="text" class="form-control form-control-md w-50" id="nama"
                                   placeholder="Masukkan Nama" name="nama" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="lokasi" class="form-label">Tempat Lokasi Perbaikan</label>
                              <input type="text" class="form-control w-50" id="lokasi"
                                   placeholder="Tempat Lokasi Perbaikan" name="lokasi" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="tanggal" class="form-label">Tanggal Pendataan Perbaikan </label>
                              <input type="date" class="form-control w-50" id="tanggal" name="tanggal"
                                   max="01-01-2006" required>
                         </div>
                         <div class="mb-3">
                                <label>Kondisi</label>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="kondisi" id="service"
                                        value="service">
                                   <label class="form-check-label" for="service">Service</label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="kondisi" id="ganti"
                                        value="ganti">
                                   <label class="form-check-label" for="ganti">Ganti</label>
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="ruangan" class="form-label">Ruangan</label>
                              <select class="form-select w-50" id="ruangan" name="ruangan">
                                   <option disabled selected value>--------------------------------------------Pilih
                                    Ruangan--------------------------------------------</option>
                                   <option value="RA">RA</option>
                                   <option value="RB">RB</option>
                                   <option value="RC">RC</option>
                                   <option value="RD">RD</option>
                                   <option value="RM">RM</option>
                                   <option value="GR">GR</option>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="email" class="form-label">E-Mail</label>
                              <input type="email" class="form-control w-50" id="email" placeholder="Masukkan E-Mail"
                                   name="email" autocomplete="off" required>
                         </div>
                         <div class="mb-3">
                              <label for="gambar" class="form-label">Gambar</label>
                              <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                         </div>
                         <div class="mb-3">
                              <label for="detail" class="form-label">Detail</label>
                              <textarea class="form-control w-50" id="detail" rows="5" name="alamat"
                                   placeholder="Detail Kerusakan" autocomplete="off" required></textarea>
                         </div>
                         <hr>
                         <a href="index.php" class="btn btn-secondary">Kembali</a>
                         <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
               </div>
          </div>
     </div>
     <!-- Close Container -->



     <!-- Footer -->
     <div class="container-fluid">
          <div class="row bg-dark text-white text-center">
               <div class="col my-2" id="about">
                    <br><br><br>
                    <h4 class="fw-bold text-uppercase">About</h4>

                    <p>
                         Pembuat:
                         1. Farhan Ade Atalarik (2135038)
                    </p>
               </div>
          </div>
     </div>
     <!-- Close Footer -->

     <!-- Bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
     </script>

     <!-- animasi  gsap-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"> </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/TextPlugin.min.js"></script>
     <script>
     gsap.registerPlugin(TextPlugin);
     gsap.to('.Tambah_data', {
          duration: 2,
          delay: 1,
          text: '<i class="bi bi-person-plus-fill"></i>Tambah Data Siswa :)'
     })
     gsap.from('.navbar', {
          duration: 1,
          y: '-100%',
          opacity: 0,
          ease: 'bounce',
     })
     </script>
</body>

</html>