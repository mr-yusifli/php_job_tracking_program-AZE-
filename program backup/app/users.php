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
                        <h4>İstifadəçilər</h4>
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

                          
                                $query = "SELECT * FROM admin";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();
                            
                            ?>
                        <table id="workTable" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">KOD</th>
                                    <th style="width: 80px;">E-poçt ünvanı</th>
                                    <th style="width: 110px;">Ad</th>
                                    <th style="width: 70px;">Soyad</th>
                                    <th style="width: 70px;">Səlahiyyət</th>
                                    <th style="width: 100px;">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($admincek = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                       <td width="20"><?php echo $admincek['id']; ?></td>
                                       <td><?php echo $admincek['email']; ?></td>
                                       <td><?php echo $admincek['name']; ?></td>
                                       <td><?php echo $admincek['soyad']; ?></td>
                                       <td>
                                            <?php if ($admincek['yetki'] == '1') { ?>
                                                <p class="text-success border border-success text-center p-2">Super Admin</p>
                                            <?php }else{?>
                                                <p class="text-danger border border-danger text-center p-2">İstifadəçi</p>
                                           <?php } ?>
                                        </td>
                                        <td>
                                            <a href="user_update.php?id=<?php echo $admincek['id'] ?>" class="btn btn-primary">Yeniləyin</a>
                                            <?php
                                             $yetki = $_SESSION['yetki'];
                                            if($yetki == 1){?>
                                        <a href="config/islem.php?kullanicisil&id=<?php echo $admincek['id'] ?>" class="btn btn-danger">Sil</a>
                                        <?php }else { ?>
                                            <a href="" class="btn btn-danger" style="display: none;" >Sil</a>
                                         <?php } ?>   
                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-md-4 float-right">
                            <a href="user_add.php" class="btn btn-info float-right mb-2" style="background-color:#02f01e;border:none;color:white;"><i class="fa-solid fa-plus"></i> Yeni Əlavə et</a>
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
