<?php 
session_start();
require_once ("baglanti.php");

// Kullanici Girisi
if (isset($_POST['kullanicigirisi'])) {
    $email = $_POST["email"];
    $password = md5(sha1($_POST["password"]));
    $query = "SELECT * FROM admin WHERE email = :email AND password = :password AND durum = '1'";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $row['name'];
        $soyad = $row['soyad'];
        $yetki = $row['yetki'];
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name; 
        $_SESSION['surname'] = $soyad; 
        $_SESSION['yetki'] = $yetki; 
        $_SESSION['id'] = $row['id'];
        header("Location:../login.php?durum=ok");
        exit;
    } else {
        header("Location:../login.php?durum=no");
        exit;
    }
}

// Kategori Ekleme 
if (isset($_POST['kategoriekle'])) {
    $kategoriAdi = $_POST['kategori_adi'];
    $mecelle = $_POST['mecelle'];
    $durum = $_POST['durum'];
    $query = "INSERT INTO kategori (kategori_adi, mecelle, durum) VALUES (:kategori_adi, :mecelle, :durum)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':kategori_adi', $kategoriAdi);
    $stmt->bindParam(':mecelle', $mecelle);
    $stmt->bindParam(':durum', $durum);
    $ekle=$stmt->execute();
    if($ekle){
        header("Location: ../category_add.php?durum=ok");
        exit;
    }else{
        header("Location: ../category_add.php?durum=no");
        exit;
    }

}
// Kategori Güncelleme

if (isset($_POST['kategoriguncelle'])) {
    $id = $_POST['id'];
    $kategoriAdi = $_POST['kategori_adi'];
    $mecelle = $_POST['mecelle'];
    $durum = $_POST['durum'];
    $query = "UPDATE kategori SET kategori_adi = :kategori_adi, mecelle = :mecelle, durum = :durum WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':kategori_adi', $kategoriAdi);
    $stmt->bindParam(':mecelle', $mecelle);
    $stmt->bindParam(':durum', $durum);
    $stmt->bindParam(':id', $id);
    
    $guncelle = $stmt->execute();
    
    if ($guncelle) {
        header("Location: ../categories.php?durum=ok");
        exit;
    } else {
        header("Location: ../kategori_guncelle.php?durum=no");
        exit;
    }
}

// Kategori Sil
if (isset($_GET['kategorisil']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sil = $pdo->prepare("DELETE FROM kategori WHERE id = ?");
    $sil->execute([$id]);

    if ($sil) {
        header("Location: ../categories.php?durum=ok");
        exit;
    } else {
        header("Location: ../categories.php?durum=no");
        exit;
    }
}
// Is ekleme kodu

if (isset($_POST['isekle'])) {
    $isinadi = $_POST['isinadi'];
    $isaparan = $_POST['isaparan'];
    $kategori_id = $_POST['kategori_id'];
    $aciklama = $_POST['aciklama'];
    $baslangictarihi = $_POST['baslangictarihi'];
    $bitistarihi = $_POST['bitistarihi'];
    $durum = $_POST['durum'];
    $oncelik = $_POST['oncelik'];
    $kullanici_id = $_POST['kullanici_id'];

    $query = "INSERT INTO works (isinadi, isaparan, kategori_id, aciklama, baslangictarihi, bitistarihi, durum, oncelik, kullanici_id) VALUES (:isinadi, :isaparan, :kategori_id, :aciklama, :baslangictarihi, :bitistarihi, :durum, :oncelik, :kullanici_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':isinadi', $isinadi);
    $stmt->bindParam(':isaparan', $isaparan);
    $stmt->bindParam(':kategori_id', $kategori_id);
    $stmt->bindParam(':aciklama', $aciklama);
    $stmt->bindParam(':baslangictarihi', $baslangictarihi);
    $stmt->bindParam(':bitistarihi', $bitistarihi);
    $stmt->bindParam(':durum', $durum);
    $stmt->bindParam(':oncelik', $oncelik);
    $stmt->bindParam(':kullanici_id', $kullanici_id);
    $ekle=$stmt->execute();
    if($ekle){
        header("Location: ../works.php?durum=ok");
        exit;
    }else{
        header("Location: ../works.php?durum=no");
        exit;
    }

}
// Is tamamlandi
if (isset($_POST['tamamlandi'])) {
    $id = $_POST['id'];
    $durum = 1; 
    $query = "UPDATE works SET durum = :durum WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':durum', $durum);
    $stmt->bindParam(':id', $id);
    $guncelle = $stmt->execute();

    if ($guncelle) {
        header("Location: ../works.php?durum=ok");
        exit;
    } else {
        header("Location: ../works.php?durum=no");
        exit;
    }
}

// is davam edir

if (isset($_POST['devamedir'])) {
    $id = $_POST['id'];
    $durum = 2; 
    $query = "UPDATE works SET durum = :durum WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':durum', $durum);
    $stmt->bindParam(':id', $id);
    $guncelle = $stmt->execute();

    if ($guncelle) {
        header("Location: ../works.php?durum=ok");
        exit;
    } else {
        header("Location: ../works.php?durum=no");
        exit;
    }
}

// is legv et
if (isset($_POST['iptaledildi'])) {
    $id = $_POST['id'];
    $sil = $pdo->prepare("DELETE FROM works WHERE id = :id");
    $sil->bindParam(':id', $id);
    $sil->execute();

    if ($sil) {
        header("Location: ../works.php?durum=ok");
        exit;
    } else {
        header("Location: ../works.php?durum=no");
        exit;
    }
}

// İstifadeci elave et
if (isset($_POST['kullaniciekle'])) {
    $name = $_POST['name'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $rawPassword = $_POST['password']; 
    $password = md5(sha1($rawPassword));
    $durum = $_POST['durum'];
    $query = "INSERT INTO admin (name, soyad, email, password, durum) VALUES (:name, :soyad, :email, :password, :durum)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':soyad', $soyad);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':durum', $durum);
    $ekle = $stmt->execute();

    if ($ekle) {
        header("Location: ../users.php?durum=ok");
        exit;
    } else {
        header("Location: ../users.php?durum=no");
        exit;
    }
}

// Kullanici Guncelleme islemi

if (isset($_POST['kullaniciguncelle'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $durum = $_POST['durum'];
    if (!empty($_POST['password'])) {
        $password = md5(sha1($_POST['password']));
        $query = "UPDATE admin SET name = :name, soyad = :soyad, email = :email, password = :password, durum = :durum WHERE id = :id";
    } else {
        $query = "UPDATE admin SET name = :name, soyad = :soyad, email = :email, durum = :durum WHERE id = :id";
    }

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':soyad', $soyad);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':durum', $durum);

    if (!empty($_POST['password'])) {
        $stmt->bindParam(':password', $password);
    }

    $guncelle = $stmt->execute();

    if ($guncelle) {
        header("Location: ../users.php?durum=ok");
        exit;
    } else {
        header("Location: ../users.php?durum=no&error=" . implode(" ", $stmt->errorInfo()));
        exit;
    }
}

// Kullanici Sil

if (isset($_GET['kullanicisil']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sil = $pdo->prepare("DELETE FROM admin WHERE id = ?");
    $sil->execute([$id]);

    if ($sil) {
        header("Location: ../users.php?durum=ok");
        exit;
    } else {
        header("Location: ../users.php?durum=no");
        exit;
    }
}

?>