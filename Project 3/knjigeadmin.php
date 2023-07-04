<?php
ob_start();
session_start();
include('Admin/Inc/config.php');
include('Admin/Inc/functionsadmin.php');
$db = dbConnect();
$Action = getModulAction();
$ID = getModulActionID();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Milan Radić 35210001</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body{
      background-color: #ecf9fb;
    }
    .text{
      color: #00008B;
      font-weight: bold;
    }
    .main{
      clip-path: polygon(100% 0, 100% 90%, 50% 100%, 0 90%, 0 0, 50% 10%);
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">
<header style = "background-color: #ecf9fb;">
      <nav class="navbar navbar-expand-lg " style = "background-color: #ecf9fb;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Book store</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="admin.php" style = "color: #00008B;"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="knjigeadmin.php" style = "color: #00008B;">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Admin/users.php" style = "color: #00008B;">Add a new book</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="text-center">
      <br><br><br>
      <h1 class = "text">Books & Genres</h1>
      <br><br><br>
    </div>

    <?php
      if($Action == 'category'){
        //Izpis za specifičen kraj WHERE PostID ...
        echo outputItems($ID);
      }else if($Action == 'item'){
        //Izpis specifične vrstice na podlagi UserID
        echo outputItem($ID);
      }else{
        //Izpis vstopnih kategorij
        echo outputCategories();
      }
    ?>
    <br><br><br><br><br><br>

</body>
<footer class="text-center text-white mt-auto" style="background-color: #ecf9fb; text-decoration: none;">
<div class="text-center text-dark p-3" >
  <h7>35210001 Milan Radić</h7>
  </div>
  <div class="container pt-4">
    <section class="mb-4">
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="admin.php"
        role="button"
        data-mdb-ripple-color="dark"
        style="text-decoration: none;
        color: #00008B;"
        >Home</a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="knjigeadmin.php"
        role="button"
        data-mdb-ripple-color="dark"
        style="text-decoration: none;
        font-weight: 20px;
        color: #00008B;"
        >Books</a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="Admin/users.php"
        role="button"
        data-mdb-ripple-color="dark"
        style="text-decoration: none;
        color: #00008B;"
        >Add a new book</a>
    </section>
  </div>
</footer>
</html>