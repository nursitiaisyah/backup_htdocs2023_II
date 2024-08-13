<table border=1>
    <?php
    foreach ($member as $nama) {
    ?>
        <tr>
            <th>Nama Pelanggan :<?= $member->nama; ?></th>
        </tr>
        <tr>
            <th>Keterangan Transaksi:</th>
        </tr>
    <?php } ?>
    <tr>
        <td>
            <div class="table-responsive">
                <table border=1>
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Batas Waktu</th>
                        <th>Jenis Paket</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($transaksi as $row) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['kd_invoice']; ?></td>
                            <td><?= $row['tgl']; ?></td>
                            <td><?= $row['batas_Waktu']; ?></td>
                            <td><?= $row['nama_paket']; ?></td>
                            <td><?= $row['tgl']; ?></td>
                            <td><?= 'Rp.' . Number_format($row['total_bayar']) ?></td>

                        </tr>
                    <?php $no++;
                    } ?>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <hr>
        </td>
    </tr>
    <tr>
        <td align="center">
            <?= md5(date('d M Y H:i:s')); ?>
        </td>
    </tr>
</table>
<script>
    const base_url = '<?php echo base_url() ?>'
</script>