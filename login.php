<?php
require'koneksi.php';



if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$cekdatabase = mysqli_query($conn, "SELECT * FROM login where username='$username' and password='$password'");
 $rw=mysqli_fetch_array($cekdatabase);
 $hitung =mysqli_num_rows($cekdatabase);
 
 
 if($hitung>0){
	
	 $_SESSION['username']=$rw['username'];
	 $_SESSION['log']='True';
	 $_SESSION['last_login_time'] = time();
	 header('location:index.php');
 } else {
	 header('location:login.php');
 };
};
//jika sudah login
if(!isset($_SESSION['log'])){
	
	}else{
		header('location:index.php');
		}
	 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laksana Community</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
	<link rel="shortcut icon" href="assets/images/logo/h.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            
            <a class="navbar-brand ms-4" >
                <img src="assets/images/logo/logol.png">
            </a>
        </div>
    </nav>


    <section class="section">
                    <div class="row">
                        <div class="col-12 col-md-8 offset-md-4">
                            <div class="pricing">
                                <div class="row align-items-center">
                                    <div class="col-md-6 px-0">
                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h4 class="card-title">LOGIN</h4>
                                                
                                            </div>
                                            <form action="login.php" method="POST">
											<div class="card-body">
												<input type="text" name="username"  placeholder="Username" class="form-control" ><br>
											  <div class="input-group input-group-merge">
												<input type="password" id="password" class="form-control" name="password" 
												placeholder="Password"
												aria-describedby="password">
												
											  </div>
											</div>
											<div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-block" name="login" href="login.php" >
													<i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Masuk</span>
													
                                                </button>
                                            </div>
										</form>
                                            
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
	
	
	<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>

</body>
	
</html>