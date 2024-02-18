<?php

session_start();
// Kullanıcı oturumda değilse veya kullanıcı öğrenci tipindeyse giriş sayfasına yönlendir
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

// Veritabanı bağlantısı için gerekli bilgiler

$host = "localhost";
$user = "root";
$password = "";
$db = "studentinformation";
// Veritabanı bağlantısını oluştur

$data = mysqli_connect($host, $user, $password, $db);

// Eğer "add_student" düğmesi tıklandıysa

if (isset($_POST['add_student'])) {
    // Formdan gelen verileri al

    $username = $_POST['name'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $usertype = "student";
    $user_math = $_POST['math'];
    $user_physics = $_POST['physics'];
    $user_biology = $_POST['biology'];
    $user_chemistry = $_POST['chemistry'];
    $user_scholarship = $_POST['scholarship'];
    // Kullanıcı adının veritabanında olup olmadığını kontrol et

    $check = "SELECT * FROM user WHERE username ='$username'";
    $check_user = mysqli_query($data, $check);
    // Kullanıcı adı varsa hata mesajı göster

    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        echo "<script type = 'text/javascript'>;
          alert('Username exist, try another one.'); </script";
    } else {


        // Kullanıcı adı veritabanında yoksa kullanıcıyı ekleyin

        $sql = "INSERT INTO user(username, phone, email, password, usertype, math, physics, biology, chemistry, scholarship) VALUES ('$username', '$user_phone', '$user_email', '$user_password', '$usertype', '$user_math', '$user_physics', '$user_biology', '$user_chemistry', '$user_scholarship')";

        $result = mysqli_query($data, $sql);
        // Veritabanına başarıyla eklendiğini bildirin

        if ($result) {
            echo "<script type = 'text/javascript'>;
          alert('Data Uploaded'); </script";
        } else {
            // Veritabanına eklenemediyse hata mesajını gösterin

            echo "Data Not Uploaded";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        div {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            position: relative;
        }

        h1 {
            margin-bottom: 20px;
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        div label {
            margin-bottom: 6px;
            font-weight: bold;
        }

        div input {
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        div input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        div input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back {
            margin-left: 30px;
        }
    </style>

</head>

<body>
    <div>
        <h1>ADDING STUDENT</h1> <!-- Yeni eklenen satır -->
        <form action="#" method="POST">

            <div>
                <label for="">Username</label>
                <input type="text" name="name" id="">
            </div>

            <div>
                <label for="">Email</label>
                <input type="email" name="email" id="">
            </div>

            <div>
                <label for="">Phone</label>
                <input type="number" name="phone" id="">
            </div>

            <div>
                <label for="">Password</label>
                <input type="text" name="password" id="">
            </div>

            <div>
                <label for="">Math</label>
                <input type="number" name="math" id="">
            </div>

            <div>
                <label for="">Phsyics</label>
                <input type="number" name="physics" id="">
            </div>

            <div>
                <label for="">Biology</label>
                <input type="number" name="biology" id="">
            </div>

            <div>
                <label for="">Chemistry</label>
                <input type="number" name="chemistry" id="">
            </div>

            <div>
                <label for="">Scholarship</label>
                <input type="number" name="scholarship" id="">
            </div>


            <div>
                <label for="">SUBMIT</label>
                <input type="submit" name="add_student" value="Add Student">
            </div>

        </form>

    </div>
    <a href="admin.php" class="back">Back to the homepage</a>
</body>

</html>