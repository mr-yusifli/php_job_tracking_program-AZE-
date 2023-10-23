 <?php
   function tarihAzerice($tarih) {
    $aylar = array(
       "Yan.", "Fev.", "Mart", "Aprel", "May", "İyun",
        "İyul", "Avq.", "Sent.", "Okt.", "Noyabr", "Dekabr"
     );
        $parcalanmisTarih = explode("-", $tarih);
        $gun = intval($parcalanmisTarih[2]);
        $ay = intval($parcalanmisTarih[1]);
        $yil = intval($parcalanmisTarih[0]);
        $azericeTarih = $gun . '-' . $aylar[$ay - 1] . '-' . substr($yil, -2);
        return $azericeTarih;
       }
        
?>