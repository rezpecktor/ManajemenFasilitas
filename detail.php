<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataBarang diklik maka
if (isset($_POST['dataBarang'])) {
    $output = '';

    // mengambil data siswa dari nis yang berasal dari dataBarang
    $sql = "SELECT * FROM siswa WHERE nis = '" . $_POST['dataBarang'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">No Barang</th>
                            <td width="60%">' . $row['nis'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama Barang</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tanggal Perbaikan</th>
                            <td width="60%">' . $row['lokasi'] . ', ' . date("d M Y", strtotime($row['tanggal'])) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kondisi</th>
                            <td width="60%">' . $row['kondisi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Ruangan</th>
                            <td width="60%">' . $row['ruangan'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">E-Mail</th>
                            <td width="60%">' . $row['email'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Detail Kerusakan</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
