<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q !== '') {
    $esc = $conn->real_escape_string($q);
    $sql = "SELECT nim, nama, umur FROM mahasiswa WHERE nama LIKE '%$esc%' ORDER BY nim ASC";
} else {
    $sql = "SELECT nim, nama, umur FROM mahasiswa ORDER BY nim ASC";
}

$result = $conn->query($sql);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <!-- Form Pencarian -->
    <form method="get" action="display_mahasiswa.php" style="margin: 10px 0;">
        <input type="text" name="q" value="<?= htmlspecialchars($q); ?>" placeholder="Cari Nama...">
        <button type="submit">Cari</button>
        
    </form>
    
    <?php if ($result->num_rows > 0): ?> 
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
                <th>Delete</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nim']); ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['umur']); ?></td>
                    <td>
                        <a href="detail_mahasiswa.php?nim=<?= urlencode($row['nim']); ?>">View Detail</a> 
                        <!-- <a href="index.php?action=edit&nim=<?= urlencode($row['nim']); ?>" class="btn btn-warning">Edit</a> | -->
                    </td>
                    <td>
                        <a href="delete_mahasiswa.php?nim=<?= urlencode($row['nim']); ?>" 
                        onclick="return confirm('Hapus NIM <?= htmlspecialchars($row['nim']) ?>?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Tidak ada data mahasiswa.</p>
    <?php endif; ?>
</body>
</html>