<?php # DISPLAY CHECKOUT PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Checkout' ;
include ( 'includes/nav_logout.php' ) ;


# Check for passed total and cart.
if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{
  # Open database connection.
  require ('includes/connect_db.php');
  
  # Ticket reservation and total in 'bookings' database table.
  $q = "INSERT INTO booking ( user_id, total, booking_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
  $r = mysqli_query ($con, $q);
  
  # Retrieve current order number.
  $booking_id = mysqli_insert_id($con) ;
  
  # Retrieve cart items from 'movie' database table.
  $q = "SELECT * FROM movie WHERE id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
  $r = mysqli_query ($con, $q);

   # Store order contents in 'booking_contents' database table.
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    $query = "INSERT INTO booking_contents
	( booking_id, id, quantity, mov_price )
    VALUES ( $booking_id, ".$row['id'].",".$_SESSION['cart'][$row['id']]['quantity'].",".$_SESSION['cart'][$row['id']]['price'].")" ;
    $result = mysqli_query($con,$query);
  }
  
  # Close database connection.
  mysqli_close($con);
  ?>
  
  <?php 
  
  
	# Display order number.
	echo '<div class="container">
			<h1 class="display-4">Thank you for booking with <span>EC</span>inema.  </h1>';
  
  # Remove cart items.  
  $_SESSION['cart'] = NULL ;
}
# Or display a message.
else { echo '<p></p>' ; }


# Open database connection.
require ( 'includes/connect_db.php' ) ;
 
# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}" ;
$r = mysqli_query( $con, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  
  echo '<div class="container">
			<div class="table-responsive">
				<table class="table table-borderless">
				<thead>
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Booking Refrence No.</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Total</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Date of Booking</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Status</p></div>
				</th>
				
				<th scope=\"col\" class=\"border-0 bg-light\">
				<div class=\"p-2 text-uppercase\"><p>Delete</p></div>
				</th>
				</tr>
				</thead>
				';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '	<tbody>
			<tr>
			<td><p>' . $row['booking_id'] . '</p></td>
			<td><p>' . $row['total'] . '</p></td>
			<td><p>'  . $row['booking_date'] . '</p></td>
			<td><p>Collect tickets at box office</p></td>
			<td><p><a href="delete.php?booking_id=' .$row['booking_id'] . '"><i class="fa fa-trash" aria-hidden="true" style="font-size:24px;color:#8C8C8C"></i></a></p></td>
				
				
';
  }
	echo '</tr>
		  </tbody>
		  </table> ';  
		 
  echo '<br><hr><p>
		<a href="payments.php?id='.$row['booking_id'].'">
			<button type="button" class="btn btn-dark btn-lg btn-block role="button">Make Payment</button>
		</a>
		</p>
		<hr>
		';
  # Close database connection.
  mysqli_close( $con ) ; 
}

?>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>