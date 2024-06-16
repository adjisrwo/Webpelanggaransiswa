<?php
include 'koneksi.php';

$sql = "SELECT * FROM pelanggaran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Daftar Pelanggaran</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Bentuk Pelanggaran</th>
                        <th class="py-2 px-4 border-b">Kategori</th>
                        <th class="py-2 px-4 border-b">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr class='hover:bg-gray-100'>";
                            echo "<td class='py-2 px-4 border-b'>" . $row["id"]. "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . $row["bentuk_pelanggaran"]. "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . $row["kategori"]. "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . $row["poin"]. "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td class='py-2 px-4 border-b text-center' colspan='4'>0 hasil</td></tr>";
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
