<?php
include "lib/koneksi.php";
$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM user where email = '$email' AND password = '$password'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 1) {
	$user = mysqli_fetch_assoc($result);
	session_start();
	$_SESSION['id'] = $user['id_user'];
	$_SESSION['status'] = 'Login';
	if ($user['level'] == 'admin') {
		header("Location: Admin/dashboard.php");
	} else if ($user['level'] == 'driver') {
		header("Location: driver/index.php");
	} else {
		header("Location: customer?index.php");
	}
} else {
	$errors['invalid'] = 'Email Invalid!';
	header('Location: login.php?pesan=gagal');
}
