<?php 
session_start();

include 'koneksi.php';

if (!isset($_SESSION["users"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Check Out</title>

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
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse"
											data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Detail Pembelian
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
									data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form">
											<form method="post">
												<p><input type="text" name="penerima" placeholder="Penerima" required></p>
												<p><input type="email" placeholder="Email" readonly value="<?php echo $_SESSION["users"]["email"] ?>"></p>
												<p><input type="text" name="alamat_pengiriman" placeholder="Alamat" required></p>
												<p><input type="text" name="no_telp" placeholder="No. Telepon" required></p>
												<p><textarea name="bill" id="bill" cols="30" rows="10"
													placeholder="Keterangan"></textarea></p>
												<select class="form-control" name="id_ongkir" required>
												<option selected disabled>Pilih Ongkir</option>
												<?php
												$ambil = $koneksi->query("SELECT * FROM ongkir");
												while($perongkir = $ambil->fetch_assoc()){
												?>
												<option value="<?php echo $perongkir["id_ongkir"] ?>">
													<?php echo $perongkir['nama_daerah'] ?> -
													Rp. <?php echo number_format($perongkir['tarif']) ?>
												</option>
												<?php }?>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th colspan="2">Your order Details</th>
									
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Product</td>
									<td>Kuantitas</td>
									<td>Total</td>
								</tr>
								<?php $totalbelanja = 0; ?>
									<?php foreach ($_SESSION["cart"] as $id_produk => $jumlah): ?>
									<?php
										$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
										$pecah = $ambil->fetch_assoc();
										$subharga = (int)$pecah['harga_produk']*(int)$jumlah;
										
								?>
								<tr>
									<td><?php echo $pecah["nama_produk"]; ?></td>
									<td><?php echo $jumlah; ?></td>
									<td><?php echo number_format($subharga); ?></td>
								</tr>
							</tbody>
							<tbody class="checkout-details">
								<?php $totalbelanja+=$subharga; ?>
								<?php endforeach ?>
								<tr>
									<td colspan="2">Total</td>
									<td><?php echo number_format($totalbelanja) ?></td>
								</tr>
							</tbody>
						</table>
						<br>
						
							<p><input type="submit" name="checkout" placeholder="Order"></p>
						</form>
						
						<?php
								if (isset($_POST["checkout"]))
								{
									if(isset($_POST['id_ongkir']) == ''){
										echo "<script> alert('pilih ongkir !')</script>";
										return false;
									}
									$id_users = $_SESSION["users"]["id_users"];
									$id_ongkir = $_POST["id_ongkir"];
									$penerima = $_POST['penerima'];
									$no_telp = $_POST['no_telp'];
									$tanggal_pembelian = date("Y-m-d");
									$alamat_pengiriman = $_POST['alamat_pengiriman'];

									 $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
									 $arrayongkir = $ambil->fetch_assoc();
									 $nama_daerah = $arrayongkir['nama_daerah'];
									 $tarif = $arrayongkir['tarif'];

									 $total_pembelian = $totalbelanja  + $tarif;

									 $koneksi->query("INSERT INTO pembelian (id_users,id_ongkir,penerima,no_telp,tanggal_pembelian,total_pembelian, nama_daerah,tarif,alamat_pengiriman)
									 VALUES ('$id_users','$id_ongkir','$penerima','$no_telp','$tanggal_pembelian','$total_pembelian','$nama_daerah','$tarif','$alamat_pengiriman') ");

									//mendapatkan id pembelian barusan
									 $id_pembelian_barusan = $koneksi->insert_id;
									
									//mendapatkan data produk berdasarkan id_produk
									 foreach ($_SESSION["cart"] as $id_produk => $jumlah)
									 {
										 $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
										 $perproduk = $ambil->fetch_assoc();

										 $nama = $perproduk['nama_produk'];
										 $harga = $perproduk['harga_produk'];

										 $subharga = $perproduk['harga_produk']*$jumlah; 
										 $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,subharga,jumlah)
										 VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$subharga','$jumlah') ");

										 //skrip update produk
										 $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
										 WHERE id_produk='$id_produk'");
									 }

									 unset($_SESSION["cart"]);

									 echo "<script>alert('pembelian sukses');</script>";
									 echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
								}
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->


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