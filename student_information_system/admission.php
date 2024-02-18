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
// "admission" tablosundan verileri seç

$sql = "SELECT * from admission";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .container {
            background-color: #e7f3fe;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            padding: 12px;
        }

        .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }

        .table-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="table-title">REGISTRATION</div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Usertype</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $info['name']; ?></td>
                        <td><?php echo $info['email']; ?></td>
                        <td><?php echo $info['phone']; ?></td>
                        <td><?php echo $info['usertype']; ?></td>
                        <td><?php echo $info['password']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="admin.php" class="back">Back to the homepage</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>