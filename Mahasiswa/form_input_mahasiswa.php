<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Form Input Mahasiswa</h3>
  <form action="/latihanphp/Mahasiswa/simpan_mahasiswa.php" method="post">
    <label>NIM: <input type="text" name="nim" required></label><br><br>
    <label>Nama: <input type="text" name="nama" required></label><br><br>
    <label>Umur: <input type="number" name="umur" required></label><br><br>
    <button type="submit">Simpan</button>
  </form>
</body>
</html>