<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['nim'])) {
    $nim = $conn->real_escape_string($_GET['nim']);
    $sql = "SELECT nim, nama, umur FROM mahasiswa WHERE nim = '$nim'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $row = null;
    }
} else {
    $row = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Detail Mahasiswa</h2>
    <?php if ($row): ?>
        <p>NIM: <?= htmlspecialchars($row['nim']) ?></p>
        <p>Nama: <?= htmlspecialchars($row['nama']) ?></p>
        <p>Umur: <?= htmlspecialchars($row['umur']) ?></p>
    <?php else: ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
    <a href="simpan_mahasiswa.php">Kembali</a>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h2>Detail Mahasiswa</h2>

        <p><strong>NIM:</strong></p>
        <p><strong>Nama:</strong></p>
        <p><strong>Umur:</strong></p>
</body>
</html> -->