<?php 
require_once("header.php");
require_once("menu.php");
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
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
                    <div class="card-header">
                        <div class="container">
                        <form action="" method="GET">
                        <div class="row">
                            <div class="col-2">
                              <div class="form-group">
                                <a href="works.php?oncelik=1" class="btn btn-danger form-control tecili" name="tecili"><i class="fa-solid fa-fire"></i> Təcili</a>
                              </div>
                          </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <a href="works.php?oncelik=2" class="btn btn-warning form-control orta" name="orta"><i class="fa-solid fa-align-center"></i> Orta</a>
                                </div>
                            </div>
                            <div class="col-2">
                              <div class="form-group">
                                <a href="works.php?oncelik=0" class="btn btn-info form-control asaqi" name="asaqi"><i class="fa-solid fa-arrow-down"></i> Aşağı</a>
                              </div>
                            </div>
                            <div class="col-2">
                              <div class="form-group">
                                <a href="works.php" class="btn btn-success form-control hamisi" name="hamisi"><i class="fa-solid fa-filter"></i> Hamısı</a>
                              </div>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
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
                          <?php

                            // Öncelik filtrelemesi
                            if (isset($_GET['oncelik'])) {
                                $oncelik = $_GET['oncelik'];
                                $query = "SELECT * FROM works WHERE oncelik = :oncelik";
                                $stmt = $pdo->prepare($query);
                                $stmt->bindParam(':oncelik', $oncelik);
                                $stmt->execute();
                            } else {
                                $query = "SELECT * FROM works";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();
                            }
                            ?>
                        <table id="workTable" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">KOD</th>
                                    <th style="width: 80px;">İşin Adı</th>
                                    <th style="width: 110px;">Kısa açıxlaması</th>
                                    <th style="width: 70px;">Başlama tarixi</th>
                                    <th style="width: 70px;">Bitirmə tarixi</th>
                                    <th style="width: 80px;">İşi aparan</th>
                                    <th style="width: 50px;">Vəziyyəti</th>
                                    <th style="width: 50px;">Prioritet</th>
                                    <th style="width: 100px;">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                // $work = $pdo->prepare("SELECT * FROM works");
                                // $work->execute();
                                // while ($workcek = $work->fetch(PDO::FETCH_ASSOC)) { 
                                    while ($workcek = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                       <td width="20"><?php echo $workcek['id']; ?></td>
                                       <td><?php echo $workcek['isinadi']; ?></td>
                                       <td><?php echo mb_substr($workcek['aciklama'],0,50,'UTF-8'); ?>...</td>
                                       <?php $azericeBaslangicTarihi = tarihAzerice($workcek['baslangictarihi']); $azericeBitisTarihi = tarihAzerice($workcek['bitistarihi']);?>
                                       <td><?php echo $azericeBaslangicTarihi; ?></td>
                                       <td><?php echo $azericeBitisTarihi; ?></td>
                                       <td><?php echo $workcek['isaparan']; ?></td>
                                       <td>
                                            <?php if ($workcek['durum'] == '1') { ?>
                                                <p class="text-success border border-success text-center p-2">Tamamlandı</p>
                                            <?php } elseif($workcek['durum'] == '2') { ?>
                                                <p class="text-warning border border-warning text-center p-2">Davam edir</p>
                                            <?php }else{?>
                                                <p class="text-danger border border-danger text-center p-2">Başlamadı</p>
                                           <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($workcek['durum'] == '1') : ?>
                                                <p class="text-danger font-weight-bold"><i class="fa-solid fa-circle-check"></i> Yoxdur</p>
                                            <?php elseif ($workcek['oncelik'] == '1') : ?>
                                                <p class="text-danger border border-danger text-center p-2">Təcili</p>
                                            <?php elseif ($workcek['oncelik'] == '2') : ?>
                                                <p class="text-warning border border-warning text-center p-2">'Orta</p>
                                            <?php else : ?>
                                                <p class="text-success border border-primary text-center p-2">Aşağı</p>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php if ($workcek['durum'] == '1') { ?>
                                             <p class="text-dark font-weight-bold"><i class="fa-solid fa-check-to-slot"></i> Tamamlandı</p> 
                                             <?php }else { ?>
                                            <a href="work_view.php?id=<?php echo $workcek['id'] ?>" class="btn btn-primary btn-sm p-2">Görüntülə</a>
                                             <?php } ?>
                                            <!-- <a href="config/islem.php?worksil&id=<?php echo $workcek['id'] ?>" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" style="color:white;"></i> -->
                                        </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-md-4 float-right">
                            <a href="work_add.php" class="btn btn-info float-right mb-2" style="background-color:#02f01e;border:none;color:white;"><i class="fa-solid fa-plus"></i> Yeni Əlavə et</a>
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
