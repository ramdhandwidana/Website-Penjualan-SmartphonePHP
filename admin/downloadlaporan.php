<?php
include '../koneksi.php';
$tgl_mulai = $_GET["tglm"];
$tgl_selesai = $_GET["tgls"];
$status = $_GET["status"];


$semuadata = array();
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN users pl ON
    pm.id_users=pl.id_users WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
?>

<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<table class="table table-bordered border=2px">
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

<script>
    window.print();
    </script>