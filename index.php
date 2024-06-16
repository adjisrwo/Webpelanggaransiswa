<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pelanggaran Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex min-h-screen bg-gray-100">
    <div class="sidebar w-64 bg-white p-4 shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Menu</h2>
        <a href="index.php?page=list_siswa" class="block py-2 px-4 text-gray-700 hover:bg-blue-500 hover:text-white rounded">Daftar Siswa</a>
        <a href="index.php?page=list_pelanggaran" class="block py-2 px-4 text-gray-700 hover:bg-blue-500 hover:text-white rounded">Daftar Pelanggaran</a>
        <a href="index.php?page=list_catatan" class="block py-2 px-4 text-gray-700 hover:bg-blue-500 hover:text-white rounded">Catatan Pelanggaran</a>
        <a href="index.php?page=tambah_catatan" class="block py-2 px-4 text-gray-700 hover:bg-blue-500 hover:text-white rounded">Tambah Catatan Pelanggaran</a>
    </div>

    <div class="content flex-grow p-6">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            include $page . '.php';
        } else {
            echo "<h1 class='text-3xl font-bold mb-4'>Selamat Datang di Sistem Pelanggaran Siswa</h1>";
            echo "<p class='text-gray-700'>Pilih menu di samping untuk mengelola data.</p>";
        }
        ?>
    </div>
</body>
</html>
