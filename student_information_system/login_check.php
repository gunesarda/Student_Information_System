<?php

error_reporting(0);
session_start();

// Veritabanı bağlantı bilgileri

$host = "localhost";

$user = "root";

$password = "";

$db = "studentinformation";

// Veritabanına bağlan

$data = mysqli_connect($host, $user, $password, $db);

// Bağlantı kontrolü

if ($data === false) {
	die("connection error");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Kullanıcı adı ve şifre değişkenlerini al

	$name = $_POST['username'];

	$pass = $_POST['password'];

	// Kullanıcı adı ve şifreye göre sorgu oluştur

	$sql = "select * from user where username='" . $name . "' AND password='" . $pass . "'  ";

	$result = mysqli_query($data, $sql);
	// Sorgu sonucunu al

	$row = mysqli_fetch_array($result);


	// Kullanıcı türüne göre yönlendirme yap

	if ($row["usertype"] == "student") {
		// Öğrenci ise oturum değişkenlerini ayarla ve öğrenci sayfasına yönlendir

		$_SESSION['username'] = $name;

		$_SESSION['usertype'] = "student";

		header("location:student.php");
	} elseif ($row["usertype"] == "admin") {
		// Admin ise oturum değişkenlerini ayarla ve admin sayfasına yönlendir

		$_SESSION['username'] = $name;

		$_SESSION['usertype'] = "admin";

		header("location:admin.php");
	} else {
		// Hatalı giriş durumunda mesajı ayarla ve giriş sayfasına yönlendir


		$message = "username or password do not match";

		$_SESSION['loginMessage'] = $message;

		header("location:login.php");
	}
}
