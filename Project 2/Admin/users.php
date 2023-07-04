<?php
ob_start();
session_start();
include('Inc/config.php');
include('Inc/functions.php');
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
                <a class="nav-link active" aria-current="page" href="http://mrfis.atwebpages.com/sp/Seminarska/admin.php" style = "color: #00008B;"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://mrfis.atwebpages.com/sp/Seminarska/knjigeadmin.php" style = "color: #00008B;">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="users.php" style = "color: #00008B;">Add a new book</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
</body>
<?php
$output = null;
    if($Action == 'view'){
      //Select.php
    $BookCategoryID = (isset($_GET['BookCategoryID']) && is_numeric($_GET['BookCategoryID'])) ? $_GET['BookCategoryID'] : null; 
    if($BookCategoryID > 0) {
      $Books = $db->prepare("SELECT BookID, Name, Author, C.Title as Title, B.Description as Description, B.Content as Content,
      B.BookCover as BookCover, C.BookCategoryID as BookCategoryID FROM Book B, BookCategory C
      WHERE B.BookCategoryID = C.BookCategoryID AND C.BookCategoryID = :BookCategoryID");
      $Books->execute(['BookCategoryID' => $BookCategoryID]);
    } else {
      $Books = $db->prepare("SELECT BookID, Name, Author, C.Title as Title, B.Description as Description, B.Content as Content,
      B.BookCover as BookCover, C.BookCategoryID as BookCategoryID FROM Book B, BookCategory C
      WHERE C.BookCategoryID = C.BookCategoryID group by BookID");
      $Books->execute();
    }
    $Books = $Books->fetchAll(PDO::FETCH_ASSOC);
    
    if(isset($Books)) {
      $output = null;
    
      $output .= getMenu();
    
      $sql = $db->prepare("SELECT BookCategoryID, Title FROM BookCategory");
      $sql->execute();
      $BookCs = $sql->fetchAll(PDO::FETCH_ASSOC);
      $outputSelectBookCs = null;
    
      if(isset($BookCs)) {
        $outputSelectBookCs .= '<div class = "text-center"><select name="BookCategoryID" onchange="this.form.submit()">';
    
        $outputSelectBookCs .= '
        <div class="just">
        <option value = "0" class="just">All</option>
        </div>';
        
        foreach($BookCs as $key => $BookC) {
          $BookCategoryID = $BookC['BookCategoryID'];
          $Title = $BookC['Title'];
          $Selected = (isset($_GET['BookCategoryID']) && $_GET['BookCategoryID'] == $BookCategoryID) ? ' selected' : null;
          
          $outputSelectBookCs .= '<option value="'.$BookCategoryID.'"'.$Selected.'>('.$BookCategoryID.') '.$Title.'</option>';
        }
        
        $outputSelectBookCs .= '</select></div>';
  }

  $output .= '
  <form method="get">
	
  <br/>'.$outputSelectBookCs.'
</form>';
	
	$output .= '<table border="1" style="border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  font-family: sans-serif;
  min-width: 400px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); width: 100%; text-align: center;">';
  $output .= '<head>';
  $output .= '<tr>
                <th>#</th>
                <th>Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Content</th>
                <!--<th>Genres</th>--!>
                <th>Edit</th>
                <th>BookCover</th>

                
              </tr>';
  $output .= '</thead>';
	$output .= '<tbody>';
	
  $i = 1;
	foreach($Books as $key => $Book) {
		$BtnEdit = '<a class="btn" href="users.php?action=edit&ID=' . $Book['BookID'] . '">&#9998;</a>';
		$BtnDelete = '<a class="btn" href="users.php?action=delete&ID=' . $Book['BookID'] . '" onclick="return confirm(\'Ali želiš izbrisati uporabnika?\')">&#10006;</a>';


    $img = ($Book['BookCover']) ? '<img width = "100"; src="data:image/jpeg;base64, '. $Book['BookCover'] . '">' : null;

		$output .= '<tr style = "text-align: center;">';
		$output .= '<td>' . $i . '</td>';
		$output .= '<td>' . $Book['Name'] . '</td>';
		$output .= '<td>' . $Book['Author'] . '</td>';
		$output .= '<td>' . $Book['Description'] . '</td>';
    $output .= '<td>' . $Book['Content'] . '</td>';
    //$output .= '<td>' . $Book['Title'] . '</td>';
		$output .= '<td>' . $BtnEdit . $BtnDelete . '</td>';

    $output .='<td>' . $img .'</td>';


		$output .= '</tr>';



    $i++;
	}
	
	$output .= '</tbody>';
	$output .= '</table>';
}

}else if($Action == 'edit'){
  //Kombinacija inser.php in update.php

  $Book = null;
  $BookCover = null;

  $Form = (isset($_POST) && is_array($_POST)) ? $_POST : null;

  if($ID) { //Update - urejanje obstoječe vrstice
    if($Form){
      $Name = checkInputValue('Name');
      $Author = checkInputValue('Author');
      $Description = CheckInputValue('Description');
      $Content = CheckInputValue('Content');
      $BookCover = isset($_FILES) && isset($_FILES['BookCover']) ? $_FILES['BookCover'] : null;
      $BookCoverUpload = ($BookCover && $BookCover['tmp_name']) ? base64_encode(file_get_contents($BookCover['tmp_name'])) : $Book['BookCover'];
      $BookCategoryID = CheckInputValue('BookCategoryID');
	
      if($Name && $Author && $Description && $Content && $BookCover && $BookCategoryID) {
        $sql = $db->prepare("UPDATE Book SET Name = :Name, Author = :Author, Description = :Description, Content = :Content,
        BookCover = :BookCover, BookCategoryID = :BookCategoryID
        WHERE BookID = :BookID");
        $sql->execute(
          [
            'BookID' => $ID,
            'Name' => $Name, 
            'Author' => $Author, 
            'Description' => $Description,
            'Content' => $Content,
            'BookCover' => $BookCoverUpload,
            'BookCategoryID' => $BookCategoryID
          ]
        );
        
        echo "Posodobljena nova oseba";
        
        redirect();
      }
    }
  

    $Book = $db->prepare("SELECT * FROM Book WHERE BookID = :BookID");
    $Book->execute(['BookID' => $ID]);
    $Book = $Book->fetchAll(PDO::FETCH_ASSOC);
    
    // var_dump($User);
    
    if($Book) {
      $Book = $Book[0];

      $BookCover = ($Book['BookCover']) ? '<img width = "500"; src="data:image/jpeg;base64, '. $Book['BookCover'] . '">' : null;
    }
    //var_dump($User);
  
  }else
  if($Form) { //Insert - dodajanje nove vrstice
    $Name = checkInputValue('Name');
    $Author = checkInputValue('Author');
    $Description = CheckInputValue('Description');
    $Content = CheckInputValue('Content');
    $BookCover = isset($_FILES) && isset($_FILES['BookCover']) ? $_FILES['BookCover'] : null;
    $BookCoverUpload = ($BookCover) ? base64_encode(file_get_contents($BookCover['tmp_name'])) : null;
    $BookCategoryID = CheckInputValue('BookCategoryID');
    
    if($Name && $Author && $Description && $Content && $BookCover && $BookCategoryID) {
      $sql = $db->prepare("INSERT into Book (Name, Author, Description, Content, BookCover, BookCategoryID)
      VALUES(:Name, :Author, :Description, :Content, :BookCover, :BookCategoryID)");
      $sql->execute(
        [
          'Name' => $Name, 
          'Author' => $Author, 
          'Description' => $Description,
          'Content' => $Content,
          'BookCover' => $BookCoverUpload,
          'BookCategoryID' => $BookCategoryID
        ]
      );
      
      echo "Shranjena nova oseba";
      
      redirect();
    }
  }

  // izpis vseh dodanih poštnih številk
  $sql = $db->prepare("SELECT BookCategoryID, Title FROM BookCategory");
  $sql->execute();
  $BookCs = $sql->fetchAll(PDO::FETCH_ASSOC);
  $outputSelectBookCs = null;

  if(isset($BookCs)) {
    $outputSelectBookCs .= '<div><select name="BookCategoryID">';
    
    foreach($BookCs as $key => $BookC) {
      $BookCategoryID = $BookC['BookCategoryID'];
      $Title = $BookC['Title'];
      $Selected = (getInputValue($Book, 'BookCategoryID') == $BookCategoryID) ? ' selected' : null;
      
      $outputSelectBookCs .= '<option value="'.$BookCategoryID.'"'.$Selected.'>('.$BookCategoryID.') '.$Title.'</option>';
    }
    
    $outputSelectBookCs .= '</select></div>';
  }
    
  $output .= '<div class = "text-center">
  <p style="color: #001a8a; font-weight: bold; font-size: 1rem; text-decoration: none;">Book information</p> <br /><br /><br />
  <form method="post" enctype = "multipart/form-data" class="form-group">
	<div class="form-floating mb-3">
		<input type="text" name="Name" value="'.getInputValue($Book, 'Name').'" placeholder = "Name">
	</div>
	<div class="form-floating mb-3">
		<input type="text" name="Author" value="'.getInputValue($Book, 'Author').'" placeholder = "Author">
	</div>
  <div class="form-floating mb-3">
		<input type="text" name="Description" value="'.getInputValue($Book, 'Description').'" placeholder = "Description">
	</div>
  <div class="form-floating mb-3">
		<input type="text" name="Content" value="'.getInputValue($Book, 'Content').'" placeholder = "Content">
	</div>
  <br /><br /><br />
  <div class="form-floating mb-3">
    <input type="file" name="BookCover" onchange="preview()">
    <img id="frame" width="150" height="150" src=""/>
    '. $BookCover.'
  </div> <br /><br /><br />
  <br/>'.$outputSelectBookCs.'
  <br><br><br>
	<input type="submit" value="Save">
</form> <br /><br /><br /><br /><br /><br /><br /><br /><br />
<script>
function preview(){
  frame.src = URL.createObjectURL(event.target.files[0]);
}
</script>
</div>';

}else if($Action == 'delete'){
  //Delete.php

  if($ID){
    $Book = $db->prepare("SELECT * FROM Book WHERE BookID = :BookID");
	$Book->execute(['BookID' => $ID]);
	$Book = $Book->fetchAll(PDO::FETCH_ASSOC);

  if($Book){

    $Book = $db->prepare("DELETE FROM Book WHERE BookID = :BookID");
    $Book->execute(
      [
      'BookID' => $ID
      ]
    );
    redirect();
  }else{
    redirect();
  }

  }else{
    redirect();
  }

}
echo $output;
?>
<footer class="text-center text-white mt-auto" style="background-color: #ecf9fb; text-decoration: none;">
<div class="text-center text-dark p-3" >
  <h7>35210001 Milan Radić</h7>
  </div>
  <div class="container pt-4">
    <section class="mb-4">
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="http://mrfis.atwebpages.com/sp/Seminarska/admin.php"
        role="button"
        data-mdb-ripple-color="dark"
        style="text-decoration: none;
        color: #00008B;"
        >Home</a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="http://mrfis.atwebpages.com/sp/Seminarska/knjigeadmin.php"
        role="button"
        data-mdb-ripple-color="dark"
        style="text-decoration: none;
        font-weight: 20px;
        color: #00008B;"
        >Books</a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="users.php"
        role="button"
        data-mdb-ripple-color="dark"
        style="text-decoration: none;
        color: #00008B;"
        >Add a new book</a>
    </section>
  </div>
</footer>
</html>
<!-- $Logo = (isset($_FILES) && isset($_FILES['Logo'] && isset($_FILES['Logo']['tmp_name'] && $_FILES['Logo']['size' > 1) ? $_FILES['Logo'] : null;
$LogoUpload = ($Logo) ?base64(file_get_contents($Logo['tmp_name'])) : "";--!>