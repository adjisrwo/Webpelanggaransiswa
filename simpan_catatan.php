<?php
include 'koneksi.php';

$id_siswa = $_POST['id_siswa'];
$id_pelanggaran = $_POST['id_pelanggaran'];
$keterangan = $_POST['keterangan'];

// Fetch student name
$siswa_sql = "SELECT nama FROM siswa WHERE id='$id_siswa'";
$siswa_result = $conn->query($siswa_sql);
$siswa_row = $siswa_result->fetch_assoc();
$nama_siswa = $siswa_row['nama'];

// Fetch violation details
$pelanggaran_sql = "SELECT bentuk_pelanggaran FROM pelanggaran WHERE id='$id_pelanggaran'";
$pelanggaran_result = $conn->query($pelanggaran_sql);
$pelanggaran_row = $pelanggaran_result->fetch_assoc();
$bentuk_pelanggaran = $pelanggaran_row['bentuk_pelanggaran'];

// Insert data into the database
$sql = "INSERT INTO catatan_pelanggaran (id_siswa, id_pelanggaran, keterangan) VALUES ('$id_siswa', '$id_pelanggaran', '$keterangan')";

$success = false;
$message = "";

if ($conn->query($sql) === TRUE) {
    $success = true;
    $message = "Catatan pelanggaran berhasil ditambahkan!";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Catatan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <?php if ($success): ?>
                <h1 class="text-3xl font-bold text-green-500 mb-4">Berhasil!</h1>
                <p class="text-gray-700 mb-4"><?php echo $message; ?></p>
                <p class="text-gray-700 mb-6">
                    Nama Siswa: <?php echo htmlspecialchars($nama_siswa); ?><br>
                    Jenis Pelanggaran: <?php echo htmlspecialchars($bentuk_pelanggaran); ?><br>
                    Keterangan: <?php echo htmlspecialchars($keterangan); ?>
                </p>
                <a href="index.php?page=list_catatan" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Lihat Daftar Catatan</a>
                <a href="index.php?page=tambah_catatan" class="inline-block bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-700 ml-2">Tambah Catatan Lagi</a>
            <?php else: ?>
                <h1 class="text-3xl font-bold text-red-500 mb-4">Gagal!</h1>
                <p class="text-gray-700 mb-4"><?php echo $message; ?></p>
                <a href="index.php?page=tambah_catatan" class="inline-block bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Kembali</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
