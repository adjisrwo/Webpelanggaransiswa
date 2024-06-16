<?php
include 'koneksi.php';

$sql_siswa = "SELECT * FROM siswa";
$result_siswa = $conn->query($sql_siswa);

$sql_pelanggaran = "SELECT * FROM pelanggaran";
$result_pelanggaran = $conn->query($sql_pelanggaran);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Tambah Catatan Pelanggaran</h1>
        <form action="simpan_catatan.php" method="post" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="id_siswa" class="block text-gray-700">Nama Siswa</label>
                <select id="id_siswa" name="id_siswa" class="w-full mt-2 p-2 border rounded-lg focus:border-blue-500 focus:outline-none">
                    <?php
                    if ($result_siswa->num_rows > 0) {
                        while($row = $result_siswa->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nama"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="id_pelanggaran" class="block text-gray-700">Jenis Pelanggaran</label>
                <select id="id_pelanggaran" name="id_pelanggaran" class="w-full mt-2 p-2 border rounded-lg focus:border-blue-500 focus:outline-none">
                    <?php
                    if ($result_pelanggaran->num_rows > 0) {
                        while($row = $result_pelanggaran->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["bentuk_pelanggaran"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="w-full mt-2 p-2 border rounded-lg focus:border-blue-500 focus:outline-none"></textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
