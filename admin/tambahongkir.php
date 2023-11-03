<?php
$dataongkir = array();
$ambil = $koneksi->query("SELECT * FROM ongkir");
while ($tiap = $ambil->fetch_assoc())
{
	$dataongkir[] = $tiap;
}
?>
<h2>Tambah Ongkir</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
		<label>Nama Daerah</label>
		<input type="text" class="form-control" name="nama_daerah">
	</div>
    <div class="form-group">
		<label>Harga</label>
		<input type="number" class="form-control" name="tarif">
	</div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) 
{
  $nama_daerah  = $_POST['nama_daerah'];
  $tarif  = $_POST['tarif'];

  $mysqli  = "INSERT INTO ongkir (nama_daerah,tarif)
  VALUES ('$nama_daerah', '$tarif')";

  $result  = mysqli_query($koneksi, $mysqli);

  if ($result) {

    echo "<div class='alert alert-info'>Ongkir Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

  } else {

    echo "Input gagal";

  }

  mysqli_close($koneksi);

 }

?>