<?php
session_start();


if(isset($_SESSION['user'])) {
  
    $oturumAcGizle = "style='display:none;'";
  
    $cikisGoster = "";
} else {
  
    $oturumAcGizle = "";

    $cikisGoster = "style='display:none;'";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>  </title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="slider.css">


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

<div class="slider-container">
  <div class="slider">
    
 

    <div><img src="resimler/matrixresim.jpg" alt="Film 1"></div>
    <div><img src="resimler/godfather.jpg" alt="Film 2"></div>
    <div><img src="resimler/batman.jpg" alt="Film 3"></div>
  </div>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="slider.js"></script>



</body>
</html>
