<?php
require'koneksi.php';
require'cek.php';

if(isset($_POST['tambahdata'])){
$idkel = $_POST['idkel'];
$pemenang = $_POST['pemenang'];
$kode = $_POST['kode'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];



 $addtotable = mysqli_query($conn,"insert into pemenangkel (idkel,pemenang,kode,bulan,tahun) values('$idkel','$pemenang','$kode','$bulan','$tahun')");

}

if(isset($_POST['updateket'])){
$idpem = $_POST['idpem'];
$ket = $_POST['ket'];

$update = mysqli_query($conn,"update pemenangkel set ketp='$ket' where idpem='$idpem'");
	
}


if(isset($_POST['updatebarang'])){
$kode = $_POST['kode'];
$nbarang = $_POST['nbarang'];
$hbarang = $_POST['hbarang'];

$update = mysqli_query($conn,"update barang set kode='$kode', nbarang='$nbarang', hbarang='$hbarang' where kode='$kode'");
	
}

if(isset($_POST['hapusbarang'])){
$idpem = $_POST['idpem'];


$hapus = mysqli_query($conn,"delete from pemenangkel where idpem='$idpem'");
	
}
if(isset($_POST['cancel'])){
$idpem = $_POST['idpem'];
$cancel = $_POST['cancel'];

$update = mysqli_query($conn,"update pemenangkel set cancelp='1' where idpem='$idpem'");
	
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
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$idkel = $data['idkel'];
											$ketuakel = $data['ketuakel'];
										
											
											
								?>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
										<h3><?=$idkel;?>  -  <?=$ketuakel;?></h3></br> <?php } ?>
							<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahform">Tambah Pemenang</button>
							
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Pemenang</th>
                                        <th>Nama Barang</th>
                                        <th>Bulan Menang</th>
										<th>Tahun Menang</th>
										<th>Harga Barang</th>
										<th>Per Bulan</th>
										<th>ket</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								
										$ambilsemuadatabarang = mysqli_query($conn, "select * from pemenangkel p, kelompok k, barang b 
										where p.idkel='$idkel' and k.idkel = p.idkel and b.kode = p.kode and p.cancelp = '0'  ");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$idkel = $data['idkel'];
											$ketuakel = $data['ketuakel'];
											$pemenang = $data['pemenang'];
											$kode = $data['kode'];
											$nbarang = $data['nbarang'];
											$hbarang = $data['hbarang'];
											$idpem = $data['idpem'];
											$bulan = $data['bulan'];
											$tahun = $data['tahun'];
											$ket = $data['ketp'];
											
											
											
								?>
                                    <tr>
                                        <td><?=$i++;?></td>
										<td><?=$pemenang;?></td>
										<td><?=$nbarang;?></td>
										<td><?=$bulan;?></td>
										<td><?=$tahun;?></td>
										<td><?=number_format($hbarang,0,".",",");?></td>
										<td><?=number_format($hbarang/10,0,".",",");?></td>
										<td><?=$ket;?></td>
										<td>
												
														<button type="button"
                                                            class="btn btn-primary btn-sm dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            
															<input type="hidden" name="idbarangyangmaudihapus" value="<?=$idpem;?>" >
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteform<?=$idpem;?>">
															<i class="bx bx-trash me-1"></i> Delete</a>
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ketform<?=$idpem;?>">
															<i class="bx bx-trash me-1"></i> Ket</a>
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cancelform<?=$idpem;?>">
															<i class="bx bx-trash me-1"></i> Cancel</a>
														</div>
											
										</td>
										
                                    </tr>
							
						<!--ket form Modal -->
                        <div class="modal fade text-left" id="ketform<?=$idpem;?>" tabindex="-1"
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
												<input type="hidden" name="idpem" value="<?=$idpem;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="updateket" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Edit</span>
                                                </button>
                                            </div>
										</form>
                                    </div>
                            </div>
                        </div>			
						
						
						<!--delete form Modal -->
                        <div class="modal fade text-left" id="deleteform<?=$idpem;?>" tabindex="-1"
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
												<h6 class="modal-title" id="myModalLabel33">Apakah kamu ingin menghapus <?=$pemenang;?> ?</h6>
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="idpem" value="<?=$idpem;?>">
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
                        <div class="modal fade text-left" id="cancelform<?=$idpem;?>" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Cancel Pemenang?</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                    </div>
                                        <form method="POST">
											<div class="modal-body">
												<h6 class="modal-title" id="myModalLabel33">Apakah kamu ingin meng cancel <?=$pemenang;?> ?</h6>
												<input type="hidden" name="cancel" value="1" class="form-control" ><br>
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="idpem" value="<?=$idpem;?>">
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
							<h5>Jumlah Setoran</h5>
							<table class="table table-striped" id="table1">
								<thead>
									<tr>
                                        <td>Jumlah Semua Harga</td>
										<td>Jumlah Setoran</td>
									</tr>	
								</thead>
								<tbody>
								<?php
								
										$ambilsemuadatabarang = mysqli_query($conn, "SELECT periode,
													SUM(hbarang) as total
													FROM
													pemenangkel p, barang b, kelompok k
													WHERE
													p.idkel = '$idkel' and b.kode = p.kode and k.idkel = p.idkel and p.cancelp = '0' ");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$idkel = $data['idkel'];
											$total = $data['total'];
											$periode = $data['periode'];
																				
											
								?>
									<tr>
                                        <td><?=number_format($total,0,".",",");?></td>
										<td><?=number_format($total/$periode,0,".",",");?></td>
										<?php
										}
										
									?>
																		
                                    </tr>
									
								</tbody>
							</table>
						</div>	
					</div>
				</div>				
				<section class="section">
                    <div class="card">		
						<div class="card-header">
										<h3>Data Pemenang Cancel</h3></br> 
							
                        </div>
						<div class="card-body">	
							
							<table class="table table-striped" id="table1">
								<thead>
									<tr>
                                        <th>NO</th>
                                        <th>Pemenang</th>
                                        <th>Nama Barang</th>
                                        <th>Bulan Menang</th>
										<th>Tahun Menang</th>
										<th>Harga Barang</th>
										<th>Per Bulan</th>
										<th>ket</th>
                                        <th>Actions</th>
									</tr>	
								</thead>
								<tbody>
								<?php
										$idkel = $_GET['idkel'];	
										$ambilsemuadatabarang = mysqli_query($conn, "select * from pemenangkel p, kelompok k, barang b 
										where p.idkel='$idkel' and k.idkel = p.idkel and b.kode = p.kode and p.cancelp = '1' ");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$idkel = $data['idkel'];
											$ketuakel = $data['ketuakel'];
											$pemenang = $data['pemenang'];
											$kode = $data['kode'];
											$nbarang = $data['nbarang'];
											$hbarang = $data['hbarang'];
											$idpem = $data['idpem'];
											$bulan = $data['bulan'];
											$tahun = $data['tahun'];
											$ket = $data['ketp'];
																				
											
								?>
									<tr>
                                        <td><?=$i++;?></td>
										<td><?=$pemenang;?></td>
										<td><?=$nbarang;?></td>
										<td><?=$bulan;?></td>
										<td><?=$tahun;?></td>
										<td><?=number_format($hbarang,0,".",",");?></td>
										<td><?=number_format($hbarang/10,0,".",",");?></td>
										<td><?=$ket;?></td>
										<td><button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#ketcform<?=$idpem;?>">Keterangan</button>
										</td>
							<!--ket form Modal -->
                        <div class="modal fade text-left" id="ketcform<?=$idpem;?>" tabindex="-1"
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
												<input type="hidden" name="idpem" value="<?=$idpem;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="updateket" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Edit</span>
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
							<h5>Setoran Awal</h5>
							<table class="table table-striped" id="table1">
								<thead>
									<tr>
                                        <td>Jumlah Semua Harga</td>
										<td>Jumlah Setoran</td>
									</tr>	
								</thead>
								<tbody>
								<?php
								
										$ambilsemuadatabarang = mysqli_query($conn, "SELECT periode,
													SUM(hbarang) as total
													FROM
													pemenangkel p, barang b, kelompok k
													WHERE
													p.idkel = '$idkel' and b.kode = p.kode and k.idkel = p.idkel  ");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$idkel = $data['idkel'];
											$total = $data['total'];
											$periode = $data['periode'];
																				
											
								?>
									<tr>
                                        <td><?=number_format($total,0,".",",");?></td>
										<td><?=number_format($total/$periode,0,".",",");?></td>
										<?php
										}
										
									?>
																		
                                    </tr>
									
								</tbody>
							</table>
                        </div>
                    </div>

                </section>
            </div>
			
			
					<!--tambah form Modal -->
                        <div class="modal fade text-left" id="tambahform" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tambah Data</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                    </div>
                                        <form method="POST">
											<div class="modal-body">
												<input type="text" name="pemenang" placeholder="Pemenang" class="form-control" ><br>
												
													<select class="choices form-select" name="kode" placeholder="Nama Barang">
														<option value="0000">Barang</option>
														<?php
																$ambilsemuadatabarang = mysqli_query($conn, "select * from barang");
																$i = 1; 
																while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
																	
																	echo '<option value="'.$data['kode'].'">'.$data['nbarang'].'</option>';
																}
														?>
														
													</select>
													<select class=" form-select" name="bulan" placeholder="Bulan">
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
													
												
												<input type="number" name="tahun"  placeholder="Tahun" class="form-control" ><br>
													<?php
														$idkel = $_GET['idkel'];
																$ambilsemuadatabarang = mysqli_query($conn, "select * from kelompok
																where idkel='$idkel' ");
																$i = 1; 
																while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
																	
																	$idkel = $data['idkel'];
																	$ketuakel = $data['ketuakel'];	
														?>
												<input type="hidden" name="idkel" value="<?=$idkel;?> <?php }?>class="form-control" ><br>
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
						
					