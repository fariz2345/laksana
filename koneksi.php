<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
//membuat koneksi ke database


$conn = mysqli_connect("localhost","root","","laksana");

										
?>