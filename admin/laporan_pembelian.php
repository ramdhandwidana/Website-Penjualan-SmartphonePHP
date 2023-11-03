<?php
$semuadata=array(); 
$tgl_mulai="-";
$tgl_selesai="-";
$status ="";
if (isset($_POST["kirim"]))
{
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST['tgls'];
    $status = $_POST["status"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN users pl ON
    pm.id_users=pl.id_users WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
}

?>
<h2>Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h2>
<hr>

<form method="post">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal mulai</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
            </div>
        </div>
        <div class="col-md-3">
            <label>Status</label><br>
            <select classs="form-control" name="status" id="">
                <option value="">Pilih Status</option>
                <option value="Belum Dibayar" <?php echo $status=="Belum Dibayar"?"selected":""; ?> >Belum Dibayar</option>
                <option value="Sudah Mengirim Pembayaran" <?php echo $status=="Sudah Mengirim Pembayaran"?"selected":""; ?>>Sudah Mengirim Pembayaran</option>
                <option value="Barang Dikirim" <?php echo $status=="Barang Dikirim"?"selected":""; ?>>Barang Dikirim</option>
                <option value="Barang Sudah Sampai" <?php echo $status=="Barang Sudah Sampai"?"selected":""; ?>>Barang Sudah Sampai</option>
                <option value="Batal" <?php echo $status=="Batal"?"selected":""; ?>>Batal</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label>
            <br>
            <button class="btn btn-primary" name="kirim">Lihat</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Users</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php foreach ($semuadata as $key => $value): ?>
        <?php $total+=$value['total_pembelian'] ?>
        <tr>
            <th><?php echo $key+1; ?></th>
            <th><?php echo $value["name"] ?></th>
            <th><?php echo date("d F Y",strtotime($value["tanggal_pembelian"])) ?></th>
            <th>Rp. <?php echo number_format($value["total_pembelian"]) ?></th>
            <th><?php echo $value["status_pembelian"] ?></th>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp. <?php echo number_format($total) ?></th>
            <th></th>
        </tr>
    </tfoot>
</table>

    <a href="downloadlaporan.php?tglm=<?php echo $tgl_mulai ?>&tgls=<?php echo $tgl_selesai ?>&status=<?php echo $status ?>
        "target="_blank" class="btn btn-info ">Cetak Laporan</a>
