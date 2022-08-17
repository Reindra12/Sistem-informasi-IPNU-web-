<html>

<head>
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        table td {
            word-wrap: break-word;
            width: 15%;
        }
    </style>
</head>

<body>
    <b><?php echo $ket; ?></b><br /><br />

    <table border="1" cellpadding="4">
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pemohon</th>
            <th scope="col">Pengajuan</th>
            <th scope="col">Diterima</th>
            <th scope="col">Bunga</th>
            <th scope="col">Total</th>
            <th scope="col">Jangka Waktu</th>
        </tr>
        <?php
        if (!empty($transaksi)) {
            $no = 1;
            foreach ($transaksi as  $data) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= indo_date($data->tanggal) ?></td>
                    <td><?= $data->nama_nasabah ?></td>
                    <td>Rp. <?= number_format($data->jumlah_pengajuan, 0, ',', '.')  ?></td>
                    <td>Rp. <?= number_format($data->diterima, 0, ',', '.')  ?></td>
                    <td><?= $data->bunga ?>%</td>
                    <td>Rp. <?= number_format($data->total, 0, ',', '.')  ?></td>
                    <td><?= $data->jangka_waktu ?> Bulan</td>
                </tr>

        <?php
                $no++;
            }
        } ?>
    </table>
</body>

</html