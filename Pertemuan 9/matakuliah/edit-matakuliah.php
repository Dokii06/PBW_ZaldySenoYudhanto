<?php
// Isi bagian ini dengan kode untuk mengecek apakah ada parameter 'id' di URL
// Jika ada, maka ambil data artikel berdasarkan ID tersebut dan tampilkan dalam form untuk diedit

if (isset($_GET['kodemk'])) {
    include "../koneksi.php";

    $kodemk = $_GET['kodemk'];
    $query = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE
        kodemk='$kodemk'");
    $data = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah - Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- navbar -->
    <header>
        <nav class="bg-gray-800 p-4 text-white flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="index.php" class="text-lg font-semibold">Home</a>
            </div>
        </nav>
    </header>
    <div class="flex min-h-screen">
        <?php
        $current_page = basename($_SERVER['PHP_SELF']); // nama file halaman saat ini
        ?>
        <aside class="w-64 bg-gray-200 p-4">
            <nav class="flex flex-col space-y-2">
                <a href="../index.php"
                class="<?= $current_page == '../index.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Home
                </a>
                <a href="../mahasiswa/mahasiswa.php"
                class="<?= $current_page == 'mahasiswa.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data Mahasiswa
                </a>
                <a href="matakuliah.php"
                class="<?= $current_page == 'matakuliah.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data Matakuliah
                </a>
                <a href="../krs/krs.php"
                class="<?= $current_page == 'krs.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data KRS
                </a>
            </nav>
        </aside>
        <!-- input data mahasiswa -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Input Data Mahasiswa</h1>
            <form action="edit-matakuliah-proccess.php" method="POST" class="space-y-4">
                <input type="hidden" name="kodemk_lama" value="<?= $data['kodemk'] ?>">
                <div>
                    <label for="kodemk" class="block font-medium mb-1">kodemk</label>
                    <input type="text" id="kodemk" name="kodemk" required value="<?= $data['kodemk'] ?>"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="nama" class="block font-medium mb-1">Nama Mata Kuliah</label>
                    <input type="text" id="nama" name="nama" required value="<?= $data['nama'] ?>"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="jumlah_sks" class="block font-medium mb-1">Jumlah SKS</label>
                    <select name="jumlah_sks" id="jumlah_sks" required value="<?= $data['jumlah_sks'] ?>"
                        class="w-full border border-gray-300 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1" <?= $data['jumlah_sks'] == '1' ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= $data['jumlah_sks'] == '2' ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= $data['jumlah_sks'] == '3' ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= $data['jumlah_sks'] == '4' ? 'selected' : '' ?>>4</option>
                    </select>
                </div>
                <button type="submit" name="edit-matakuliah" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>


<?php
}
?>