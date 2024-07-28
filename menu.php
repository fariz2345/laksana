<ul class="menu">
						 <?php if($_SESSION['username']=="regis"){ ?>
                        <li class="sidebar-item  ">
                            <a href="index.php?call=dist/barang.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Barang</span>
                            </a>
                        </li>
						
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/kelompok.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Kelompok</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/cancel.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Kelompok(cancel)</span>
                            </a>
                        </li>
						 <?php }else if($_SESSION['username']=="gudang"){ ?>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/stock.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Stock Barang</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/input.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Input Barang</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/output.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Output Barang</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/pembelanjaan.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Pembelanjaan</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/pemberes.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Pembelanjaan Beres</span>
                            </a>
                        </li>
						<?php } else if($_SESSION['username']=="kirim"){  ?>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/sjh.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Pengiriman</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/belum.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Belum Terkirim</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/terkirim.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Terkirim</span>
                            </a>
                        </li>
						<?php } else if($_SESSION['username']=="keuangan"){ ?>
						<li class="sidebar-item  ">
                            <a href="index.php?call=dist/keuangan.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Kelompok</span>
                            </a>
                        </li>
						
						<?php } ?>
						<li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                        

                    </ul>