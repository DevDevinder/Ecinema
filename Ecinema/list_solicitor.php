<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />
	
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
    <title>Solicitor List</title>
	

</head>	

<body>
	<nav>
 <?php
 session_start() ;
// check if session exists?
  if(!empty($_SESSION))
  {
    include ( 'includes/nav_logout.php' );
  }
  else
  {
     include ('index.php');
  }

 
 ?>
	</nav>
	
	<div class="container">
	
	<?php # DISPLAY COMPLETE LOGIN PAGE.
# Set page title and display header section.
$page_title = 'Login' ;
include ( 'includes/nav_login.php' ) ;

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<div class="container"><h1 id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or register account.</h1>' ;
}
?>
<head>
<title>Ecinema 2019 Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css" />
</head>

<body>
	
	<?php
 session_start() ;
// check if session exists?
  if(!empty($_SESSION))
  {
	  # Open database connection.
require ( 'includes/connect_db.php' ) ;
	  # Retrieve items from 'bookings' database table.
$q = "SELECT * FROM movie" ;
$r = mysqli_query( $con, $q ) ;

  echo '
  <div class="card">
  <div class="container">
			<div class="table-responsive">
				<table class="table table-borderless">
				<thead>
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>ID</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Movie Title</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Screening 1</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Screening 2</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Movie Price</p></div>
				</th>
				</tr>
				</thead>';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '	<tbody>
			<tr>
			<td><p>' . $row['id'] . '</p></td>
			<td><p>' . $row['movie_title'] . '</p></td>
			<td><p>'  . $row['screening_1'] . '</p></td>
			<td><p>'  . $row['screening_2'] . '</p></td>
			<td><p>'  . $row['mov_price'] . '</p></td>';
  }
	echo '</tr>
		  </tbody>
		  </table> ';
		  
		  echo '<br><hr><p>
		<a href="add_movie.php">
			<button type="button" class="btn btn-dark btn-lg btn-block role="button">Add Movie</button>
		</a>
		</p>
		<hr>
		';
  }
  else
  {
 
	 echo '<center>
	<div class="container">
	<h1>Login</h1>
	<form action="login_action.php" method="post">
	<label for="uname">Username</label>
	<input type="text" placeholder="Username" name="email" required>
	<br></br>
	<label for="psw">Password</label>
	<input type="password" placeholder="Password" name="pass" required>
	<br></br>   
	<input type="submit" value="Submit">
	</div>				
	</form>
	</center> ';
  }

 
 ?>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
	
</div>
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
	
	
	
	
  </body>
</html>