<?php
require 'koneksi.php';
require 'cek.php';

$idkel = $_GET['idkel'];
if (isset($_POST['tambahdata'])) {
    $idb = $_POST['idb'];
    $jan = $_POST['jan'];
    $feb = $_POST['feb'];
    $mar = $_POST['mar'];
    $apr = $_POST['apr'];
    $mei = $_POST['mei'];
    $jun = $_POST['jun'];
    $jul = $_POST['jul'];
    $aug = $_POST['aug'];
    $sep = $_POST['sep'];
    $okt = $_POST['okt'];
    $nov = $_POST['nov'];
    $des = $_POST['des'];

    $update = mysqli_query($conn, "UPDATE bayar SET jan='$jan', feb='$feb', mar='$mar', apr='$apr', mei='$mei', jun='$jun',
                                    jul='$jul', aug='$aug', sep='$sep', okt='$okt', nov='$nov', des='$des' WHERE idb='$idb'");

    if ($update) {
        echo "<script>alert('Data Berhasil Diubah !')</script>";
        echo "<script type='text/javascript'>window.location='index.php?call=dist/detailbayar.php&idkel=$idkel'</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah !')</script>";
        echo "<script type='text/javascript'>window.location='index.php?call=dist/detailbayar.php&idkel=$idkel'</script>";
    }
}

if (isset($_POST['hapusbarang'])) {
    $idpem = $_POST['idpem'];


    $hapus = mysqli_query($conn, "delete from pemenangkel where idpem='$idpem'");
}
if (isset($_POST['cancel'])) {
    $idpem = $_POST['idpem'];
    $cancel = $_POST['cancel'];

    $update = mysqli_query($conn, "update pemenangkel set cancelp='1' where idpem='$idpem'");
}

?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Barang</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php
    
    $ambilsemuadatabarang = mysqli_query($conn, "select * from kelompok
										where idkel='$idkel' ");
    $i = 1;
    while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {

        $idkel = $data['idkel'];
        $ketuakel = $data['ketuakel'];



    ?>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3><?= $idkel; ?> - <?= $ketuakel; ?></h3></br> <?php } ?>


                </div>
                <?php
                
                $ambilsemuadatabarang = mysqli_query($conn, "select * from bayar b, kelompok k
										 where k.idkel='$idkel' and k.idkel=b.idkel ");
                $i = 1;
                while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {

                    $periode = $data['periode'];
                    $bulanr = $data['bulanr'];
                    $idkel = $data['idkel'];
                    $idb = $data['idb'];
                    $jan = $data['jan'];
                    $feb = $data['feb'];
                    $mar = $data['mar'];
                    $apr = $data['apr'];
                    $mei = $data['mei'];
                    $jun = $data['jun'];
                    $jul = $data['jul'];
                    $aug = $data['aug'];
                    $sep = $data['sep'];
                    $okt = $data['okt'];
                    $nov = $data['nov'];
                    $des = $data['des'];


                ?>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <?php
                                if ($bulanr == "Januari") {
                                    if ($periode == 5) {
                                ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                        </div>
                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Februari") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Maret") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "April") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                        </div>
                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Mei") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Juni") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Juli") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="basicInput">juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                        </div>
                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Agustus") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "September") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Oktober") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                        </div>
                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Oktober</label>
                                                <input type="text" class="form-control" id="basicInput" name="okt" value="<?= $okt ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "November") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">November</label>
                                                <input type="text" class="form-control" id="basicInput" name="nov" value="<?= $nov ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } elseif ($bulanr == "Desember") {
                                    if ($periode == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                        </div>


                                    <?php
                                    } elseif ($periode == 10) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Desember</label>
                                                <input type="text" class="form-control" id="basicInput" name="des" value="<?= $des ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Maret</label>
                                                <input type="text" class="form-control" id="basicInput" name="mar" value="<?= $mar ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juni</label>
                                                <input type="text" class="form-control" id="basicInput" name="jun" value="<?= $jun ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">September</label>
                                                <input type="text" class="form-control" id="basicInput" name="sep" value="<?= $sep ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Januari</label>
                                                <input type="text" class="form-control" id="basicInput" name="jan" value="<?= $jan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">April</label>
                                                <input type="text" class="form-control" id="basicInput" name="apr" value="<?= $apr ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Juli</label>
                                                <input type="text" class="form-control" id="basicInput" name="jul" value="<?= $jul ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Febuari</label>
                                                <input type="text" class="form-control" id="basicInput" name="feb" value="<?= $feb ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Mei</label>
                                                <input type="text" class="form-control" id="basicInput" name="mei" value="<?= $mei ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Agustus</label>
                                                <input type="text" class="form-control" id="basicInput" name="aug" value="<?= $aug ?>">

                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <input type="hidden" name="idb" value="<?= $idb ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary ml-1" name="tambahdata">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Tambahkan</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
</div>

</div>