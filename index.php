<?php
require 'proses.php';
$sewa = null;
if (isset($_POST['btn'])) {
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $motor = $_POST['motor'];
    $sewa = new Sewa($nama, $hari, $motor);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1>Sewa Motor</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama di sini" required>
        </div>
        <div class="mb-3">
            <label for="motor" class="form-label">Jenis Motor</label>
            <select name="motor" id="motor" class="form-select" required>
                <option value="Vesmet">Vespa Matic</option>
                <option value="Zx 25r">Zx 25r</option>
                <option value="Cafe Racer">Cafe Racer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="hari" class="form-label">Jumlah Hari</label>
            <input type="number" name="hari" id="hari" class="form-control" placeholder="Masukkan jumlah hari" required>
        </div>
        <button type="submit" name="btn" class="btn btn-primary">Bayar</button>
    </form>

    <?php if (isset($sewa)) : ?>
        <div class="mt-4">
            <?php if ($sewa->setMember()) : ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Selamat!</h4>
                    <p>Hai!! <br> <?= htmlspecialchars($sewa->nama); ?> anda memilih motor dan <?= htmlspecialchars($sewa->motor);?> Terima kasih karena telah menjadi member di toko hitam. Anda mendapat potongan sebesar 5%, jadi total yang harus dibayar adalah Rp <?= number_format($sewa->setPajak()); ?>. Terimakasih kak <?= htmlspecialchars($sewa->nama)?></p>
                </div>
            <?php else : ?>
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Info</h4>
                    <p>Hai!! <br> <?= htmlspecialchars($sewa->nama); ?> anda memilih motor <?= htmlspecialchars($sewa->motor); ?> Total yang harus dibayar adalah Rp <?= number_format($sewa->setPajak()); ?>.
                            Terima kasih kak <?= htmlspecialchars($sewa->nama)?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
