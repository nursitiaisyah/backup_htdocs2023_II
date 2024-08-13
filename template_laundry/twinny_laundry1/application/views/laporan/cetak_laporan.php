<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<style type="text/css">
		.table-data {
			width: 100%;
			border-collapse: collapse;
		}

		.table-data tr th,
		.table-data tr td {
			border: 1px solid black;
			font-size: 11pt;
			padding: 10px 10px 10px 10px;
		}
	</style>
	<h3>
		<center>Laporan Penjualan Twinny Laundry</center>
	</h3>
	<br>
	
	<table class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Outlet</th>
				<th>Nama Paket</th>
				<th>Harga</th>
				<th>Terjual</th>
				<th>Pendapatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($laporan as $row) {
			?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $row['tgl']; ?></td>
					<td><?= $row['nama_outlet']; ?></td>
					<td><?= $row['nama_paket']; ?></td>
					<td><?= 'Rp.' . Number_format($row['harga']); ?></td>
					<td><?= $row['terjual']; ?></td>
					<td><?= 'Rp.' . Number_format($row['pendapatan']); ?></td>

				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>

</html>