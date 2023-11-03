<?php
session_start();

include 'koneksi.php';
?>

<?php
$id_produk =$_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_produk='$_GET[id]'");
$detail = $ambil->fetch_assoc();
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
	<link rel="stylesheet" href="assets/css/main.css <?php echo time(); ?>">
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
						<p>Rayhana Cellular	</p>
						<h1>Detail Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="admin/foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $detail["nama_produk"] ?></h3>
						<p class="single-product-pricing"><span>Harga</span>Rp. <?php echo number_format($detail["harga_produk"]) ?></p>
						<p>Stok : <?php echo $detail['stok_produk'] ?></p>
						<p><?php echo $detail["dekripsi_produk"] ?></p>
						<div class="single-product-form">
							<form method="post">
								<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>" placeholder="0" required>
							
							
							<button class="btn btn-primary" name="beli"><i class="fas fa-shopping-cart"></i> Tambah ke Keranjang</button>
							</form>
						<?php
						if (isset($_POST["beli"]))
						{
							$jumlah = $_POST["jumlah"];
							$_SESSION["cart"]["$id_produk"] = $jumlah;

							echo "<script>alert('masuk keranjang');</script>";
							echo "<script>location='cart.php';</script>";
						}
						?>
						<br>
							<p><strong>Kategori: <?php echo $detail["nama_kategori"] ?></strong></p>
							
						</div>
					</div>
					<br>
					<br>
					<br>
					<p> <strong> Ulasan Produk </strong>
						</p>
				</div>
			</div>
		</div>
	</div>

	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">		
						<h3><span class="orange-text">Rekomendasi</span> Produk</h3>
						<p>Beberapa produk rekomendasi yang terdapat pada toko kita</p>
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
	<!-- end single product -->
	
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