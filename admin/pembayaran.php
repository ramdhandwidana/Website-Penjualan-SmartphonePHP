<h2>Data pembayaran</h2>

<?php
$id_pembelian = $_GET['id'];


$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $detail['nama'] ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank'] ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $detail['tanggal'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail['bukti']?>" alt="" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>No. Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi" placeholder="resi">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status" >
            
            <option value="">Pilih Status</option>
            <option value="Lunas">Sudah Mengirim Pembayaran</option>
            <option value="Barang Dikirim">Barang Dikirim</option>
            <option value="Barang Sudah Sampai">Barang Sudah Sampai</option>
            <option value="Batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST["proses"]))
{
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status'
    WHERE id_pembelian='$id_pembelian'");

    echo"<script>alert('data pembelian sudah terupdate');</script>";
    echo"<script>location='index.php?halaman=pembelian';</script>";
}
?>


