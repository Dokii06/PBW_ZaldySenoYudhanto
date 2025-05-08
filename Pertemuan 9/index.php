<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <!-- Pesan notifikasi simpan ke database berhasil atau tidak -->
    <?php if (isset($_GET['message']) && isset($_GET['type'])):
        $type = $_GET['type'];
        $message = htmlspecialchars($_GET['message']);

        $styles = [
            'success' => 'bg-green-100 border border-green-400 text-green-700',
            'error'   => 'bg-red-100 border border-red-400 text-red-700',
            'warning' => 'bg-yellow-100 border border-yellow-400 text-yellow-700',
            'info'    => 'bg-blue-100 border border-blue-400 text-blue-700',
        ];

        $class = $styles[$type] ?? $styles['info'];
    ?>
    <div id="alert-box" class="fixed top-4 right-4 z-50 px-4 py-3 rounded shadow-lg <?= $class ?>">
        <?= $message ?>
    </div>

    <!-- Auto-hide setelah 10 detik -->
    <script>
        setTimeout(() => {
            const alertBox = document.getElementById('alert-box');
            if (alertBox) {
                alertBox.style.transition = 'opacity 0.5s ease';
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.remove(), 500); // remove dari DOM
            }
        }, 10000); // 10000 ms = 10 detik
    </script>
    <?php endif; ?>

    <!-- isi data join mahasiswa, matakuliah, dan krs -->
    <div class="flex min-h-screen">
        <?php
        $current_page = basename($_SERVER['PHP_SELF']); // nama file halaman saat ini
        ?>
        <aside class="w-64 bg-gray-200 p-4">
            <nav class="flex flex-col space-y-2">
                <a href="index.php"
                class="<?= $current_page == 'index.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Home
                </a>
                <a href="mahasiswa/mahasiswa.php"
                class="<?= $current_page == 'mahasiswa/mahasiswa.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data Mahasiswa
                </a>
                <a href="matakuliah/matakuliah.php"
                class="<?= $current_page == 'matakuliah/matakuliah.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data Matakuliah
                </a>
                <a href="krs/krs.php"
                class="<?= $current_page == 'krs/krs.php' ? 'bg-blue-900 text-white' : 'text-gray-800 hover:bg-gray-300' ?> px-3 py-2 rounded">
                    Data KRS
                </a>
            </nav>
        </aside>

        <div class="flex-1 p-4">
            <div class="flex flex-col mb-4 space-y-4 p-4">
                <h1>Data Mahasiswa</h1>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr class="text-left">
                            <th class="px-4 py-2">No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nama Matakuliah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php   
                        include "koneksi.php";
                        $no = 1;
                                $query = mysqli_query($koneksi, "SELECT m.nama AS nama_mahasiswa, mk.nama AS nama_matakuliah, mk.jumlah_sks as sks 
                                FROM mahasiswa m
                                JOIN krs k ON m.npm = k.mahasiswa_npm
                                JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk");

                                foreach ($query as $data) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama_mahasiswa'] ?></td>
                                    <td><?= $data['nama_matakuliah'] ?></td>
                                    <td class="px-4 py-2">
                                        <span class="text-red-600 font-semibold"><?= $data['nama_mahasiswa'] ?></span>
                                        mengambil mata kuliah
                                        <span class="text-red-600 font-semibold"><?= $data['nama_matakuliah'] ?></span>
                                        (<?= $data['sks'] ?> SKS)
                                    </td>
                                </tr>
                            <?php
                            }
                            mysqli_close($koneksi);
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>