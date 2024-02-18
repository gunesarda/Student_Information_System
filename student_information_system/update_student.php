<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "studentinformation";

$data = mysqli_connect($host, $user, $password, $db);

// Eğer "student_id" parametresi belirtilmemişse hata mesajı göster

if (!isset($_GET['student_id'])) {
    echo "Invalid request";
    exit;
}
// Öğrenci ID'sini al
$student_id = $_GET['student_id'];
// Veritabanından öğrenci bilgilerini çek
$sql = "SELECT * FROM user WHERE id = $student_id";
$result = mysqli_query($data, $sql);
// Hata kontrolü
if (!$result) {
    echo "Error fetching user information: " . mysqli_error($data);
    exit;
}
// Bilgileri dizi olarak al
$info = $result->fetch_assoc();
// Eğer öğrenci bulunamazsa hata mesajı göster
if (!$info) {
    echo "User not found";
    exit;
}
// Form gönderildiyse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Yeni bilgileri al
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newPhone = $_POST['newPhone'];
    $newPassword = $_POST['newPassword'];
    $newMath = $_POST['newMath'];
    $newPhysics = $_POST['newPhysics'];
    $newBiology = $_POST['newBiology'];
    $newChemistry = $_POST['newChemistry'];
    $newScholarship = $_POST['newScholarship'];

        // Güncelleme sorgusunu hazırla

    $updateQuery = "UPDATE user SET 
                    username='$newUsername', 
                    email='$newEmail', 
                    phone='$newPhone', 
                    password='$newPassword', 
                    math='$newMath', 
                    physics='$newPhysics', 
                    biology='$newBiology', 
                    chemistry='$newChemistry', 
                    scholarship='$newScholarship' 
                    WHERE id=$student_id";
    // Güncelleme sorgusunu çalıştır
    $updateResult = mysqli_query($data, $updateQuery);
    // Güncelleme başarılıysa mesaj göster ve anasayfaya yönlendir
    if ($updateResult) {
        $_SESSION['message'] = "User information updated successfully!";
        header("location: student_list.php");
        exit;
    } else {
        echo "Error updating user information: " . mysqli_error($data);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: gray;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .back {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Update User Information</h1>

    <form method="POST">
        <label for="newUsername">Username:</label>
        <input type="text" id="newUsername" name="newUsername" value="<?php echo $info['username']; ?>" required>

        <label for="newEmail">Email:</label>
        <input type="email" id="newEmail" name="newEmail" value="<?php echo $info['email']; ?>" required>

        <label for="newPhone">Phone:</label>
        <input type="text" id="newPhone" name="newPhone" value="<?php echo $info['phone']; ?>" required>

        <label for="newPassword">Password:</label>
        <input type="password" id="newPassword" name="newPassword" value="<?php echo $info['password']; ?>" required>

        <label for="newMath">Math:</label>
        <input type="text" id="newMath" name="newMath" value="<?php echo $info['math']; ?>" required>

        <label for="newPhysics">Physics:</label>
        <input type="text" id="newPhysics" name="newPhysics" value="<?php echo $info['physics']; ?>" required>

        <label for="newBiology">Biology:</label>
        <input type="text" id="newBiology" name="newBiology" value="<?php echo $info['biology']; ?>" required>

        <label for="newChemistry">Chemistry:</label>
        <input type="text" id="newChemistry" name="newChemistry" value="<?php echo $info['chemistry']; ?>" required>

        <label for="newScholarship">Scholarship:</label>
        <input type="text" id="newScholarship" name="newScholarship" value="<?php echo $info['scholarship']; ?>" required>

        <button type="submit">Update</button>
    </form>
    
    <a href="admin.php" class="back">Back to the homepage</a>
</body>
</html>
