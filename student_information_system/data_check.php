<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "studentinformation";
// Veritabanı bağlantısını oluştur, bağlantı başarısız olursa hata mesajı göster ve script'i sonlandır

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("connection error");
}
// Formdan gelen "apply" düğmesine basıldığını kontrol et

if (isset($_POST['apply'])) {
    // Form verilerini al

    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_usertype = $_POST['usertype'];
    $data_password = $_POST['password'];

    // Veritabanına yeni kayıt ekleme
    $sql = "INSERT INTO admission(name, email, phone, usertype, password)VALUES ('$data_name', '$data_email', '$data_phone', '$data_usertype', '$data_password')";
    // Sorguyu çalıştır ve sonucu kontrol et

    $result = mysqli_query($data, $sql);
    // Eğer sorgu başarılıysa

    if ($result) {
        // Başarılı mesajını kaydet, kullanıcıyı ana sayfaya yönlendir

        $_SESSION['message'] = "Successful";
        header("location:index.php");
    } else {
        // Başarısız mesajını kaydet

        $_SESSION['message'] = "Failed";
    }
}
