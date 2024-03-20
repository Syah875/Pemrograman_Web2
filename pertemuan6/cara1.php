<?php
// Cara 1: Mendefinisikan Data dalam Array Secara Langsung
$alas = array(5, 8, 6, 10, 7);
$tinggi = array(7, 12, 9, 15, 8);
$jumlah_data = count($alas);

$hasil = array();
for ($i = 0; $i < $jumlah_data; $i++) {
    $luas = 0.5 * $alas[$i] * $tinggi[$i];
    $hasil[] = $luas;
}

for ($i = 0; $i < $jumlah_data; $i++) {
    echo "Luas segitiga ke-" . ($i + 1) . ": " . $hasil[$i] . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Segitiga</title>
</head>
<body>
    <h2>Hitung Luas Segitiga</h2>
    <form method="post" action="">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <label for="alas<?= $i ?>">Alas Segitiga <?= $i + 1 ?>:</label>
            <input type="text" name="alas[]" id="alas<?= $i ?>"><br>
            <label for="tinggi<?= $i ?>">Tinggi Segitiga <?= $i + 1 ?>:</label>
            <input type="text" name="tinggi[]" id="tinggi<?= $i ?>"><br><br>
        <?php endfor; ?>
        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $alas = $_POST['alas'];
        $tinggi = $_POST['tinggi'];
        $jumlah_data = count($alas);
        $hasil = array();

        for ($i = 0; $i < $jumlah_data; $i++) {
            $luas = 0.5 * $alas[$i] * $tinggi[$i];
            $hasil[] = $luas;
        }

        for ($i = 0; $i < $jumlah_data; $i++) {
            echo "Luas segitiga ke-" . ($i + 1) . ": " . $hasil[$i] . "<br>";
        }
    }
    ?>
</body>
</html>