 <!-- ============================================================== -->
 <footer class="footer"> © 2023 Developer  by <a target="_blank" href="https://www.instagram.com/mr_yusifli_/">Royal Yusifli </a></footer>
 </div>
    </div>
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.13.6/i18n/az-AZ.json"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script>
    var mySwitch = document.getElementById("flexSwitchCheckDefault");
    var myCollapse = new bootstrap.Collapse(document.getElementById("collapseExample"), {
        toggle: false
    });

    mySwitch.addEventListener("change", function () {
        if (mySwitch.checked) {
            myCollapse.show();
        } else {
            myCollapse.hide();
        }
    });
</script>
<!-- Kapat -->
<script>
    $(document).ready(function () {
        $("#closeAlert").click(function () {
            $("#myAlert").hide();
            // location.reload();
        });
    });
</script>


    <!-- Datable Kodu -->
    <script>
      $(document).ready(function() {
    $('#workTable').DataTable({
        "language": {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/az-AZ.json',
        },
      
    });
});
</script>
<!-- Tarih hesablama kodu -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const baslangicTarihiInput = document.getElementById('baslangictarihi');
    const bitisTarihiInput = document.getElementById('bitistarihi');
    const gunFarkiMesaji = document.getElementById('gunFarkiMesaji');
    
    // Tarih alanları değiştiğinde gün farkını hesapla ve göster
    baslangicTarihiInput.addEventListener('change', hesaplaVeGoster);
    bitisTarihiInput.addEventListener('change', hesaplaVeGoster);
    
    function hesaplaVeGoster() {
        const baslangicTarihi = new Date(baslangicTarihiInput.value);
        const bitisTarihi = new Date(bitisTarihiInput.value);
        
        if (isNaN(baslangicTarihi) || isNaN(bitisTarihi)) {
            gunFarkiMesaji.textContent = "Yanlış tarix formatı!";
        } else {
            const gunFarki = Math.abs((bitisTarihi - baslangicTarihi) / (24 * 60 * 60 * 1000));
            gunFarkiMesaji.textContent = `Qalan vaxt: ${gunFarki} Gün `;
        }
    }
});
</script>
<!-- Sifre goster  -->
<script>
    function togglePassword() {
        var passwordInput = document.getElementById('password');
        var icon1 = document.querySelector('.fa-regular.fa-eye');
        var icon2 = document.querySelector('.fa-solid.fa-eye-slash');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon1.style.display = 'none';
            icon2.style.display = 'inline';
        } else {
            passwordInput.type = 'password';
            icon1.style.display = 'inline';
            icon2.style.display = 'none';
        }
    }
     // Sayfa yüklendiğinde ikinci ikonu gizleyin
     document.addEventListener("DOMContentLoaded", function() {
        var icon2 = document.querySelector('.fa-solid.fa-eye-slash');
        icon2.style.display = 'none';
    });
</script>
<!-- Sifre yoxlama -->
<script>
 $(document).ready(function () {
        $("#password").on('input', function () {
            var password = $(this).val();

            // Şifrenin uzunluğunu kontrol et
            if (password.length < 8) {
                $("#passwordMessage").text("Şifrə ən azı 8 simvoldan ibarət olmalıdır.");
                return;
            }

            // En az 1 büyük harf kontrolü
            if (!/[A-Z]/.test(password)) {
                $("#passwordMessage").text("Şifrədə ən az 1 böyük hərf olmalıdır.");
                return;
            }

            // En az 1 simge kontrolü (örneğin, @, #, $ vb.)
            if (!/[@#$%^&*!.]/.test(password)) {
                $("#passwordMessage").text("Şifrədə ən azı 1 simvol olmalıdır.");
                return;
            }

            // Hata yoksa mesajı temizle
            $("#passwordMessage").text("");
        });
    });
</script>


<script>
   function date_time(id)
{
        date = new Date;
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        document.getElementById("s").innerHTML = ''+s;
        document.getElementById("m").innerHTML = ''+m;
        document.getElementById("h").innerHTML = ''+h;
        setTimeout('date_time("'+"s"+'");','1000');
        return true;
}
window.onload = date_time('s');
</script>
</body>

</html>