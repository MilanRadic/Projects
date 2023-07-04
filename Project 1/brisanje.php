<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="assets/img/l.png" rel="icon">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
            body{
                background: #032e54;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            *{
                font-family: sans-serif;
                box-sizing: border-box;
            }
            /* form{
                width: 500px;
                height: 400px;
                border: 2px solid #ccc;
                padding: 10px;
                background: #fff;
                border-radius: 15px;
            }*/
            h2{
                text-align: center;
                margin-bottom: 40px;
                color: #fff;
            }
            input{
                display: block;
                border: 2px solid #ccc;
                width::95%;
                padding: 3px;
                margin: -5px auto;
                border-radius: 5px;
            }
            label{
                color: #888;
                font-size: 18px;
                padding: 10px;
            }
            button{
                float: right;
                background: #555;
                padding: 10px 15px;
                background-color: #fff;
                color: #000;
                border-radius: 5px;
                margin-right: 10px;
                border: none;
            }
            button:hover{
                opacity: .7;
            }
            }
            
        </style>
</head>

<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html#header" class="scrollto">REPUBLIKA SLOVENIJE <B>MINISTERRSTVO ZA NOTRANJE ZADEVE</B></a></h1>
    

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
<body>
    <?php
        if(!empty($_GET))
        {
            $st = $_GET['id'];

            $db = new mysqli('localhost', 'mradic', 'Ghf563xcvg32D', 'mradic');
            
            if ($db->connect_errno) 
            {
                echo "Povezava na strežnik ni uspela";

                // samo v fazi razvoja: 
                echo "Errno: " . $db->connect_errno; 
                echo "Error: " . $db->connect_error; 
                
                exit; // končaj z nalaganjem strani
            }

            $sql = "DELETE FROM zaposleni WHERE id = '$st'";
            if($db->query($sql))
            {
                echo "";
            }
            else
            {
                echo "Napaka pri brisanju skrbnika";
                echo "Napaka v poizvedbi: " . $sql; // samo v fazi razvoja
                echo "Errno: " . $db->errno; // samo v fazi razvoja
                echo "Error: " . $db->error; // samo v fazi razvoja
            }
        }
    ?>

    <form>
        <h2>Brisanje zaposlenih</h2>
        <input type="text" name="id" placeholder="Vnesi id zaposlenega"><br>
        <button type="submit">ZBRIŠI<a href='zaposleni.php'></a></button>
    </form>
</body>
</html>