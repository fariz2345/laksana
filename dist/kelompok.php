<?php
require'koneksi.php';
require'cek.php';

if(isset($_POST['tambahdata'])){
$idkel = $_POST['idkel'];
$ketuakel = $_POST['ketuakel'];
$kota = $_POST['kota'];
$bulanr = $_POST['bulanr'];
$periode = $_POST['periode'];
$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kelompok WHERE idkel='$idkel'"));
    if ($cek > 0){
    echo "<script>window.alert('kode yang anda masukan sudah ada')</script>";
    }else {

 $addtotable = mysqli_query($conn,"insert into kelompok (idkel,ketuakel,kota,bulanr,periode) values('$idkel','$ketuakel','$kota','$bulanr','$periode')");

}}

if(isset($_POST['updateket'])){
$idkel = $_POST['idkel'];
$ket = $_POST['ket'];

$update = mysqli_query($conn,"update kelompok set ket='$ket' where idkel='$idkel'");
	
}


if(isset($_POST['updatebarang'])){
$idkel = $_POST['idkel'];
$ketuakel = $_POST['ketuakel'];
$kota = $_POST['kota'];
$bulanr = $_POST['bulanr'];
$periode = $_POST['periode'];
$update = mysqli_query($conn,"update kelompok set ketuakel='$ketuakel', kota='$kota', bulanr='$bulanr', periode='$periode' where idkel='$idkel'");
	
}

if(isset($_POST['hapusbarang'])){
$idkel = $_POST['idkel'];


$hapus = mysqli_query($conn,"delete from kelompok where idkel='$idkel'");
	
}
if(isset($_POST['cancel'])){
$idkel = $_POST['idkel'];
$cancel = $_POST['cancel'];
$update = mysqli_query($conn,"update kelompok set cancel='1' where idkel='$idkel'");
$update = mysqli_query($conn,"update pemenangkel set cancelp='1' where idkel='$idkel'");
	
}

