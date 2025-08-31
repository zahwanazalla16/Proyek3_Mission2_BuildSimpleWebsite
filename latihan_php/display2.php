<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $metode = "POST";
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nama'])) {
        $nama = $_GET['nama'];
        $metode = "GET";
    }
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Hasil Input</title>
</head>
<body>
    <?php if($nama):?>
        <h2> Halo, <?= $nama ?>! (dikirim via <?= $metode ?>) </h2>
    <?php else: ?>
        <P> tidak ada data yang dikrim.</p>
    <?php endif; ?>
</body>
</html>