<?php

session_start();
// Kullanıcı oturumda değilse veya kullanıcı öğrenci tipindeyse giriş sayfasına yönlendir

if (!isset($_SESSION['username'])) {
	header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
	header("location:login.php");
}

?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Admin</title>

	<link rel="stylesheet" type="text/css" href="admin.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

	<header class="header">

		<a href="">Admin</a>

		<div class="logout">

			<a href="logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside>

		<ul>

			<li>
				<a href="admission.php">Registration Forms</a>
			</li>

			<li>
				<a href="add_student.php">Add Student and Edit Grades</a>
			</li>

			<li>
				<a href="student_list.php">Students' Informations</a>
			</li>



		</ul>


	</aside>

	<div class="content">
		<header>
			<h1>Welcome to the Admin Panel!</h1>
		</header>

		<section>
			<p>Greetings!</p>
			<p>Welcome to the admin panel of this platform. Here, you can manage the system, view students who want to register, edit course grades, see the student list, and add new students.</p>
			<p>Feel free to navigate through the various features to ensure smooth administration and effective management of student records. If you have any questions or need assistance, please don't hesitate to reach out.</p>
			<p>Best regards,</p>
		</section>

		<footer>
			<p>&copy; 2024 Admin Panel. All rights reserved.</p>
		</footer>

	</div>


</body>

</html>