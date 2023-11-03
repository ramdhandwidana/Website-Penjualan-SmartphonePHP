<h3>Ongkos Kirim</h3>
<hr>

<?php
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM ongkir ");
while ($tiap = $ambil->fetch_assoc())
{
    $semuadata[] = $tiap;
}
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <td>Nama Daerah</td>
            <td>Tarif</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($semuadata as $key => $value): ?>
        <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $value["nama_daerah"] ?></td>
            <td><?php echo number_format($value["tarif"]) ?></td>
            <td>
                <a href="index.php?halaman=ubahongkir&id=<?php echo $value['id_ongkir']; ?>" class="btn btn-danger btn-sm">Ubah</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahongkir" class="btn btn-default">Tambah Data</a>