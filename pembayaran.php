<?php session_start();

include 'koneksi.php';


if (!isset($_SESSION["users"]) OR empty($_SESSION["users"]))
{
	echo "<script>alert('silahkan login')</script>";
	echo "<script>location='login.php'</script>";
	exit();
}

$idpemb = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpemb'");
$detpemb = $ambil->fetch_assoc();

$id_users_beli = $detpemb["id_users"];

$id_users_login = $_SESSION["users"]["id_users"];

if ($id_users_login !==$id_users_beli) 
{
    echo "<script>alert('jangan nakal');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>Rayhana Cell</title>

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
						<p>Kirim Bukti Pembayaran Disini</p>
						<h1>Konfirmasi Pembayaran</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<div class="pembayaran-from-section mt-150 mb-150">
		<div class="container">
            <h3>Konfirmasi Pembayaran</h3>
            <div class="alert alert-info">Total Tagihan anda <strong>Rp. <?php echo number_format($detpemb["total_pembelian"]) ?></strong></div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Nama Penyetor">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="bank" placeholder="Bank">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="jumlah" min="1" placeholder="Jumlah">
                </div>
				<text>Upload Bukti Pembayaran</text>
                <div class="form-group">
                    <input type="file" class="form-control" name="bukti">
                    <p class="text-danger">Foto bukti maksimal 2mb</p>
                </div>

				<p><input type="submit" name="kirim"></p>
            </form>
		</div>
        <?php
        if (isset($_POST["kirim"]))
        {
            $namabukti = $_FILES["bukti"]["name"];
            $lokasibukti = $_FILES["bukti"]["tmp_name"];
            $namafix = date("Ymdhis").$namabukti;
            move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

            $nama = $_POST["nama"];
            $bank = $_POST["bank"];   
            $jumlah = $_POST["jumlah"];
            $tanggal = date("Y-m-d");

            $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
            VALUES ('$idpemb','$nama','$bank','$jumlah','$tanggal','$namafix') ");

            //UPDATE PEMBELIAN
            $koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Kirim Pembayaran'
            WHERE id_pembelian='$idpemb'");

            echo "<script>alert('Terima Kasih Sudah Mengirim Pembayaran');</script>";
            echo "<script>location='riwayat.php';</script>";
    
        }
        ?>
	</div>
	
	<!-- end featured section -->
	
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