<?php 
session_start();
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN users
ON pembelian.id_users=users.id_users
WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<?php

$idusersyangbeli = $detail["id_users"];

$idusersyanglogin = $_SESSION["users"]["id_users"];
if ($idusersyangbeli!=$idusersyanglogin)
{
	echo "<script>alert('jangan nakal')";
	echo "<script>location='riwayat.php'</script>";
} 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Print Pembayaran</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<div class="print-nota-from-section mt-150 mb-150">
<section class="page-section">
	<div class="container">
		<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		
		<strong>No. Pembelian: <?php echo $detail['id_pembelian']?></strong><br>
		Tanggal: <?php echo $detail['tanggal_pembelian'];?><br>
		Total: Rp. <?php echo number_format($detail['total_pembelian']);?>
		<br>
	</div>

	<div class="col-md-4">
		<h3>Pelanggan</h3>
		
		<strong><?php echo $detail['username'];?></strong><br>
			<?php echo $detail['penerima']; ?><br>
			<?php echo $detail['no_telp']; ?><br>
		<br>
	</div>

	<div class="col-md-4">
		<h3>Pengiriman</h3>
		
		<strong><?php echo $detail["nama_daerah"]; ?></strong><br>
		Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']);?><br>
		Alamat: <?php echo $detail['alamat_pengiriman']; ?>
		<br>
	</div>

	<table class="table table-bordered">
		<thead class="">
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Total Harga</th>

			</tr>
		</thead>

		<tbody>
			<?php
			$nomor=1;
			$ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");
			?>
			<?php while ($pecah=$ambil->fetch_assoc()){?>
			<tr>
 			<td><?php echo $nomor; ?></td>	
 			<td><?php echo $pecah['nama']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
		<tfoot class="">
			<tr>
				<th colspan="4">Ongkos Kirim</th>
				<th>Rp. <?php echo number_format($detail['tarif']);?></th>
			</tr>
			<tr>
				<th colspan="4">Total Belanja</th>
				<th>Rp. <?php echo number_format($detail['total_pembelian']);?></th>
			</tr>
		</tfoot>
	<script>
    window.print();
    </script>
	</table>
		</div>
	</div>
</section>
			</div>
</body>
</html>