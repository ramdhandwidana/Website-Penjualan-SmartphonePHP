<h2>Ubah Ongkir</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
		<label>Nama Daerah</label>
		<input type="text" class="form-control" name="daerah" value="<?php echo $pecah['nama_daerah']; ?>">
	</div>
	<div class="form-group">
		<label>Tarif</label>
		<input type="number" class="form-control" name="tarif" value="<?php echo $pecah['tarif']; ?>">
	</div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
		$koneksi->query("UPDATE ongkir SET nama_daerah='$_POST[daerah]',tarif='$_POST[tarif]'

		WHERE id_ongkir='$_GET[id]'");

        echo "<script>alert('ongkir telah diubah');</script>";
	    echo "<script>location='index.php?halaman=ongkir';</script>";
}
?>