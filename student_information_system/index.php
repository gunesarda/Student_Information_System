<?php
    error_reporting(0);
    session_start();
    session_destroy();

    // Eğer bir oturum mesajı varsa

    if($_SESSION['message'])
    {
            // Mesajı al

        $message=$_SESSION['message'];
    // JavaScript ile bir bildirim penceresi göster

        echo "<script type'text/javascript'>alert('$message')</script>";
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>

<header>
    <h1>GÜNEŞ UNIVERSITY</h1>
</header>

<nav>
    <a href="login.php">Login</a>
    <a href="#registration">Registration</a>
</nav>

<div class="content">
    <img src="images/okul.jpg" alt="Okan Üniversitesi">
    <div class="overlay-text">GÜNEŞ UNIVERSITY</div>
</div>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
            color: #495057; 
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #007bff; 
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da; 
            border-radius: 4px;
        }

        button {
            background-color: #007bff; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    
<div class="container">
    <p>Welcome to Güneş University!</p>
    <p>Güneş University is an imaginary institution that offers a unique educational experience in a modern and innovative setting. Our university is designed to foster the personal and academic growth of students, preparing them for success in their future endeavors.</p>
    <p><strong>Academic Programs and Colleges:</strong><br>
        Güneş University provides a broad spectrum of academic disciplines, allowing students to pursue education in areas such as Natural Sciences, Social Sciences, Engineering, Business, and Arts. Our specialized faculties offer programs tailored to meet the diverse career goals of our students.</p>
    <p><strong>State-of-the-Art Campus and Facilities:</strong><br>
        Our university boasts a contemporary and well-equipped campus with modern classrooms, laboratories, libraries, and sports facilities. Güneş University prioritizes creating an enriching environment that supports both academic and extracurricular activities.</p>
    <p><strong>International Collaborations:</strong><br>
        Güneş University values global perspectives and encourages international collaboration. Through partnerships with universities worldwide, students have the opportunity to engage in exchange programs and international internships, broadening their horizons.</p>
    <p><strong>Student Life and Organizations:</strong><br>
        At Güneş University, we believe in a holistic approach to education. Students can participate in a variety of clubs, sports, and cultural activities that contribute to their personal development and create a vibrant campus community.</p>
    <p><strong>Career Development and Support Services:</strong><br>
        Güneş University is committed to preparing students for their professional journey. Career development services, internship opportunities, and job fairs are integral parts of our commitment to helping students achieve their career aspirations.</p>
    <p>Join the Güneş University community, where academic excellence and personal growth converge to shape the leaders of tomorrow!</p>
</div>        

<CENTEr><H1>REGISTRATION</H1>
        <p>This is the registration form. If the form you submit is approved by the administrators, your account will be created.</p>
</CENTEr>
    <div class="container" id="registration" name="registration">
        <form action="data_check.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="usertype">User Type:</label>
            <input type="text" id="usertype" name="usertype" required>

            <button type="submit" value="apply" name="apply">Submit</button>
        </form>
    </div>
</body>
</html>



</body>
</html>