?>

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data Kelompok</h3>
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href=>Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Kelompok</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahform">Tambah Kelompok</button>
							
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Id Kelompok</th>
                                        <th>Ketua Kelompok</th>
										<th>Kota</th>
										<th>Bulan Regis</th>
										<th>Periode</th>
                                        <th>ket</th>
										<th></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$ambilsemuadatabarang = mysqli_query($conn, "select * from kelompok where cancel='0' order by idkel desc");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$idkel = $data['idkel'];
											$ketuakel = $data['ketuakel'];
											$kota = $data['kota'];
											$bulanr = $data['bulanr'];
											$periode = $data['periode'];
											$ket = $data['ket'];
											
											
											
								?>
                                    <tr>
                                        <td><?=$i++;?></td>
										<td><?=$idkel;?></td>
										<td><?=$ketuakel;?></td>
										<td><?=$kota;?></td>
										<td><?=$bulanr;?></td>
										<td><?=$periode;?></td>
										<td><?=$ket;?></td>
										<td><a href="index.php?call=dist/detailkelompok.php&idkel=<?=$idkel?>">
											<button type="button" class="btn btn-primary btn-sm" >Detail</button></td>
											</a>
										<td>
												
														<button type="button"
                                                            class="btn btn-primary btn-sm dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editform<?=$idkel;?>">
															<i class="bx bx-edit-alt me-1"></i> Edit</a>
															<input type="hidden" name="idbarangyangmaudihapus" value="<?=$idkel;?>" >
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteform<?=$idkel;?>">
															<i class="bx bx-trash me-1"></i> Delete</a>
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ketform<?=$idkel;?>">
															<i class="bx bx-trash me-1"></i> Ket</a>
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cancelform<?=$idkel;?>">
															<i class="bx bx-trash me-1"></i> Cancel</a>
														</div>
											
										</td>
                                    </tr>
						<!--ket form Modal -->
                        <div class="modal fade text-left" id="ketform<?=$idkel;?>" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tambah keterangan</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                    </div>
                                        <form method="POST">
											<div class="modal-body">
												
												<input type="text" name="ket" value="<?=$ket;?>" class="form-control" ><br>
												
												
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="idkel" value="<?=$idkel;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="updateket" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Edit</span>
                                                </button>
                                            </div>
										</form>
                                    </div>
                            </div>
                        </div>
						<!--edit form Modal -->
                        <div class="modal fade text-left" id="editform<?=$idkel;?>" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
												
												<label for="contact-info-vertical">Id Kelompok</label>
												<input type="text" name="idkel" value="<?=$idkel;?>" class="form-control" disabled ><br>
												<label for="contact-info-vertical">Ketua Kelompok</label>
												<input type="text" name="ketuakel" value="<?=$ketuakel;?>" class="form-control" ><br>
												<label for="contact-info-vertical">Kota</label>
												<input type="text" name="kota" value="<?=$kota;?>" class="form-control" ><br>
												<select class="form-select" name="bulanr" placeholder="Bulan">
														<option value="<?=$bulanr;?>"><?=$bulanr;?></option>
														<option value="Januari">Januari</option>
														<option value="Februari">Februari</option>
														<option value="Maret">Maret</option>
														<option value="April">April</option>
														<option value="Mei">Mei</option>
														<option value="Juni">Juni</option>
														<option value="Juli">Juli</option>
														<option value="Agustus">Agustus</option>
														<option value="September">September</option>
														<option value="Oktober">Oktober</option>
														<option value="November">November</option>
														<option value="Desember">Desember</option>
												</select> <br>
												<select class="form-select" name="periode" placeholder="Bulan">
														<option value="<?=$periode;?>"><?=$periode;?></option>
														<option value="5">5</option>
														<option value="10">10</option>
												</select>
												
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="idkel" value="<?=$idkel;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="updatebarang" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Edit</span>
                                                </button>
                                            </div>
										</form>
                                    </div>
                            </div>
                        </div>
						<!--delete form Modal -->
                        <div class="modal fade text-left" id="deleteform<?=$idkel;?>" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Hapus Data?</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                    </div>
                                        <form method="POST">
											<div class="modal-body">
												<h6 class="modal-title" id="myModalLabel33">Apakah kamu ingin menghapus <?=$ketuakel;?> ?</h6>
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="idkel" value="<?=$idkel;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="hapusbarang" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Hapus</span>
                                                </button>
                                            </div>
										</form>
                                    </div>
                            </div>
                        </div>
						<!--cancel form Modal -->
                        <div class="modal fade text-left" id="cancelform<?=$idkel;?>" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Cancel Kelompok?</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                    </div>
                                        <form method="POST">
											<div class="modal-body">
												<h6 class="modal-title" id="myModalLabel33">Apakah kamu ingin mengcancel <?=$ketuakel;?> ?</h6>
												<input type="hidden" name="cancel" value="1" class="form-control" ><br>
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="idkel" value="<?=$idkel;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="cancel" >
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
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
			
			
					<!--tambah form Modal -->
                        <div class="modal fade text-left" id="tambahform" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tambah Data</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                    </div>
                                        <form method="POST">
											<div class="modal-body">
												<input type="number" name="idkel"  placeholder="Id Kelompok" class="form-control" ><br>
												<input type="text" name="ketuakel" placeholder="Ketua Kelompok" class="form-control" ><br>
												<input type="text" name="kota"  placeholder="Kota" class="form-control" ><br>
												
												<select class="form-select" name="bulanr" placeholder="Bulan">
														<option value="Januari">Bulan Regis</option>
														<option value="Januari">Januari</option>
														<option value="Februari">Februari</option>
														<option value="Maret">Maret</option>
														<option value="April">April</option>
														<option value="Mei">Mei</option>
														<option value="Juni">Juni</option>
														<option value="Juli">Juli</option>
														<option value="Agustus">Agustus</option>
														<option value="September">September</option>
														<option value="Oktober">Oktober</option>
														<option value="November">November</option>
														<option value="Desember">Desember</option>
												</select> <br>
												<select class="form-select" name="periode" placeholder="Bulan">
														<option value="10">Periode</option>
														<option value="5">5</option>
														<option value="10">10</option>
												</select>
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" name="tambahdata" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tambahkan</span>
                                                </button>
                                            </div>
										</form>
                                    </div>
                            </div>
                        </div>
						
						
						
					