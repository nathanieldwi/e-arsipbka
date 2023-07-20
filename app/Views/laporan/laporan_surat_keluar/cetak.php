<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= $pages ?>
    </title>
</head>

<body>
    <div>
        <h1 style="text-align: center;">Laporan Surat Keluar</h1>
        <table border="1" style="width:100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Judul Surat Keluar</th>
                    <th>Jenis Surat</th>
                    <th>Tujuan</th>
                    <th>Tanggal Keluar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($result as $res) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $res->no_surat ?></td>
                        <td><?= $res->judul_surat ?></td>
                        <td><?= $res->nama_jenis ?></td>
                        <td><?= $res->tujuan ?></td>
                        <td><?= Carbon\Carbon::parse($res->tgl_keluar)->toFormattedDateString() ?></td>
                        <td><?= $res->keterangan ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>