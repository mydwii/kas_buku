<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">Laporan Hasil Transaksi</h1>
    <h3 align="center"><?= $judul;?></h3>
    <h4 align="center"></h4>
    <table border="1" align="center" class="p-2 "> 
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Transaksi</th>
                <th>Keterangan</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Saldo Akhir</th>
           
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="right" colspan="7">Saldo sebelum tanggal <?= $tanggal1 ?> = Rp. <?=number_format($saldo = $this->transaksi_m->saldo_awal($tanggal1))?></td>
            </tr>
            <?php $no = 1;
            $saldo = $this->transaksi_m->saldo_awal($tanggal1);
            foreach ($filter as $ter) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $ter['tanggal']; ?></td>
                <td><?= $ter['jenis_transaksi']; ?></td>
                <td><?= $ter['keterangan']; ?></td>
                <?php if ($ter['jenis_transaksi'] == 'Pemasukan') : ?>
                    <td align="right">Rp. <?= number_format($ter['nominal']); ?></td>
                    <?php else : ?>
                        <td>-</td>
                    <?php endif; ?>

                    <?php if ($ter['jenis_transaksi'] == 'Pengeluaran') : ?>
                        <td align="right">Rp. <?= number_format($ter['nominal']); ?></td>
                    <?php else : ?>
                        <td>-</td>
                    <?php endif; ?>
                    <?php if ($ter['jenis_transaksi'] == 'Pemasukan') : ?>
                        <td align="right">Rp. <?= number_format($saldo = $saldo + $ter['nominal'] )?></td>
                    <?php else : ?>
                        <td align="right">Rp. <?= number_format($saldo = $saldo - $ter['nominal'] )?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="4" align="center">Jumlah</td>
                    <td align="right">Rp. <?= number_format($tMasuk['pemasukan']); ?></td>
                    <td align="right">Rp. <?= number_format($tKeluar['pengeluaran']); ?></td>
                    <td align="right">Rp. <?= number_format($tMasuk['pemasukan'] - $tKeluar['pengeluaran']); ?></td>
                </tr>
        </tbody>
    </table>
</body>
</html>