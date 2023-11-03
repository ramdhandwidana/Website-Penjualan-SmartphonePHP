<?php 

include 'koneksi.php';
?>

<?php
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR dekripsi_produk LIKE '%$keyword%'");
while($pecah = $ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
}

//echo "<pre>";
//print_r ($semuadata);
//echo "<pre>";
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
						<h1>Produk</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <div class="pencarian-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="featured-text">
                    <h3>Hasil Pencarian  : <?php echo $keyword ?></h3>
					
					<?php if  (empty($semuadata)): ?>
						<div class="alert alert-danger">Pencarian <?php echo $keyword ?> tidak ditemukan</div>
					<?php endif ?>

					<div class="row">
				<?php foreach ($semuadata as $key => $value): ?>
				<div class="col-lg-4 col-md-6 text-center">
					<a href="detail.php?id=<?php echo $value["id_produk"]; ?>">
					<div class="single-product-item">
						<div class="product-image">
							<img src="admin/foto_produk/<?php echo $value['foto_produk']; ?>" height="270">
						</div>
						<h3><?php echo $value['nama_produk']; ?></h3>
						<p class="product-price">Rp <?php echo number_format($value['harga_produk']); ?> </p>
						<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Tambah Ke Keranjang</a>
					</div>
					</a>
				</div>
				<?php endforeach ?>
			</div>
			</div>
				</div>
			</div>
		</div>
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