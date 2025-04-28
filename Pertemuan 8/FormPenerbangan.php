<?php include 'Data.php'; ?> 

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="assets/StyleForm.css">
</head>
<body>
<h1 class = "judul">Pendaftaran Rute Penerbangan</h1>

<form method="POST" action="DataPenerbangan.php">
    <div class="form-group">
        <label for="nama_maskapai">Nama Maskapai:</label>
        <input type="text" id="nama_maskapai" name="nama_maskapai" required>
    </div>
    <div class="form-group">
        <label for="asal">Bandara Asal:</label>
        <select id="asal" name="asal" required>
            <option value="">-- Pilih Bandara Asal --</option>
            <?php foreach($bandara_asal as $nama => $pajak): ?>
                <option value="<?php echo $nama; ?>"><?php echo $nama; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tujuan">Bandara Tujuan:</label>
        <select id="tujuan" name="tujuan" required>
            <option value="">-- Pilih Bandara Tujuan --</option>
            <?php foreach($bandara_tujuan as $nama => $pajak): ?>
                <option value="<?php echo $nama; ?>"><?php echo $nama; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="harga_tiket">Harga Tiket(Rp): </label>
        <input type="number" id="harga_tiket" name="harga_tiket" required>

    </div>  

    <button type="submit">Daftarkan Penerbangan</button>
</form>

</body>
</html>