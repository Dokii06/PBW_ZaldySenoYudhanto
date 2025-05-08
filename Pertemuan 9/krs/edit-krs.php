<?php
// Isi bagian ini dengan kode untuk mengecek apakah ada parameter 'id' di URL
// Jika ada, maka ambil data artikel berdasarkan ID tersebut dan tampilkan dalam form untuk diedit

if (isset($_GET['id'])) {
    include "../koneksi.php";

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM krs WHERE
        id='$id'");
    $data = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
                class="<?= $current_page == '../mahasiswa/mahasiswa.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data Mahasiswa
                </a>
                <a href="../matakuliah/matakuliah.php"
                class="<?= $current_page == '../matakuliah/matakuliah.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data Matakuliah
                </a>
                <a href="krs.php"
                class="<?= $current_page == 'krs.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data KRS
                </a>
            </nav>
        </aside>
        <!-- input data mahasiswa -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Input Data Mahasiswa</h1>
            <form action="edit-krs-proccess.php" method="POST" class="space-y-4">
                <input type="hidden" name="id_lama" value="<?= $data['id'] ?>">
                <div>
                    <label for="id" class="block font-medium mb-1">id</label>
                    <input type="text" id="id" name="id" required value="<?= $data['id'] ?>"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="nama" class="block font-medium mb-1">NPM Mahasiswa</label>
                    <select name="mahasiswa_npm" id="mahasiswa_npm" required value="<?= $data['mahasiswa_npm'] ?>"
                        class="w-full border border-gray-300 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"> 
                        <?php
                            include 'koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='{$data['npm']}'>{$data['npm']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="matakuliah_kodemk" class="block font-medium mb-1">Kode Mata Kuliah</label>
                    <select name="matakuliah_kodemk" id="matakuliah_kodemk" required value="<?= $data['matakuliah_kodemk'] ?>"
                        class="w-full border border-gray-300 p-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <?php
                            include 'koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM matakuliah");
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='{$data['kodemk']}'>{$data['kodemk']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" name="edit-krs" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>


<?php
}
?>