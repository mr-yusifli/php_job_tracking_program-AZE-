<?php 
require_once("header.php");
require_once("menu.php");
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <!-- <h3 class="page-title mb-0 p-0">Blank Page</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
                        </ol>
                    </nav>
                </div> -->
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
                <?php
                ?>
                <div class="card">
                    <div class="card-body">
                    <?php if (@$_GET['durum']=="ok") { ?>
                        <div class="alert alert-success mt-2 mb-2 alert-dismissible fade show" id="myAlert" role="alert">
                                Əməliyyatınız uğurla tamamlandı.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="closeAlert">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                              </div>

                        <?php   } elseif(@$_GET['durum']=="no"){ ?>
                            <div class="alert alert-danger mt-2 mb-2 alert-dismissible fade show" id="myAlert" role="alert">Əməliyyatınız uğursuz oldu.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="closeAlert">
                            <span aria-hidden="true">&times;</span>
                           </button>
                            </div>
                          <?php } ?><br>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategoriya Adı</th>
                                    <th>Məcelle</th>
                                    <th>Vəziyyət</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $kategori = $pdo->prepare("SELECT * FROM kategori");
                                $kategori->execute();
                                while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $kategoricek['id'] ?></td>
                                        <td><?php echo $kategoricek['kategori_adi'] ?></td>
                                        <td><?php echo $kategoricek['mecelle'] ?></td>
                                        <td>
                                            <?php if ($kategoricek['durum'] == '1') { ?>
                                                <button class="btn btn-success">Aktif</button>
                                            <?php } else { ?>
                                                <button class="btn btn-danger">Pasif</button>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="kategori_guncelle.php?id=<?php echo $kategoricek['id'] ?>" class="btn btn-primary">Yeniləyin</a>
                                           <a href="config/islem.php?kategorisil&id=<?php echo $kategoricek['id'] ?>" class="btn btn-danger">Sil</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-md-4 float-right">
                            <a href="category_add.php" class="btn btn-info float-right mb-2">Kategoriya Əlavə et</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- footer -->
    <?php 
    require_once("footer.php");
    ?>
