<?php
require'koneksi.php';
require'cek.php';






if(isset($_POST['updatebarang'])){
$kode = $_POST['kode'];
$nbarang = $_POST['nbarang'];
$stock = $_POST['stock'];

$update = mysqli_query($conn,"update barang set stock='$stock' where kode='$kode'");
	
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
                            <h3>Stock Barang</h3>
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href=>Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Stock Barang</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stock </th>
										<th>Ket </th>
										<th>Aksi </th>	
                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$ambilsemuadatabarang = mysqli_query($conn, "select * from barang ");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$kode = $data['kode'];
											$nbarang = $data['nbarang'];
											$stock = $data['stock'];
											$ket = $data['ket'];
											
											
								?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$kode;?></td>
										<td><?=$nbarang;?></td>
										<td><?=$stock;?></td>
										<td><?=$ket;?></td>
										<td>
														<button type="button" class="btn btn-primary btn-sm" 
														data-bs-toggle="modal" data-bs-target="#editform<?=$kode;?>" >Edit</button>
														
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
												
												<input type="hidden" name="kode" value="<?=$kode;?>" class="form-control" disabled ><br>
												<label for="contact-info-vertical">Nama Barang</label>
												<input type="text" name="nbarang" value="<?=$nbarang;?>" class="form-control" disabled><br>
												<label for="contact-info-vertical">Stock</label>
												<input type="text" name="stock" value="<?=$stock;?>" class="form-control" ><br>
												
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
						
									<?php
										}
									?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
			
			
					
					