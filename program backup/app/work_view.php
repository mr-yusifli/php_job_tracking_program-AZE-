<?php 
require_once("header.php");
require_once("menu.php");

$work=$pdo->prepare("SELECT * FROM works where id=?");
$work->execute(array(
@$_GET['id']
));

$workcek=$work->fetch(PDO::FETCH_ASSOC);

$is_kategorisi_id = $workcek['kategori_id'];

?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">İş görüntülə</h3><hr>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="works.php">İşlər siyahısı</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><b style="color:red;"><?php echo $workcek['isinadi']; ?></b>&nbsp;&nbsp;  İşinə baxırsız</li>
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
                          <input type="text" class="form-control"  name="isinadi" value="<?php echo $workcek['isinadi']; ?>" disabled>
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                          <label for="kategoriAdi">İşi aparan:(Ad / Soyad / Vəzifə )</label>
                          <input type="text" class="form-control"  name="isaparan" value="<?php echo $workcek['isaparan']; ?>" disabled>
                        </div> 
                        </div>
                    </div>
                <div class="form-group">
                  <label for="durum">Cinayət Kategoriyası:</label>
                   <select class="form-control" id="durum" name="kategori_id" disabled>
                   <?php 
                     $kategori = $pdo->prepare("SELECT * FROM kategori");
                     $kategori->execute();
                     while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                     $kategori_id = $kategoricek['id'];
                     $kategori_adi = $kategoricek['kategori_adi'];
                     $selected = ($kategori_id == $is_kategorisi_id) ? "selected" : "";
                     echo "<option value='$kategori_id' $selected>$kategori_adi</option>";
                    }
                    ?>
                   </select>
            </div>
            <div class="form-group">
                <label for="mecelle">Açıxlaması:</label>
                <textarea  type="text" class="form-control" name="aciklama" rows="3" disabled><?php echo $workcek['aciklama']; ?></textarea>
            </div>
            <div class="row">
        <div class="col-3">
           <div class="form-group">
        <label for="baslangictarihi">Başlama Tarihi:</label>
        <input type="date" class="form-control" id="baslangictarihi" name="baslangictarihi" value="<?php echo $workcek['baslangictarihi']; ?>" disabled>
    </div>
 </div>
    <div class="col-3">
       <div class="form-group">
        <label for="bitistarihi">Bitiş Tarihi:</label>
        <input type="date" class="form-control" id="bitistarihi" name="bitistarihi" value="<?php echo $workcek['bitistarihi']; ?>" disabled>
    </div>
    </div>
    <div class="col-3">
    <div class="form-group">
      <label for="durum">Vəziyyət:</label>
        <select class="form-control" id="durum" name="durum" disabled>
          <option value="1"<?php echo ($workcek['durum'] == 1) ? "selected" : ""; ?>>Tamamlandı</option>
           <option value="2"<?php echo ($workcek['durum'] == 2) ? "selected" : ""; ?>>Davam edir</option>
           <option value="0"<?php echo ($workcek['durum'] == 0) ? "selected" : ""; ?>>Başlamadı</option>
        </select>
    </div>
    </div>
    <div class="col-3">
    <div class="form-group">
        <label for="durum">Prioritet:</label>
        <select class="form-control" id="oncelik" name="oncelik" disabled>
            <option value="1" <?php echo ($workcek['oncelik'] == 1) ? "selected" : ""; ?>>Təcili</option>
            <option value="2" <?php echo ($workcek['oncelik'] == 2) ? "selected" : ""; ?>>Orta</option>
            <option value="0" <?php echo ($workcek['oncelik'] == 0) ? "selected" : ""; ?>>Aşağı</option>
        </select>
    </div>
</div>

</div>
<?php
$kullanici_id =  $_SESSION['id'];
?>
<input type="hidden" name="kullanici_id" value="<?php echo $kullanici_id; ?>">
<input type="hidden" name="id" value="<?php echo  $workcek['id']; ?>">

    <a href="works.php" class="btn btn-danger bagla"><i class="fa-solid fa-reply"></i> Bağla</a>
    <button type="submit" class="btn btn-success tamamlandi" name="tamamlandi"><i class="fa-solid fa-check-to-slot"></i> İş tamamlandı</button>
    <button type="submit" class="btn btn-danger bagla" name="iptaledildi"><i class="fa-solid fa-xmark"></i> Ləğv edildi</button>
    <button type="submit" class="btn btn-warning" name="devamedir"><i class="fa-solid fa-book"></i> Dəvam edir</button>
 </form>
 
 
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