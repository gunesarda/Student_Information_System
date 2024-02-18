<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "studentinformation";

$data = mysqli_connect($host, $user, $password, $db);
// alınan "student_id" parametresini kontrol et

if ($_GET['student_id']) {
    // alınan öğrenci kimliğini sakla
    $user_id = $_GET['student_id'];
    // Veritabanında ilgili öğrenciyi silen SQL sorgusunu oluştur
    $sql = "DELETE FROM user WHERE id='$user_id'";
    // SQL sorgusunu çalıştır ve sonucu kontrol et

    $result = mysqli_query($data, $sql);
    // Eğer sorgu başarılıysa

    if ($result) {
        // Silme işlemi başarılı mesajını kaydet, kullanıcıyı öğrenci listesine yönlendir

        $_SESSION['message'] = 'Student Deleted.';
        header("location:student_list.php");
    }
}
