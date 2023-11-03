<?php
session_start();

include 'koneksi.php';

$tampilkategori = mysqli_query($koneksi, "SELECT * FROM kategori");

if (isset($_GET['id'])) {
	$gettampilkategori = $koneksi->query("SELECT id_kategori FROM kategori WHERE nama_kategori='$_GET[id]' ");
	$kategoriid = mysqli_fetch_array($gettampilkategori);

	$tampilproduk = $koneksi->query("SELECT * FROM produk WHERE id_kategori='$kategoriid[id_kategori]'");
}
else
{
	$tampilproduk = $koneksi->query("SELECT * FROM produk");

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
						<h1>Produk</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
							<?php while($kategori = mysqli_fetch_array($tampilkategori)) { ?>
							<a href="produk.php?id=<?php echo $kategori['nama_kategori'] ?>">
                            <li data-filter=".tes"><?php echo $kategori['nama_kategori'] ?></li>
							</a>
							<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
				<?php while($perproduk =mysqli_fetch_array($tampilproduk)){ ?>
				<div class="col-lg-4 col-md-6 text-center tes">
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
	<!-- end products -->
<?php include 'footer.php'; ?>
	
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

</body>
</html>