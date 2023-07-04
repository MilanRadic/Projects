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
      
      background-image: linear-gradient(to right, rgb(236, 249, 251), rgb(217, 243, 247));
    }
    footer{
      background-image: linear-gradient(to right, rgb(236, 249, 251), rgb(217, 243, 247));
    }
    .content{
      background-image: linear-gradient(to right, rgb(236, 249, 251), rgb(217, 243, 247));
    }
    .main{
      background-image: linear-gradient(90deg, #4d5fad, #001a8a);
      padding: 15rem 0 15rem 0;
      clip-path: polygon(0 5%, 100% 0%, 100% 95%, 0% 100%);
    }
    .main2{
      background-image: linear-gradient(to right, rgb(236, 249, 251), rgb(217, 243, 247));
      padding: 0rem 0 10rem 0;
      clip-path: polygon(0 5%, 100% 0%, 100% 95%, 0% 100%);

    }
    .main3{
      background-image: linear-gradient(90deg, #4d5fad, #001a8a);
      padding: 15rem 0 15rem 0;
      clip-path: polygon(0 5%, 100% 0%, 100% 95%, 0% 100%);
    }
    .textmain{
      color: white;
      font-weight: bold;
      font-size: 2rem;
    }
  </style>
  
</head>
<body>
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
                <a class="nav-link" href="Admin/users.php" style = "color: #00008B;">Add a book</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>



    <main>
      
    

      <section class = "main">
        <h3 class = "textmain text-center">Welcome to our book store! We are dedicated to providing our customers with the best selection of 
          books available, with a focus on quality, variety, and affordability.</h3>
      </section>


      <section class="main2">
  <br><br><br><br><br><br>
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
        <img src="img/book1.jpg" class="d-block w-100" alt="..." style="width:300px; height:600px; clip-path: polygon(0 5%, 100% 0%, 100% 95%, 0% 100%);">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="img/book2.jpg" class="d-block w-100" alt="..." style="width:300px; height:600px; clip-path: polygon(0 5%, 100% 0%, 100% 95%, 0% 100%);">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="img/book3.jpg" class="d-block w-100" alt="..." style="width:300px; height:600px; clip-path: polygon(0 5%, 100% 0%, 100% 95%, 0% 100%);">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br><br><br><br><br><br>
  <div class="text-center">
    <h3 class="text" style="color: #001a8a; font-weight: bold; font-size: 2rem;">
    Step into our store and immerse yourself in a world of literary wonders. Our shelves are filled with a vast collection of books
    across various genres, from classic literature to contemporary fiction, from thought-provoking non-fiction to captivating
    children's books. No matter what your interests or preferences, we have something to satisfy every reader's appetite.
    </h3>
  </div>
  </div>
</section>

      <section class = "main3">
        <h3 class = "textmain text-center">At our book store, we believe that reading is not just a hobby, but a way of life.
          We are committed to fostering a love for books and creating a welcoming environment for book enthusiasts of all ages.
          Whether you're a seasoned reader or just starting your reading journey, we have something to captivate your imagination
          and expand your horizons.</h3>
      </section>



    </main>
</body>

</footer>
<footer class="text-center text-white" style="background-color: #ecf9fb; text-decoration: none;">
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