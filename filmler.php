<?php
session_start();

// Oturum açık mı kontrol et
if(isset($_SESSION['user'])) {
    // Oturum açıksa, "Oturum Aç" ve "Kayıt Ol" butonlarını gizle
    $oturumAcGizle = "style='display:none;'";
    // Çıkış yap butonunu göster
    $cikisGoster = "";
} else {
    // Oturum açık değilse, "Oturum Aç" ve "Kayıt Ol" butonlarını göster
    $oturumAcGizle = "";
    // Çıkış butonunu gizle
    $cikisGoster = "style='display:none;'";
}
// veri tabanı bağlantı
include("filmlerbaglanti.php");
$sorgu=$vt->prepare('SELECT * FROM filmler' );
$sorgu->execute();
$filmlerliste = $sorgu->fetchAll(PDO::FETCH_OBJ);

// arama butonu
// Arama terimini al
if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Veritabanında arama yap
    $sorgu = $vt->prepare("SELECT * FROM filmler WHERE film_adi LIKE ?");
    $sorgu->execute(["%$searchTerm%"]);
    $filmlerliste = $sorgu->fetchAll(PDO::FETCH_OBJ);
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filmler</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="film.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="footer.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>


</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="index.php" class="logo">Logo</a>
        <form action="#" class="search-form">
            <input type="text" placeholder="Ara...">
            <button type="submit">Ara</button>
        </form>
        <ul class="nav-links">
            <li><a href="index.php">Anasayfa</a></li>
            <li><a href="#">Diziler</a></li>
            <li><a href="filmler.php">Filmler</a></li>
            <li <?php echo $oturumAcGizle; ?>><a href="girissayfa.php">Oturum Aç</a></li>
            <li <?php echo $oturumAcGizle; ?>><a href="kayitsayfa.php">Kayıt Ol</a></li>
            <li <?php echo $cikisGoster; ?>><a href="cikis.php">Çıkış Yap</a></li>
        </ul>
        
    </div>
    
</nav>


<div class="film-container">
    <?php 
    $filmSayisi = 0; 
    foreach($filmlerliste as $film): 
        if ($filmSayisi % 3 == 0 && $filmSayisi != 0) {
            echo '</div><div class="film-container">';
        }
    ?>
        <div class="film">
            <a href="resim_detay.php?film_id=<?php echo $film->id; ?>">
                <img src="resimler/<?php echo $film->resim_dosya_yolu; ?>" alt="<?php echo $film->film_adi; ?>">
            </a>
            <div class="film-info">
                <p class="film-rating">Film Puanı: <?php echo $film->ortalama_puan; ?></p>
                <p>Film Adı: <?php echo $film->film_adi; ?></p>
                <p>Yapım Yılı: <?php echo $film->yapim_yili; ?></p>
            </div>
        </div>
    <?php 
        $filmSayisi++; 
    endforeach; 
    ?>
</div>






<footer class="footer">
  <div class="footer-left col-md-4 col-sm-6">
    <p class="about">
      <span> About the company</span> Ut congue augue non tellus bibendum, in varius tellus condimentum. In scelerisque nibh tortor, sed rhoncus odio condimentum in. Sed sed est ut sapien ultrices eleifend. Integer tellus est, vehicula eu lectus tincidunt,
      ultricies feugiat leo. Suspendisse tellus elit, pharetra in hendrerit ut, aliquam quis augue. Nam ut nibh mollis, tristique ante sed, viverra massa.
    </p>
    <div class="icons">
      <a href="#"><i class="fa fa-facebook"></i></a>
    
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
  </div>
  <div class="footer-center col-md-4 col-sm-6">
    <div>
      <i class="fa fa-map-marker"></i>
      <p><span> Street name and number</span> City, Country</p>
    </div>
    <div>
      <i class="fa fa-phone"></i>
      <p> (+00) 0000 000 000</p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="#"> </a></p>
    </div>
  </div>
  <div class="footer-right col-md-4 col-sm-6">
    <h2> Company<span> logo</span></h2>
    <p class="menu">
      <a href="#"> Home</a> 
      <a href="#"> About</a> 
      <a href="#"> Services</a> 
      <a href="#"> </a> 
      <a href="#"> </a>
      <a href="#"> </a>
    </p>
    <p class="name">  2016</p>
  </div>
</footer>



</body>
</html>