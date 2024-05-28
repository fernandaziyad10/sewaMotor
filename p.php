<?php
require 'a.php';
$rental = null;
if(isset($_POST['btn'])){
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $rental = new Sewa($nama, $hari);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>

<div class="kepala">
    <form action="" method="post">
        <input type="text" name="nama" placeholder="Masukan nama disini" required>
        <input type="number" name="hari" placeholder="Masukan hari" required>
        <input type="submit" name="btn" value="Lihat">
    </form>
</div>

<?php if(isset($rental)) : ?>
    <div class="result-container">
        <?php if($rental->isMember()) : ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Selamat!</h4>
                <p>Hai <?= htmlspecialchars($nama); ?>, Terimakasih Telah Menjadi Member di AzmiRentalMotor. Karena Anda member, Anda mendapatkan diskon sebesar 5%. Jadi total yang harus Anda bayar adalah Rp <?= number_format($rental->setPajak()); ?>.</p>
            </div>
        <?php else : ?>
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Info</h4>
                <p>WELCOME!!!<?= htmlspecialchars($nama); ?>, Total yang harus dibayar adalah Rp <?= number_format($rental->setPajak()); ?>.</p>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

</body>
</html>
