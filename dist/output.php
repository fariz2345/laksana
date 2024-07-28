<?php
require'koneksi.php';
require'cek.php';

if(isset($_POST['tambahdata'])){
$kode = $_POST['kode'];
$tanggal = $_POST['tanggal'];
$pembawa = $_POST['pembawa'];
$qty = $_POST['qty'];

$cekstocksekarang = mysqli_query($conn,"select * from barang where kode='$kode'");
$ambildatanya = mysqli_fetch_array ($cekstocksekarang);

$stocksekarang = $ambildatanya['stock'];
$tambahkanstocksekarangdenganquantiti = $stocksekarang-$qty;

 $addtomasuk = mysqli_query($conn,"insert into keluar (kode,tanggal,pembawa,qty) values('$kode','$tanggal','$pembawa','$qty')");
 $updatestockmasuk = mysqli_query($conn, "update barang set stock = '$tambahkanstocksekarangdenganquantiti' where kode='$kode'");


}



if(isset($_POST['hapusbarang'])){
$idkeluar = $_POST['idkeluar'];
$kode = $_POST['kode'];
$qty = $_POST['qty'];

$getdatastock = mysqli_query($conn, "select * from barang where kode='$kode'");
$data = mysqli_fetch_array($getdatastock);
$stok = $data['stock'];

$selisih = $stok+$qty;
$update = mysqli_query($conn,"update barang set stock='$selisih' where kode='$kode'");
$hapusdata = mysqli_query($conn, "delete from keluar where idkeluar='$idkeluar'");

	
}


?>

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Output Barang</h3>
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href=>Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Output Barang</li>
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
                                        <th>Tanggal</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Pengambil</th>
										<th>Jumlah</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$ambilsemuadatabarang = mysqli_query($conn, "select * from barang b, keluar k
										where b.kode = k.kode");
										$i = 1; 
										while ($data = mysqli_fetch_array($ambilsemuadatabarang)){
											
											$kode = $data['kode'];
											$nbarang = $data['nbarang'];
											$tanggal = $data['tanggal'];
											$pembawa = $data['pembawa'];
											$qty = $data['qty'];
											$idkeluar = $data['idkeluar'];
											
											
								?>
                                    <tr>
                                        <td><?=$i++;?></td>
										<td><?=$kode;?></td>
										<td><?=$tanggal;?></td>
										<td><?=$nbarang;?></td>
										<td><?=$pembawa;?></td>
										<td><?=$qty;?></td>
										<td>
														<input type="hidden" name="idbarangyangmaudihapus" value="<?=$idkeluar;?>" >
														<button type="button" class="btn btn-danger btn-sm" 
														data-bs-toggle="modal" data-bs-target="#deleteform<?=$idkeluar;?>" >Hapus</button>
											
										</td>
                                    </tr>
						
						
						<!--delete form Modal -->
                        <div class="modal fade text-left" id="deleteform<?=$idkeluar;?>" tabindex="-1"
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
												<h6 class="modal-title" id="myModalLabel33">Apakah kamu ingin menghapus <?=$nbarang;?> </br>
												Dengan Jumlah <?=$qty;?> Barang ?</h6>
												<input type="hidden" name="kode" value="<?=$kode;?>"> 
											    <input type="hidden" name="qty" value="<?=$qty;?>">
											    <input type="hidden" name="idkeluar" value="<?=$idkeluar;?>">
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>
												
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
												<input type="date" name="tanggal" placeholder="Kode Barang" class="form-control" ><br>
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
												<input type="text" name="pembawa" placeholder="Pengambil" class="form-control" ><br>
												<input type="number" name="qty"  placeholder="Jumlah" class="form-control" ><br>
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
						
					