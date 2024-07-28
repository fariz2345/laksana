<?php
require 'koneksi.php';
require 'cek.php';

if (isset($_POST['tambahdata'])) {
	$idkel = $_POST['idkel'];
	$pemenang = $_POST['pemenang'];
	$kode = $_POST['kode'];
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];



	$addtotable = mysqli_query($conn, "insert into pemenangkel (idkel,pemenang,kode,bulan,tahun) values('$idkel','$pemenang','$kode','$bulan','$tahun')");
}

if (isset($_POST['updateket'])) {
	$idpem = $_POST['idpem'];
	$ket = $_POST['ket'];

	$update = mysqli_query($conn, "update pemenangkel set ketp='$ket' where idpem='$idpem'");
}


if (isset($_POST['updatebarang'])) {
	$kode = $_POST['kode'];
	$nbarang = $_POST['nbarang'];
	$hbarang = $_POST['hbarang'];

	$update = mysqli_query($conn, "update barang set kode='$kode', nbarang='$nbarang', hbarang='$hbarang' where kode='$kode'");
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
	$idkel = $_GET['idkel'];
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

				<a href="index.php?call=dist/updetailbayar.php&idkel=<?= $idkel; ?>"><button type="button" class="btn btn-outline-primary">Ubah Data</button></a>

				</div>
				<?php
				$ambilsemuadatabarang = mysqli_query($conn, "select * from bayar b, kelompok k
										 where k.idkel='$idkel' and k.idkel=b.idkel ");
				$i = 1;
				while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {

					$periode = $data['periode'];
					$bulanr = $data['bulanr'];
					$idkel = $data['idkel'];
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
						<div class="row">
							<?php
							if ($bulanr == "Januari") {
								if ($periode == 5) {
							?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>

										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>

										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
									</div>
								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>

										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>

										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>

										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>

										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">

										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
									</div>
								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">

										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
									</div>
								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">

										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
									</div>
								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Oktober</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($okt, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">November</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($nov, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>

									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
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
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>
									</div>


								<?php
								} elseif ($periode == 10) {
								?>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Desember</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($des, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Maret</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mar, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juni</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jun, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">September</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($sep, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Januari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jan, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">April</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($apr, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Juli</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($jul, 0, ".", ","); ?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="basicInput">Febuari</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($feb, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Mei</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($mei, 0, ".", ","); ?>" readonly>
										</div>
										<div class="form-group">
											<label for="basicInput">Agustus</label>
											<input type="text" class="form-control" id="basicInput" value="<?= number_format($aug, 0, ".", ","); ?>" readonly>
										</div>
									</div>
							<?php
								}
							}

							?>
						</div>
						</table>
						<h5>Jumlah Setoran</h5>
						<table class="table table-striped">
							<thead>
								<tr>
									<td>Total Kewajiban</td>
									<td>Jumlah Setoran</td>
									<td>Sisa Tunggakan</td>
									<td>Keterangan</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								<?php

								$ambilsemuadatabarang = mysqli_query($conn, "SELECT * ,
													SUM(hbarang) as total
													FROM
													pemenangkel p, barang b, kelompok k, bayar y
													WHERE
													p.idkel = '$idkel' and b.kode = p.kode and k.idkel = p.idkel and k.idkel = y.idkel
													and p.cancelp = '0' ");
								$i = 1;
								while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {

									$idb = $data['idb'];
									$idkel = $data['idkel'];
									$total = $data['total'];
									$periode = $data['periode'];
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
									$ket = $data['ket_b'];

									$totalhitung = $total - $jan - $feb - $mar - $apr - $mei - $jun - $jul - $aug - $sep - $okt - $nov - $des;


								?>
									<tr>
										<td><?= number_format($total, 0, ".", ","); ?></td>
										<td><?= number_format($total / $periode, 0, ".", ","); ?></td>
										<td><?= number_format($totalhitung, 0, ".", ","); ?></td>
										<td><?= $ket; ?></td>
										<td>
											<button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#editform<?= $idb; ?>">Ket</button>
										</td>
										<!--edit form Modal -->
										<div class="modal fade text-left" id="editform<?= $idb; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel33">Edit Data</h4>
														<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
															<i data-feather="x"></i>
														</button>
													</div>
													<form method="POST">
														<div class="modal-body">


															<input type="hidden" name="idb" value="<?= $idb; ?>" class="form-control" disabled><br>

															<input type="hidden" name="beres" value="1" class="form-control"><br>


														</div>
														<div class="modal-footer">

															<input type="hidden" name="idb" value="<?= $idb; ?>">
															<button type="submit" class="btn btn-primary ml-1" name="beres">
																<i class="bx bx-check d-block d-sm-none"></i>
																<span class="d-none d-sm-block">Cancel</span>
															</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php
								}

									?>

									</tr>

							</tbody>
						</table>
					</div>
				<?php
				}
				?>
			</div>
</div>

</div>