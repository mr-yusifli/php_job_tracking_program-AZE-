<?php
include "config/baglanti.php"; 
// $baglanti = new Veritabani();

?>

<!DOCTYPE html>
<html lang="az">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daxil olun</title>
    <!-- Bootstrap CSS dosyasını ekleyin -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert CSS dosyasını ekleyin -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Daxil olun
                        <?php
                        if (isset($_GET['durum'])) {
                            if ($_GET['durum'] === 'ok') {
                                $mesaj = "Uğurlu giriş!";
                                $alert_class = "alert-success";
                                echo '<script>
                                        setTimeout(function () {
                                            window.location.href = "index.php";
                                        }, 2000);
                                    </script>';
                            } elseif ($_GET['durum'] === 'no') {
                                $mesaj = "Yanlış giriş!";
                                $alert_class = "alert-danger";
                            }
                        }
                       ?>
                    </div>
                    <div class="card-body">
                    <?php if (isset($mesaj)) : ?>
                      <div class="alert <?php echo $alert_class; ?>">
                       <?php echo $mesaj; ?>
                     </div>
                     <?php endif; ?>
                    <form  method="POST" action="config/islem.php">
                            <div class="form-group">
                                <label for="email">E-poçt Ünvanı</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Şifrə</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="kullanicigirisi">Daxil ol</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php
        // $sifre="R20232023.";
        // $sifrele=md5(sha1($sifre));
        // echo $sifrele;
        ?>
    </div>

      <!-- Bootstrap JS ve jQuery dosyalarını ekleyin -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert JS dosyasını ekleyin -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>
    
   
</body>
</html>
