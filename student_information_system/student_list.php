<?php

error_reporting(0);
session_start();
// Eğer kullanıcı oturumda değilse, giriş sayfasına yönlendir
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} 
// Eğer kullanıcı öğrenci ise, giriş sayfasına yönlendir
elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}
// Veritabanı bağlantı bilgileri
$host = "localhost";
$user = "root";
$password = "";
$db = "studentinformation";
// Veritabanına bağlan
$data = mysqli_connect($host, $user, $password, $db);
// Tüm öğrenci bilgilerini getiren sorgu
$sql = "SELECT * FROM user WHERE usertype='student'";
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

        th, td {
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
            <th>Delete</th>
            <th>Update</th>
        </tr>
        
        <!-- sonuç kümesindeki her öğrenci bilgisini döngü ile yazdır -->

        <?php
        while ($info = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo "{$info['username']}" ?></td>
                <td><?php echo "{$info['phone']}" ?></td>
                <td><?php echo "{$info['email']}" ?></td>
                <td><?php echo "{$info['password']}" ?></td>
                <td><?php echo "{$info['math']}" ?></td>
                <td><?php echo "{$info['physics']}" ?></td>
                <td><?php echo "{$info['biology']}" ?></td>
                <td><?php echo "{$info['chemistry']}" ?></td>
                <td><?php echo "%{$info['scholarship']}" ?></td>
                <td>
                    <a onClick="javascript:return confirm('Do you confirm to delete this student?');" 
                       href='delete.php?student_id=<?php echo $info['id'] ?>'>Delete
                    </a>
                </td>
                <td>
                    <a href='update_student.php?student_id=<?php echo $info['id'] ?>'>Update</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <a href="admin.php" class="back">Back to the homepage</a>
</body>
</html>
