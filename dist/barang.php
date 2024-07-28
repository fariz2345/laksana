<?php
require'koneksi.php';
require'cek.php';

if(isset($_POST['tambahdata'])){
$kode = $_POST['kode'];
$nbarang = $_POST['nbarang'];
$hbarang = $_POST['hbarang'];
$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM barang WHERE kode='$kode'"));
    if ($cek > 0){
    echo "<script>window.alert('kode yang anda masukan sudah ada')</script>";
    }else {

 $addtotable = mysqli_query($conn,"insert into barang (kode,nbarang,hbarang) values('$kode','$nbarang','$hbarang')");

}}


if(isset($_POST['updateket'])){
$kode = $_POST['kode'];
$ket = $_POST['ket'];

$update = mysqli_query($conn,"update barang set ket='$ket' where kode='$kode'");
	
}

if(isset($_POST['updatebarang'])){
$kode = $_POST['kode'];
$nbarang = $_POST['nbarang'];
$hbarang = $_POST['hbarang'];

$update = mysqli_query($conn,"update barang set kode='$kode', nbarang='$nbarang', hbarang='$hbarang' where kode='$kode'");
	
}

if(isset($_POST['hapusbarang'])){
$kode = $_POST['kode'];


$hapus = mysqli_query($conn,"delete from barang where kode='$kode'");
	
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
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahform">Tambah Barang</button>
							
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Barang</th>
										<th>Ket</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$ambilsemuadatabarang = mysqli_query($conn, "select * from barang");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$kode = $data['kode'];
											$nbarang = $data['nbarang'];
											$hbarang = $data['hbarang'];
											$ket = $data['ket'];
											
											
								?>
                                    <tr>
                                        <td><?=$i++;?></td>
										<td><?=$kode;?></td>
										<td><?=$nbarang;?></td>
										<td><?=number_format($hbarang,0,".",",");?></td>
										<td><?=$ket;?></td>
										<td>
												
														<button type="button"
                                                            class="btn btn-primary btn-sm dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editform<?=$kode;?>">
															<i class="bx bx-edit-alt me-1"></i> Edit</a>
															<input type="hidden" name="idbarangyangmaudihapus" value="<?=$kode;?>" >
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteform<?=$kode;?>">
															<i class="bx bx-trash me-1"></i> Delete</a>
															<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ketform<?=$kode;?>">
															<i class="bx bx-trash me-1"></i> Ket</a>
														</div>
											
										</td>
                                    </tr>
						
						<!--edit form Modal -->
                        <div class="modal fade text-left" id="editform<?=$kode;?>" tabindex="-1"
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
												
												<input type="text" name="kode" value="<?=$kode;?>" class="form-control" disabled ><br>
												<label for="contact-info-vertical">Nama Barang</label>
												<input type="text" name="nbarang" value="<?=$nbarang;?>" class="form-control" ><br>
												<label for="contact-info-vertical">Harga Barang</label>
												<input type="text" name="hbarang" value="<?=$hbarang;?>" class="form-control" ><br>
												
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="kode" value="<?=$kode;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="updatebarang" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Edit</span>
                                                </button>
                                            </div>
										</form>
                                    </div>
                            </div>
                        </div>
						<!--ket form Modal -->
                        <div class="modal fade text-left" id="ketform<?=$kode;?>" tabindex="-1"
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
												<input type="hidden" name="kode" value="<?=$kode;?>">
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
                        <div class="modal fade text-left" id="deleteform<?=$kode;?>" tabindex="-1"
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
												<h6 class="modal-title" id="myModalLabel33">Apakah kamu ingin menghapus <?=$nbarang;?> ?</h6>
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												<input type="hidden" name="kode" value="<?=$kode;?>">
                                                <button type="submit" class="btn btn-primary ml-1" name="hapusbarang" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Hapus</span>
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
												<input type="text" name="kode" placeholder="Kode Barang" class="form-control" ><br>
												<input type="text" name="nbarang" placeholder="Nama Barang" class="form-control" ><br>
												<input type="number" name="hbarang"  placeholder="Harga Barang" class="form-control" ><br>
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
						
					