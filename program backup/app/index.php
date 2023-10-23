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
                            <div class="card-body">
                              <div class="row">
                              <div class="col-3">
                               <?php 
                               $query = "SELECT * FROM works";
                               $stmt = $pdo->prepare($query);
                               $stmt->execute();
                               $rowCount = $stmt->rowCount();
                               ?>
                               <div class="card-box bg-blue">
                               <div class="inner">
                               <h3 class="text-dark text-center" style="font-size: 1rem;">Ümumi iş sayısı</h3>
                               </div>
                               <div class="icon">
                                      <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                  </div>
                                   <p class="text-center " style="font-size: 3rem;"><strong><?php echo $rowCount; ?></strong>&nbsp;<span>Əd</span></p>
                               </div>
                           </div>

                           <div class="col-3">
                                <?php 
                              $query = "SELECT COUNT(*) FROM works WHERE durum = '1'";
                              $stmt = $pdo->prepare($query);
                              $stmt->execute();
                              $workCount = $stmt->fetchColumn();
                               ?>
                                <div class="card-box bg-green">
                                <div class="inner">
                                    <h3 class="text-light text-center" style="font-size: 1rem;">Tamamlanan işlər</h3>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-user-check"></i>
                                  </div>
                                   
                                    <p class="text-center text-light" style="font-size: 3rem;"><strong><?php echo $workCount; ?></strong>&nbsp;<span>Əd</span></p>
                                    </div>
                                </div>



                                <div class="col-3">
                                   <?php 
                                  $query = "SELECT COUNT(*) FROM works WHERE durum = '2'";
                                  $stmt = $pdo->prepare($query);
                                  $stmt->execute();
                                  $worksCount = $stmt->fetchColumn();
                                  ?>
                                    <div class="card-box bg-orange">
                                    <div class="inner">
                                    <h3 class="text-light text-center" style="font-size: 1rem;">Dəvam edən işlər</h3>
                                    </div>
                                    <div class="icon">
                                    <i class="fa-solid fa-file"></i>
                                  </div>
                                    <p class="text-center text-light" style="font-size: 3rem;"><strong><?php echo $worksCount; ?></strong>&nbsp;<span>Əd</span></p>
                                    </div>
                                </div>



                                <div class="col-3">
                                <?php 
                                  $query = "SELECT COUNT(*) FROM works WHERE durum = '0'";
                                  $stmt = $pdo->prepare($query);
                                  $stmt->execute();
                                  $workssCount = $stmt->fetchColumn();
                                  ?>
                                    <div class="card-box bg-red">
                                    <div class="inner">
                                    <h3 class="text-light text-center" style="font-size: 1rem;">Başlanmayan işlər</h3>
                                    </div>
                                    <div class="icon">
                                    <i class="fa-solid fa-rotate-right"></i>
                                  </div>
                                    <p class="text-center text-light" style="font-size: 3rem;"><strong><?php echo $workssCount; ?></strong>&nbsp;<span>Əd</span></p>
                                    </div>
                                </div>


                                <div class="col-3">
                                    <?php 
                                    $query = "SELECT MIN(baslangictarihi) AS min_date, MAX(bitistarihi) AS max_date FROM works";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->execute();
                                    $dates = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $startDate = $dates['min_date'];
                                    $endDate = $dates['max_date'];
                                    $query = "SELECT COUNT(*) FROM works WHERE DATEDIFF(bitistarihi, baslangictarihi) <= 3
                                        AND baslangictarihi >= :startDate
                                       AND bitistarihi <= :endDate";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->bindParam(':startDate', $startDate);
                                    $stmt->bindParam(':endDate', $endDate);
                                    $stmt->execute();
                                    $workstCount = $stmt->fetchColumn();

                                    ?>
                                     <div class="card-box bg-purpure">
                                    <div class="inner">
                                    <h3 class="text-light text-center" style="font-size: 1rem;">3 gündən az vaxtı qalan işlər</h3>
                                    </div>
                                    <div class="icon">
                                    <i class="fa-solid fa-bolt"></i>
                                  </div>
                                    <p class="text-center text-light" style="font-size: 3rem;"><strong><?php echo $workstCount; ?></strong>&nbsp;<span>Əd</span></p>
                                    </div>
                                </div>



                                <div class="col-3">
                                <?php 
                               $query = "SELECT * FROM admin";
                               $stmt = $pdo->prepare($query);
                               $stmt->execute();
                               $usersCount = $stmt->rowCount();
                               ?>
                                 <div class="card-box bg-darkblue">
                                    <div class="inner">
                                    <h3 class="text-light text-center" style="font-size: 1rem;">Ümumi İstifadəçilər</h3>
                                    </div>
                                    <div class="icon">
                                    <i class="fa-solid fa-users"></i>
                                  </div>
                                    <p class="text-center " style="font-size: 3rem;"><strong><?php echo $usersCount; ?></strong>&nbsp;<span>Əd</span></p>
                                    </div>
                                </div>
                                </div>
                              </div>
                              </div>
                              <div class="col-3">
                            <figure>
                              <div class="face top"><p class="clock" id="s"></p></div>
                              <div class="face front"><p class="clock" id="m"></p></div>
                              <div class="face left"><p class="clock" id="h"></p></div>
                            </figure>
                      </div>
                              </div>
                            </div>
                      
                        </div>
                    </div>
                       
                </div>
            </div>
            <!-- footer -->
<?php require_once("footer.php");?>