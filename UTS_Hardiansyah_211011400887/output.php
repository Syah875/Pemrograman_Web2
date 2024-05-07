<!DOCTYPE html>
<html>
<head>
    <title>Data Group B Piala Asia U-23</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Group B Piala Asia Qatar U-23</h1>
    <p>Per <?php echo date('d M Y H:i:s'); ?> </p>
    <p>Nama Operator/NIM:Hardiansyah/211011400887</p>

    <table>
        <tr>
            <th>Negara</th>
            <th>P</th>
            <th>M</th>
            <th>S</th>
            <th>K</th>
            <th>Poin</th>
        </tr>
        <?php
        // Membuka file untuk membaca
        $file = 'data.txt';
        $handle = fopen($file, 'r');

        // Membaca data dari file dan menampilkannya sebagai baris tabel
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                // Menghapus karakter baris baru dan memisahkan data menggunakan spasi
                $line = trim($line);
                $data = explode(' ', $line);

                // Menampilkan data dalam tabel
                echo "<tr>";
                foreach ($data as $item) {
                    echo "<td>$item</td>";
                }
                echo "</tr>";
            }
            // Menutup file setelah membaca data
            fclose($handle);
        }
        ?>
    </table>
    <!-- tombol balik ke halaman index -->
    <br /><br />
      <button onclick="window.location.href='index.html'">
        back
      </button>
</body>
</html>
