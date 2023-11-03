<h2> Data Pembelian </h2>

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
		<?php
			$ambildata = $koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_users=users.id_users");
		?>
 		<?php $nomor=+1; ?>

		
 		<?php while($pecah = $ambildata->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>	
 			<td><?php echo $pecah['name']; ?></td>
 			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian']; ?></td>
 			<td><?php echo number_format($pecah['total_pembelian']); ?></td>
			<td><?php echo $pecah['resi_pengiriman']; ?></td>
 			<td>
 				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">info</a>

				

				<?php if ($pecah['status_pembelian']!=="Sudah Kirim Pembayaran"): ?>
				<a href="index.php?halaman=batal&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-danger">Dibatalkan</a>

				<?php elseif ($pecah['status_pembelian']!=="Belum Dibayar"): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Update Status</a>


				<?php endif ?>
				
 			</td>


 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>

