<?php 
require_once("header.php");
require_once("menu.php");
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">İstifadəçi Əlavə etmə formu</h3><hr>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="users.php">İstifadəçilər</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">İstifadəçi Əlavə et</li>
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
              
            <form method="POST" action="config/islem.php" class="col-8">
            <div class="form-group">
                <label for="kategoriAdi">Adı:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="mecelle">Soyad:</label>
                <input type="text" class="form-control"  name="soyad">
            </div>
            <div class="form-group">
                <label for="mecelle">E-poçt:</label>
                <input type="email" class="form-control"  name="email">
            </div>
            <div class="form-group">
              <label for="mecelle">Şifrə:</label>
              <div class="input-group">
                  <input type="password" class="form-control" name="password"  id="password">
                  <div class="input-group-append">
                      <span class="input-group-text">
                          <i class="fa-regular fa-eye" style="font-size: 1.4rem; cursor:pointer;" onclick="togglePassword()"></i>
                          <i class="fa-solid fa-eye-slash" style="font-size: 1.4rem; cursor:pointer;" onclick="togglePassword()"></i>
                      </span>
                  </div>
              </div>
              <p id="passwordMessage" style="color: red;"></p>
          </div>

            <div class="form-group">
                <label for="durum">Vəziyyət:</label>
                <select class="form-control" id="durum" name="durum">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="kullaniciekle">Əlavə et</button>
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