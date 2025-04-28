<?php include 'Data.php'; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian</title>
    <link rel="stylesheet" href="assets/StyleData.css">
</head>
<body>
<h1>Data Penerbangan</h1>
<section>
    <div class= "container">
        <div class="table-container">
            <h2>Rincian Data Penerbangan</h2>
            <table>
                <tr>
                    <th>Nomor Penerbangan</th>
                    <td><?php echo $nomor; ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $tanggal; ?></td>
                </tr>
                <tr>
                    <th>Nama Maskapai</th>
                    <td><?php echo $nama_maskapai; ?></td>
                </tr>
                <tr>
                    <th>Asal Penerbangan</th>
                    <td><?php echo $asal; ?></td>
                </tr>
                <tr>
                    <th>Tujuan Penerbangan</th>
                    <td><?php echo $tujuan; ?></td>
                </tr>
            </table>
        </div>
        <div class="table-container">
            <table>
            <h2>Rincian Biaya</h2>
            <tr>
                <th>Harga Tiket</th>
                <td><?php echo "Rp " . number_format($harga_tiket, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Pajak</th>
                <td><?php echo "Rp " . number_format($pajak, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Total Harga Tiket</th>
                <td class = "total"><?php echo "Rp " . number_format($total_harga, 0, ',', '.'); ?></td>
            </tr>
            </table>
        </div>
    </div>
    <a href="formpenerbangan.php" class="btn">Kembali ke Form Penerbangan</a>
</section>


</body>
</html>

