<?php
// Veritabanı bilgilerini tanımlayın
$host = "localhost"; // Veritabanı sunucusunun adresi
$dbname = "fortetek_program"; // Veritabanı adı
$username = "fortetek_program"; // Veritabanı kullanıcı adı
$password = "12345678"; // Veritabanı parolası
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
}
?>
