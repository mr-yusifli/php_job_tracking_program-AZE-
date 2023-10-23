<?php 
require_once("header.php");
require_once("menu.php");
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">İş Əlavə etmə formu</h3><hr>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="works.php">İşlər siyahısı</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">İş Əlavə et</li>
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
     <div class="row">
       <div class="col-9">
             <form method="POST" action="config/islem.php">
                    <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                          <label for="kategoriAdi">İşin Adı:</label>
                          <input type="text" class="form-control"  name="isinadi" required>
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                          <label for="kategoriAdi">İşi aparan:(Ad / Soyad / Vəzifə )</label>
                          <input type="text" class="form-control"  name="isaparan">
                        </div> 
                        </div>
                    </div>
                <div class="form-group">
                  <label for="durum">Cinayət Kategoriyası:</label>
                   <select class="form-control" id="durum" name="kategori_id">
                   <?php 
                      $kategori = $pdo->prepare("SELECT * FROM kategori");
                      $kategori->execute();
                      while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $kategoricek['id'] ?>"><?php echo $kategoricek['kategori_adi'] ?></option>
                  <?php } ?>
                   </select>
            </div>
            <div class="form-group">
                <label for="mecelle">Açıxlaması:</label>
                <textarea  type="text" class="form-control" name="aciklama" rows="3"></textarea>
            </div>
            <div class="row">
        <div class="col-3">
           <div class="form-group">
        <label for="baslangictarihi">Başlama Tarihi:</label>
        <input type="date" class="form-control" id="baslangictarihi" name="baslangictarihi" required>
    </div>
 </div>
    <div class="col-3">
       <div class="form-group">
        <label for="bitistarihi">Bitiş Tarihi:</label>
        <input type="date" class="form-control" id="bitistarihi" name="bitistarihi" required>
    </div>
    </div>
    <div class="col-3">
    <div class="form-group">
      <label for="durum">Vəziyyət:</label>
        <select class="form-control" id="durum" name="durum" required>
          <option value="1">Tamamlandı</option>
           <option value="2">Davam edir</option>
           <option value="0">Başlamadı</option>
        </select>
    </div>
    </div>
    <div class="col-3">
    <div class="form-group">
      <label for="durum">Prioritet:</label>
        <select class="form-control" id="oncelik" name="oncelik" required>
          <option value="1">Təcili</option>
           <option value="2">Orta</option>
           <option value="0">Aşağı</option>
        </select>
    </div>
    </div>
</div>
<?php
$kullanici_id =  $_SESSION['id'];
?>
<input type="hidden" name="kullanici_id" value="<?php echo $kullanici_id; ?>">
    <button type="submit" class="btn btn-primary" name="isekle">Əlavə et</button>
 </form>
 
 
</div>  
<div class="col-3">
    <div class="vaxt mt-4 ml-2">
    <p class="gosterge">
    <i class="fas fa-info-circle" style="color: green; font-size: 24px;"></i> <!-- Bilgi simgesi -->
    <span id="gunFarkiMesaji"></span>
     </p>
    </div>

</div>
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