<?php
error_reporting(0);
session_start();
// Eğer kullanıcı oturumda değilse, giriş sayfasına yönlendir
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
// Eğer kullanıcı admin ise, giriş sayfasına yönlendir
elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "studentinformation";

$data = mysqli_connect($host, $user, $password, $db);

// Kullanıcı adına göre filtrelenmiş sorgu
$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE usertype='student' AND username='$username'";
$result = mysqli_query($data, $sql);

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
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Student Information List</h1>
    <?php
    // Oturumdan gelen mesajı ekrana yazdır
    if ($_SESSION['message']) {
        echo $_SESSION['message'];
    }
    // Oturumdan gelen mesaj değişkenini temizle
    unset($_SESSION['message']);
    ?>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Math</th>
            <th>Physics</th>
            <th>Biology</th>
            <th>Chemistry</th>
            <th>Scholarship</th>
        </tr>
        <?php
        // Sonuç kümesindeki her öğrenci bilgisini döngü ile yazdır
        while ($info = $result->fetch_assoc()) {
        ?>

            <tr>
                <td>
                    <?php echo "{$info['username']}" ?>
                </td>
                <td>
                    <?php echo "{$info['phone']}" ?>
                </td>
                <td>
                    <?php echo "{$info['email']}" ?>
                </td>
                <td>
                    <?php echo "{$info['password']}" ?>
                </td>

                <td>
                    <?php echo "{$info['math']}" ?>
                </td>
                <td>
                    <?php echo "{$info['physics']}" ?>
                </td>
                <td>
                    <?php echo "{$info['biology']}" ?>
                </td>
                <td>
                    <?php echo "{$info['chemistry']}" ?>
                </td>
                <td>
                    <?php echo "%{$info['scholarship']}" ?>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
    <a href="student.php">Back to the homepage</a>
</body>

</html>