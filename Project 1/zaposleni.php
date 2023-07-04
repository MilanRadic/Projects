<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Policija</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   
  <link href="assets/img/l.png" rel="icon">

  <link href="assets/img/l.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <style>
    table, tr, td{
      border: solid 1px black;
    }

    table{
      margin: 0 auto;
    }

    td{
      padding: 10px;
    }
    .dod {
      display: block;
      width: 100%;
      border: none;
      background-color: #032e54;
      padding: 14px 28px;
      font-size: 16px;
      cursor: pointer;
      text-align: center;
    }
    .dod2 {
      display: block;
      width: 100%;
      border: none;
      background-color: #0880e8;
      padding: 14px 28px;
      font-size: 16px;
      cursor: pointer;
      text-align: center;
    }
    button:hover{
      opacity: .7;
    }
    a:link, a:visited {
      color: white;
    }

  </style>

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html#about" class="scrollto">REPUBLIKA SLOVENIJE <B>MINISTRSTVO ZA NOTRANJE ZADEVE</B></a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php#header">Domov</a></li>
          <li><a href="index.html#about">Info</a></li>
          <li><a href="index.html#contact">Kontakt</a></li>
          <li><a href="novice.html">Novice</a></li>
          <li class="active"><a href="zaposleni.php">Zaposleni</a></li>
          <li><a href="login.php">Log Out</a></li>

        </ul>
      </nav>

    </div>
  </header>
  <!-- ======= Header ======= -->

  <main id="main">

    
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>

        </ol>
        <h2>ZAPOSLENI</h2>

      </div>
      
<!--mradic  193.2.118.6  Ghf563xcvg32D     mradic -->
<?php
  $db = new mysqli('localhost', 'mradic', 'Ghf563xcvg32D', 'mradic');

  $data = $db->query("SELECT * FROM zaposleni");
  echo "<table class='table'>";
  while($row = mysqli_fetch_assoc($data))
  {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['ime']."</td>";
    echo "<td>".$row['priimek']."</td>";
    echo "<td>".$row['datum_rojstva']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['telefonska']."</td>";
    echo "<td>".$row['postaja']."</td>";
    echo "<td>".$row['polozaj']."</td>";
    echo "</tr>";
  }
  echo "<button class='dod'><a href='dodajanje.php'>DODAJ</a></button>";
  echo "<button class='dod2'><a href='urejanje.php'>SPREMENI</a></button>";
  echo "<button class='dod'><a href='brisanje.php'>ZBRIŠI</a></button>";
  echo "</table>";
  
  
?>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Linki</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Domov</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Info</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontakt</h4>
            <p>
              Ljubljanska cesta 3<br>
              8000, Novo mesto<br>
              Slovenija <br><br>
              <strong>Telefon:</strong> 07 332 72 00<br>
              <strong>Email:</strong> punm@policija.si<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>KDAJ POKLICATI 113</h3>
            <p>Kadar občani potrebujejo pomoč policije, lahko pokličejo na interventno številko policije 113. Interventni klic na številko 113 sprejme in evidentira policist operativno-komunikacijskega centra (OKC), 
              ki deluje znotraj vsake policijske uprave. 
              V Sloveniji je osem takšnih centrov.</p>
          </div>

        </div>
      </div>
    </div>

    
  </footer>
  <!-- Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>