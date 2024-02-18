<?php

    session_start();
    // Eğer kullanıcı oturumda değilse veya kullanıcı admin ise, giriş sayfasına yönlendir
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student</title>

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
		
		<a href="">Student Information System</a>

		<div class="logout">
			
			<a href="logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside>
		
		<ul>
			
			<!-- <li>
				<a href="">Admission</a>
			</li> -->

			<li>
				<a href="student_information.php">My Information</a>
			</li>


		</ul>


	</aside>


	<div class="content">
		
	<header>
        <h1>Welcome to the Student Portal!</h1>
    </header>

    <section>
        <p>Dear students,</p>
        <p>We are delighted to welcome you to the Student Portal, your go-to platform for accessing essential information and grades. Here, you can conveniently view your academic progress, exam results, and other important details related to your studies.</p>
        <p>Our user-friendly interface is designed to provide you with easy navigation, ensuring that you can quickly find the information you need. Whether you're checking your latest exam scores or reviewing course materials, the Student Portal is here to support your academic journey.</p>
        <p>Stay organized and informed by exploring the various features available on this platform. Track your semester grades, access course resources, and stay updated on any announcements or important dates.</p>
        <p>We hope you find the Student Portal to be a valuable resource in your educational experience. If you have any questions or encounter any issues, don't hesitate to reach out to our support team.</p>
        <p>Wishing you a successful and fulfilling academic year!</p>
        <p>Best regards,</p>
    </section>

    <footer>
        <p>&copy; 2024 Student Portal. All rights reserved.</p>
    </footer>


	</div>

</body>
</html>
