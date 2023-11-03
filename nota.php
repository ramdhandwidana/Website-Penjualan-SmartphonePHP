<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Nota Pembayaran</title>

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
<?php include 'navbar.php'; ?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Rayhana Cell</p>
						<h1>Nota</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <!--nota-->
	<div class="nota-from-section mt-150 mb-150">
		<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="featured-text">

                    <h3>Detail Pembelian</h3>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN users
ON pembelian.id_users=users.id_users
WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();

$idusersyangbeli = $detail["id_users"];

$idusersyanglogin = $_SESSION["users"]["id_users"];
if ($idusersyangbeli!=$idusersyanglogin)
{
	echo "<script>alert('jangan nakal')";
	echo "<script>location='riwayat.php'</script>";
} 
?>

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
        Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
        Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
    </div>
    <div class="col-md-4">
        <h3> Pelanggan </h3>
    <strong><?php echo $detail['username']; ?></strong><br>

        <?php echo $detail['penerima']; ?><br>
		<?php echo $detail['no_telp']; ?><br>
	</p>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?php echo $detail['nama_daerah'] ?></strong><br>
        Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']);  ?><br>  
        Alamat : <?php echo $detail['alamat_pengiriman'] ?>
    </div>
	

</div>

<div class="container">
	<a href="riwayat.php?id=<?php echo $detail['id_pembelian']; ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
	<a href="print_nota.php?id=<?php echo $detail['id_pembelian']; ?>
	"target="_blank" class="btn btn-info "><i class="fas fa-print"></i> Print Invoice</a>
	</div>
	<br>

<table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
 		<?php while($pecah = $ambil->fetch_assoc()){ ?>
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
 </table>

        <div class="row">
             <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
                        <strong>BANK MANDIRI 070 00 0828876 9 AN. NURLAILA</strong><br>
						<strong>BANK BCA 6670 1544 87 AN. NURLAILA</strong><br>
						<strong>BANK BRI 034 110 001 744 302 AN. NURLAILA</strong>
                    </p>
                </div>
            </div>
        </div>
						
					</div>
				</div>
			</div>
		</section>
		</div>
		</div>

	
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

<?php include 'footer.php'; ?>
</body>
</html>