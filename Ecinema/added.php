<?php # DISPLAY SHOPPING CART ADDITIONS PAGE.

# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Cart Addition' ;
include ( 'includes/nav_logout.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'includes/connect_db.php' ) ;

# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM movie WHERE id = $id" ;
$r = mysqli_query( $con, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one movie id.
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
# Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    echo '<font color="White">
			<div class="container">
			<h1 class="display-4">'.$row['movie_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
				<p>'.$row['further_info'].'</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h4>Book Now</h4>
				<hr>
				<h2>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['screening_1'] . '</button></a>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" role="button">' . $row['screening_2'] . '</button></a>
				</h2>
			</div>
		</div>
		</font>
		';
  }
else
  {
    # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['mov_price'] ) ;
 echo '<div class="container">
			<h1 class="display-4">'.$row['movie_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
				<p>'.$row['further_info'].'</p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h4>Book Now</h4>
				<hr>
				<h2>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['screening_1'] . '</button></a>
				  <a href="cart.php"> <button type="button" class="btn btn-secondary" role="button">' . $row['screening_2'] . '</button></a>
				</h2>
			</div>
		</div>';
  }
}

# Close database connection.
mysqli_close($con);
?>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  