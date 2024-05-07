<?php
// Mengambil data dari form
$negara = $_POST['negara'];
$pertandingan = $_POST['pertandingan'];
$menang = $_POST['menang'];
$seri = $_POST['seri'];
$kalah = $_POST['kalah'];
$poin = $_POST['poin'];
$operator = $_POST['operator'];
$nim = $_POST['nim'];

// Menentukan waktu saat ini
$waktuSekarang = date('d M Y H:i:s');

// File untuk menyimpan data
$file = 'data.txt';

// Membuka file dalam mode append
$handle = fopen($file, 'a');

// Menulis data ke file
$data = "$negara $pertandingan $menang $seri $kalah $poin\n";
fwrite($handle, $data);

// Tutup file
fclose($handle);

// Redirect kembali ke halaman input setelah data diinput
header('Location: index.html');
?>