<?php
include 'koneksi.php';

$sql = "
SELECT cp.id, s.nama AS nama_siswa, p.bentuk_pelanggaran, cp.keterangan, p.poin
FROM catatan_pelanggaran cp
INNER JOIN siswa s ON cp.id_siswa = s.id
INNER JOIN pelanggaran p ON cp.id_pelanggaran = p.id
";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Catatan Pelanggaran</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nama Siswa</th>
                        <th class="py-2 px-4 border-b">Jenis Pelanggaran</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                        <th class="py-2 px-4 border-b">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr class='hover:bg-gray-100'>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row["id"]). "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row["nama_siswa"]). "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row["bentuk_pelanggaran"]). "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row["keterangan"]). "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row["poin"]). "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td class='py-2 px-4 border-b text-center' colspan='5'>0 hasil</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
