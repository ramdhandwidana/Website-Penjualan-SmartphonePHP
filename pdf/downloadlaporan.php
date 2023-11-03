<?php
include '../koneksi.php';
// Require composer autoload
require_once('../pdf/vendor/autoload.php');
// Create an instance of the class:
$mpdf = new mpdf/mpdf();



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

    $isi.= "<table class='table table-bordered' border='2px'>";
    $isi.= "<thead>";
        $isi.= "<tr>
            <th>No</th>
            <th>Users</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>";
    $isi.= "</thead>";
    $isi.= "<tbody>";
    $total=0;
    foreach ($semuadata as $key => $value):
        $total+=$value['total_pembelian'];
        $nomor = $key+1;
        $isi.= "<tr>";
            $isi.= "<th>".$nomor."</th>";
            $isi.= "<th>".$value["name"]."</th>";
            $isi.= "<th>".date("d F Y",strtotime($value["tanggal_pembelian"]))."</th>";
            $isi.= "<th>Rp. ".number_format($value["total_pembelian"]).",00</th>";
            $isi.= "<th>".$value["status_pembelian"]."</th>";
        $isi.= "</tr>";
    endforeach;
    $isi.= "</tbody>";
    $isi.= "<tfoot>";
        $isi.= "<tr>";
            $isi.= "<th colspan='3'>Total</th>";
            $isi.= "<th>Rp. ".number_format($total).",00</th>";
            $isi.= "<th></th>";
       $isi.= "</tr>";
    $isi.= "</tfoot>";
$isi.= "</table>";


// Write some HTML code:
$mpdf->WriteHTML('$isi');

// Output a PDF file directly to the browser
$mpdf->Output("laporan.pdf"."D");

