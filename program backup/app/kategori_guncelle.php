<?php 
require_once("header.php");
require_once("menu.php");

$kategori=$pdo->prepare("SELECT * FROM kategori where id=?");
$kategori->execute(array(
@$_GET['id']
));

$kategoricek=$kategori->fetch(PDO::FETCH_ASSOC);



?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Kategoriya yeniləmə formu</h3><hr>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="categories.php">Kategoriyalar</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kategoriya yenilə</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
             
                    <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <?php
                
                    //  if (isset($_GET['durum']) && $_GET['durum'] == "ok") {
                    //    echo '<div class="alert alert-success"Uğurla yerinə yetirildi.</div>';
                    //   echo '<script>
                    //          setTimeout(function(){
                    //          window.location.href = "categories.php";
                    //         }, 2000);
                    //         </script>';
                    //     } elseif (isset($_GET['durum']) && $_GET['durum'] == "no") {
                    //       echo '<div class="alert alert-danger">Xəta baş verdi</div>';
                    //           }

                    //   var_dump($kategoricek);
                            ?>

            <form method="POST" action="config/islem.php">
            <div class="form-group">
                <label for="kategoriAdi">Kategoriya Adı:</label>
                <input type="text" class="form-control"  name="kategori_adi" value="<?php echo $kategoricek['kategori_adi']; ?>">
            </div>
            <div class="form-group">
                <label for="mecelle">Məcəllə:</label>
                <input type="text" class="form-control"  name="mecelle" value="<?php echo $kategoricek['mecelle']; ?>">
            </div>
            <div class="form-group">
                <label for="durum">Vəziyyət:</label>
                <select class="form-control"  name="durum" >
                    <option value="1" <?php if ($kategoricek['durum'] == '1') echo 'selected'; ?>>Aktif</option>
                    <option value="0" <?php if ($kategoricek['durum'] == '0') echo 'selected'; ?>>Pasif</option>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $kategoricek['id']; ?>">
            <button type="submit" class="btn btn-primary" name="kategoriguncelle">Yeniləyin</button>
        </form>
                      
                    </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- footer -->
            <?php 
            require_once("footer.php");
           ?>