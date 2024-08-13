<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>

    <table>
        <tr>
            <th>NO</th>
            <th>Nama Member</th>
            <th>Invoice</th>
            <th>User</th>
            <th>Tanggal</th>
            <th>Batas Waktu</th>
            <th>Total</th>
        </tr>

        <?php
        $no = 1;
        foreach ($transaksi as $row) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['kd_invoice'] ?></td>
                <td><?php echo $row['nama_user'] ?></td>
                <td><?php echo $row['tgl'] ?></td>
                <td><?php echo $row['batas_waktu'] ?></td>
                <td><?php echo 'Rp.' . Number_format($row['total_bayar']) ?></td>

            </tr>

        <?php endforeach; ?>

    </table>
    <script type="text/javascript">
        Window.print();
    </script>

</body>

</html>