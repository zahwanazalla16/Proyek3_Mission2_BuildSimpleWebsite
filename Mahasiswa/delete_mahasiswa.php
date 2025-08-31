<?php
$conn = new mysqli("localhost", "root", "", "akademik_db");
if ($conn->connect_error) die("Gagal connect: ".$conn->connect_error);

$nim = isset($_GET['nim']) ? trim($_GET['nim']) : '';
if ($nim === '') {
    header("Location: display_mahasiswa.php");
    exit;
}

$nim_esc = $conn->real_escape_string($nim);
$conn->query("DELETE FROM mahasiswa WHERE nim='$nim_esc' LIMIT 1");

$conn->close();
header("Location: display_mahasiswa.php");
exit;