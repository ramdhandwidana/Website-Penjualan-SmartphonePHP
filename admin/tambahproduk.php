<?php
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc())
{
	$datakategori[] = $tiap;
}
?>
<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori" id="">
			<option value="">Pilih Kategori</option>
			<?php foreach ($datakategori as $key => $value): ?>
			<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="ckeditor" id="ckeditor" name="deskripsi"></textarea>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php

if (isset($_POST['save'])) 

{
	
  $id_kategori = $_POST['id_kategori'];
  $nama  = $_POST['nama'];

  $deskripsi  = $_POST['deskripsi'];

  $harga  = $_POST['harga'];

  $foto = $_FILES['foto']['name'];

  $lokasi = $_FILES['foto']['tmp_name'];

  $stok  = $_POST['stok'];
  move_uploaded_file($lokasi, "../admin/foto_produk/".$foto);

  $mysqli  = "INSERT INTO produk (id_kategori,nama_produk,harga_produk,foto_produk,dekripsi_produk,stok_produk)
  VALUES ('$id_kategori','$nama', '$harga','$foto', '$deskripsi','$stok')";

  $result  = mysqli_query($koneksi, $mysqli);

  if ($result) {

    echo "<div class='alert alert-info'>Barang Tersimpan</div>";

    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

  } else {

    echo "Input gagal";

  }

  mysqli_close($koneksi);

 }

?>

<script type="text/javascript"src="ckeditor/ckeditor.js"></script>