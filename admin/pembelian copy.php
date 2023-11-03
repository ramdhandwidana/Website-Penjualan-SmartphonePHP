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
			$jumlahdata = 8;
			$totaldata = mysqli_num_rows($ambildata);

			if (isset($_GET['hal'])) {
				$halaktif = $_GET['halaman'];
			}
			else {
				$halaktif = 1;
			}

			$dataawal = ($halaktif * $jumlahdata) - $jumlahdata;
		?>
 		<?php $nomor=+1; ?>
 		<?php $ambildata_perhalaman = $koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_users=users.id_users LIMIT $dataawal,$jumlahdata"); 

		?>
 		<?php while($pecah = $ambildata_perhalaman->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>	
 			<td><?php echo $pecah['name']; ?></td>
 			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian']; ?></td>
 			<td><?php echo number_format($pecah['total_pembelian']); ?></td>
			<td><?php echo $pecah['resi_pengiriman']; ?></td>
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

