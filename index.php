<?php 
session_start();

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" 
	content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>Rayhana Cellular</title>

	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>">
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="">
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

	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>
<?php include 'navbar.php'; ?>
	


	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Rayhana Cell</p>
								<h1>Menjual Berbagai Macam Aksesoris Handphone</h1>
								<div class="hero-btns">
									<a href="produk.php" class="boxed-btn">Koleksi Handphone</a>
									<a href="contact.php" class="bordered-btn">Kontak Kita</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Rayhana Cell</p>
								<h1>100% Original</h1>
								<div class="hero-btns">
									<a href="produk.php" class="boxed-btn">Kunjungi Toko</a>
									<a href="contact.php" class="bordered-btn">Kontak Kita</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Rayhana Cell</p>
								<h1>Harga Lebih Murah</h1>
								<div class="hero-btns">
									<a href="produk.php" class="boxed-btn">Kunjungi Toko</a>
									<a href="contact.php" class="bordered-btn">Kontak Kita</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Pengiriman</h3>
							<p>Bisa Pengiriman Ke luar Jawa</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>Hubungi</h3>
							<p>Respon cepat selama jam kerja</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Produk</h3>
							<p>Produk terdapat garansi</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">		
						<h3><span class="orange-text">Produk</span> Kita</h3>
						<p>Beberapa produk unggulan yang terdapat pada toko kita</p>
					</div>
				</div>
			</div>


			<div class="row">
				<?php
				$jumlahdataperhalaman = 3;
				//$jumlahdata = count(query("SELECT * FROM produk"));
				//$jumlahahalaman = ceil		($jumlahdata/$jumlahdataperhalaman);
				//$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
				?>
				<?php $ambil = $koneksi->query("SELECT * FROM produk LIMIT 8, $jumlahdataperhalaman"); ?>
				<?php while($perproduk = $ambil->fetch_assoc()){ ?>
				<div class="col-lg-4 col-md-6 text-center">
					<a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>">
					<div class="single-product-item">
						<div class="product-image">
							<img src="admin/foto_produk/<?php echo $perproduk['foto_produk']; ?>" height="270">
						</div>
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<p class="product-price">Rp <?php echo number_format($perproduk['harga_produk']); ?> </p>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Tambah Ke Keranjang</a>
					</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- end product section -->

	
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