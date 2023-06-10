<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
            height: 20px;
            margin: 8px;
            padding: 5px;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;">Daftar Buku</h1>
    <table>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 10%;">Kode</th>
            <th style="width: 25%;">Judul</th>
            <th style="width: 20%;">Pengarang</th>
            <th style="width: 20%;">Penerbit</th>
            <th style="width: 10%;">Tahun Terbit</th>
        </tr>
        <?php
        $no = 0;
        foreach ($dtbuku->getResultArray() as $items) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $items['Kode_Buku'] ?></td>
                <td><?= $items['Judul'] ?></td>
                <td><?= $items['Nama_Pengarang'] ?></td>
                <td><?= $items['Nama_Penerbit'] ?></td>
                <td><?= $items['Tahun_Terbit'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>