<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke DB
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
if (isset($_POST['nim'], $_POST['nama'], $_POST['umur'])) {
    $nim = $conn->real_escape_string($_POST['nim']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $umur = (int)$_POST['umur'];

    // Simpan ke  database
    $sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Gagal menyiapkan statement: " . $conn->error);
    }
    $stmt->bind_param("ssi", $nim, $nama, $umur);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Data mahasiswa berhasil disimpan</p>";
        echo "<a href='form_input_mahasiswa.php'>Input lagi</a>";
        echo "<br>";
        echo "<a href='display_mahasiswa.php'>Kembali</a>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        echo "<a href='form_input_mahasiswa.php'>Kembali</a>";
    }
    $stmt->close();
} else {
    echo "<p style='color:red;'>Data tidak lengkap!</p>";
    echo "<a href='form_input_mahasiswa.php'>Kembali</a>";
}

$conn->close();
?>