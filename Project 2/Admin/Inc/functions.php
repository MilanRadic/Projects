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
		@media (max-width: 767px) {
  .col-sm-6 {
    flex: 0 0 50%;
    max-width: 50%;
  }
}


@media (min-width: 768px) {
  .col-lg-3 {
    flex: 0 0 25%;
    max-width: 25%;
	}
}
	</style>
</head>
<body>
<?php

function redirect($Url = null){
	global $config;

	$Url = ($Url) ? $Url : $config['default_admin_page'];

	header("Location: $Url");
}

function getMenu() {
	$output = null;
	
	$output = '
	<div class="list-group">
	<br /><br /><br />
  <button type="button" class="list-group-item list-group-item-action">
	<a href="users.php?action=edit" style="text-decoration: none;" class="text-center"><h6>Add a new book</h6></a>
  </button>
</div>';
/*<ul>
		<li><a href="users.php?action=edit">Dodaj</a></li>
		<li><a href="login.php?action=logout">Odjava</a></li>
	</ul>';
	*/
	return $output;
}

function dbConnect() {
	global $config; //Global dovoli, da lahko uporabljamo spremenljivke iz datoteke config.php

	$HostName = $config['db_hostname'];
	$UserName = $config['db_username'];
	$Password = $config['db_password'];
	$dbName = $config['db_name']; // enak $UserName

	try {
		$db = new PDO("mysql:host=$HostName;dbname=$dbName", $UserName, $Password);
		$db->exec("set names utf8");
		
		// echo "povezan";
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
	
	return $db;
}

function checkInputValue($input) {
	$output = null;
	
	$output = ($input && isset($_POST[$input])) ? $_POST[$input] : null;
	
	return $output;
}

function getModulAction(){
	global $config;

	$output = null;

	if(isset($_GET) && isset($_GET['action'])){
		$output = $_GET['action'];
	}else{
		$output = $config['default_admin_page_action'];
	}
	return $output;
}

function getModulActionID(){
	$output = null;

	if(isset($_GET) && isset($_GET['action']) && isset ($_GET['ID']) && is_numeric($_GET['ID'])){
		$output = $_GET['ID'];
	}
	return $output;
}

function getInputValue($data, $input){
	$output = null;

	if(isset($data) && isset($input)){
		$output = (isset($data[$input])) ? $data[$input] : null;
	}

	return $output;
}

function checkLogIn() {
	global $config;

	if(isset($_SESSION) && isset($_SESSION['LogIn'])) {
		if(str_contains($_SERVER['SCRIPT_NAME'], 'login.php')) {
			redirect($config['default_admin_page']);
		}
	} else {
		// redirect('login.php');
		
		// /sp/vaje10/login.php 
		if(str_contains($_SERVER['SCRIPT_NAME'], 'login.php') == false) {
			redirect('login.php');
		}
	}
}

function outputCategories(){
  global $db;

  $output = null;

  $sql = $db->prepare("SELECT C.BookCategoryID as BookCategoryID, Title, COUNT(*) as Counter FROM BookCategory C, Book B WHERE C.BookCategoryID = B.BookCategoryID GROUP BY C.Title ORDER BY C.Title ASC;");
  $sql->execute();
  $BookCs = $sql->fetchAll(PDO::FETCH_ASSOC);

  if(isset($BookCs)) {
    foreach($BookCs as $key => $BookC) {
      $BookCategoryID = $BookC['BookCategoryID'];
      $Title = $BookC['Title'];
			$Counter = $BookC['Counter'];
      $output .= '
			
  			<div>
    			<div class="text-center">
						<hr><a style="color: #001a8a; font-weight: bold; font-size: 1rem; text-decoration: none;" href = "?action=category&ID='. $BookCategoryID .'"> '.$Title.' | Book counter: '. $Counter . '</a><hr>
					</div>
    		</div>
			

			
        ';
			
    }
    
    $output .= '</select></div>';
  }

  
  return $output;
}

//Izpis posameznih kategoriji
function outputItems($ID){
	global $db;

	$output = null;
	$BookCover = null;

	if($ID){
			$Books = $db->prepare("SELECT BookID, Name, Author, C.Title as Title, B.Description as Description,
			B.Content as Content, B.BookCover as BookCover, C.BookCategoryID as BookCategoryID FROM Book B, BookCategory C
			WHERE B.BookCategoryID = C.BookCategoryID AND C.BookCategoryID = :BookCategoryID");
			$Books->execute(['BookCategoryID' => $ID]);
			$Books = $Books -> fetchALL(PDO::FETCH_ASSOC);

			$count = 0;

			$output .= '<div class="container">';
			$output .= '<div class="row justify-content-center">';

			foreach($Books as $key => $Book) {    
					$Link = '?action=item&ID='. $Book['BookID'];
					$BookCover = ($Book['BookCover']) ? '<img width="100" src="data:image/jpeg;base64, '. $Book['BookCover'] . '" class="rounded mx-auto d-block">' : null;
					$Title2 = '<h6>'. $Book['Title'] . ' <br />  </h6>';
					$Auther = '<h6 class="text-center">'. $Book['Author'] .'</h6>';
					$Title = '<h5 class="text-center"><b>'. $Book['Name'] . ' </b></h5><h7><br /> '. $Book['Description'] . ' ...</h7>';

					$BtnMore = '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
							<div><a class="btn btn-outline-dark mt-auto" href="'. $Link .'">Read more</a></div>
					</div>';

					$output .= '<div class="col-sm-6 col-lg-3">';
					$output .= $Auther;
					$output .= $BookCover;
					$output .= $Title;
					$output .= $BtnMore;
					$output .= '</div>';

					$count++;

					if ($count % 4 == 0) {
							$output .= '</div>';
							$output .= '<div class="row justify-content-center">';
					}
			}

			if ($count % 4 != 0) {
					$output .= '</div>';
			}

			$output .= '</div>';
			$output .= '</div>';
	} else {
			redirect('users.php');
	}

	return $output;
}

function outputItem($ID){
	global $db;

	$output = null;

	if($ID){
		$Book = $db->prepare("SELECT BookID, Name, Author, C.Title as Title, B.Description as Description,
    B.Content as Content, B.BookCover as BookCover, C.BookCategoryID as BookCategoryID FROM Book B, BookCategory C
    WHERE B.BookCategoryID = C.BookCategoryID AND B.BookID = :BookID");
		$Book->execute(['BookID' => $ID]);
		$Book = $Book -> fetchALL(PDO::FETCH_ASSOC);

		if($Book){
      $Link = 'http://mrfis.atwebpages.com/sp/Seminarska/knjige.php';
			$Book = $Book[0];
			$BookCover = ($Book['BookCover']) ? '<img width = "100"; src="data:image/jpeg;base64, '. $Book['BookCover'] . '">' : null;
			$Title2 = '<h6>'. $Book['Title'] . ' <br />  </h6>';
			$Title = '<h3>'. $Book['Name'] . ' </h3><br />  <br /><h4> '. $Book['Content'] .' </h4><br /> </h6>'. $Book['Author'] .'</h6>';
      $BtnLess = '
			<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="'. $Link .'">Back</a></div>
                            </div>
			';
			$output .= '
			
			<article>
      <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
														<div class="text-center">
                                    <!-- Product name-->
																		<br />
                                    '. $Title2 . '
																		<br />
                                </div>
                            <div class="text-center">
                                    <!-- Product name-->
                                    '. $BookCover . '
                                </div>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    '. $Title . '
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center">
                                    <!-- Product name-->
                                    
                                </div>   
                        </div>
                    </div>'. $BtnLess . '
			</article>
			';
		}
	}else{ /*To smo dodal*/
		redirect('users.php');
	}
return $output;
}
?>
</body>
</html>