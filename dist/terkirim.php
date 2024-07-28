<?php
require 'koneksi.php';
require 'cek.php';

if (isset($_POST['beres'])) {
    $idpem = $_POST['idpem'];
    $beres = $_POST['beres'];
    $tanggalk = $_POST['tanggalk'];
    $update = mysqli_query($conn, "update pemenangkel set beres='0' where idpem='$idpem'");
}


?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Terkirim</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Terkirim</li>
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
                            <th>Kode Regis </th>
                            <th>Ketua </th>
                            <th>Kode brg </th>
                            <th>Barang</th>
                            <th>Bulan Menang</th>
                            <th>Tahun Menang</th>
                            <th>kota</th>
                            <th>Tanggal</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $ambilsemuadatabarang = mysqli_query($conn, "select * from pemenangkel p, kelompok k, barang b 
										where  k.idkel = p.idkel and b.kode = p.kode and p.beres='1'  ");
                        $i = 1;
                        while ($data = mysqli_fetch_array($ambilsemuadatabarang)) {

                            $idkel = $data['idkel'];
                            $kota = $data['kota'];
                            $ketuakel = $data['ketuakel'];
                            $pemenang = $data['pemenang'];
                            $kode = $data['kode'];
                            $nbarang = $data['nbarang'];
                            $hbarang = $data['hbarang'];
                            $idpem = $data['idpem'];
                            $bulan = $data['bulan'];
                            $tahun = $data['tahun'];
                            $tanggalk = $data['tanggalk'];



                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $idkel; ?></td>
                                <td><?= $ketuakel; ?></td>
                                <td><?= $kode; ?></td>
                                <td><?= $nbarang; ?></td>
                                <td><?= $bulan; ?></td>
                                <td><?= $tahun; ?></td>
                                <td><?= $kota; ?></td>
                                <td><?= $tanggalk; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#editform<?= $idpem; ?>">Cancel</button>
                                </td>
                            </tr>





                        <!--edit form Modal -->
                        <div class="modal fade text-left" id="editform<?= $idpem; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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


                                            <input type="hidden" name="idpem" value="<?= $idpem; ?>" class="form-control" disabled><br>

                                            <input type="hidden" name="beres" value="1" class="form-control"><br>


                                        </div>
                                        <div class="modal-footer">

                                            <input type="hidden" name="idpem" value="<?= $idpem; ?>">
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
                    </tbody>
                </table>

            </div>
        </div>

    </section>
</div>