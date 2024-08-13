<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title>LAPORAN</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<style>
		.line-title {
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}
	</style>
</head>

<body>
	<img src="assets/img/.jpg" style="position: absolute; width: 60px; height: auto;">
	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="line-height: 1.6; font-weight: bold;">
					LAPORAN PENJUALAN

				</span>
			</td>
		</tr>
	</table>
	<hr class="line-title">

	<table class="table table-bordered">
		<tr>
			<th>#</th>
			<th>Kode Invoice</th>
			<th>Nama</th>
			<th>Paket</th>
			<th>User</th>
			<th>Harga</th>
		</tr>
		<?php $no = 1; foreach ($data as $row) : ?>
			<tr>
				<td><?php echo $index++ ?></td>
				<td><?php echo $row['tgl'] ?></td>
				<td><?php echo $row['nama_outlet'] ?></td>
				<td><?php echo $row['nama_paket'] ?></td>
				<td><?php echo 'Rp.' . Number_format($row['harga']) ?></td>
				<td><?php echo $row['terjual'] ?></td>
				<td><?php echo 'Rp.' . Number_format($row['pendapatan']) ?></td>
			</tr>
		<?php endforeach ?>
	</table>

</body>

</html>