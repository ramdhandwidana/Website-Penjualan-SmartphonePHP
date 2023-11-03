<?php 
session_start();

include 'koneksi.php';

if (empty($_SESSION["cart"]) OR !isset($_SESSION["cart"]))
{
	echo "<script>alert('silahkan belanja');</script>";
	echo "<script>location='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Rayhana Cellular</title>

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
						<p>Rayhana Cellular</p>
						<h1>Keranjang</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th></th>
									<th class="product-image">Gambar Produk</th>
									<th class="product-name">Nama</th>
									<th class="product-price">Harga</th>
									<th class="product-quantity">Kuantitas</th>
									<th class="product-subtotal">SubTotal</th>

								</tr>
							</thead>
							<tbody>
								<?php $totalbelanja = 0; ?>
								<?php foreach ($_SESSION["cart"] as $id_produk => $jumlah): ?>
								<?php 
								$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
								$pecah = $ambil->fetch_assoc();
								$subharga = (int)$pecah["harga_produk"] * (int)$jumlah;

								?>
								<tr class="table-body-row">
									<td><a href="hapusproduk.php?id=<?php echo $id_produk ?>"><i class="far fa-window-close"></i></a></td>
									<td> <img src="admin/foto_produk/<?php echo $pecah["foto_produk"]; ?>" width="40"></td>
									<td> <?php echo $pecah["nama_produk"]; ?></td>
									<td> <?php echo number_format($pecah["harga_produk"]); ?></td>
									<td> <?php echo $jumlah; ?></td>
									<td>Rp. <?php echo number_format($subharga); ?></td>
								</tr>
								<?php $totalbelanja+=$subharga; ?>
								<?php endforeach ?>
							</tbody>
						</table>
						
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total Belanja</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>

							

								
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>Rp. <?php echo number_format($totalbelanja); ?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="produk.php" class="boxed-btn">Lanjut Belanja</a>
							<a href="checkout.php" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					

					

				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
	

	
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