<h2>Pertanyaan</h2>

<div class="container">
    <div class="row">
        <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Username</th>
 			<th>Tanggal</th>
			<th>Status Pembelian</th>
 			<th>Total</th>
			<th>Resi</th>
 			<th>Aksi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $ambil=$koneksi->query("SELECT * FROM pertanyaan JOIN users ON pembelian.id_users=users.id_users"); 
		$jumlah_data = mysqli_num_rows($ambil);

		
		?>
        <?php $nomor=+1; ?>
 		<?php while($pecah = $ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>	
 			<td><?php echo $pecah['name']; ?></td>
 			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
 			<td>
 				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">info</a>

				<?php if ($pecah['status_pembelian']!=="Belum Dibayar"): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Update Status</a>
				<?php endif ?>
 			</td>

 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>
    </div>
</div>