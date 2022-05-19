<?php # DISPLAY SHOPPING CART PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Reservation' ;
include('includes/nav_logout.php');

# Open database connection.
require ( 'includes/connect_db.php' ) ;
 
# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}
ORDER BY booking_date DESC
LIMIT 1" ;
$r = mysqli_query( $con, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  
  echo '<div class="container">
			<div class="middlea">
				<h1 class="display-4 text-muted">E-Ticket</h1>
				<hr>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
				';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '	
	<p><img src="img/qrcode.png"></p>
	<h3><strong><font color="black"> Enjoy the movie!</font></h3>
	<p><strong>Date of Booking: </strong>  '  . $row['booking_date'] . '</p>
			<p><strong> Booking Ref:  </strong>ECBK0' . $row['booking_id'] . '</p>
			
	</div>
	</div>
	</div>
	</div>
	</div>
				
				
';
  }
	
  # Close database connection.
  mysqli_close( $con ) ; 
}
else { echo '<div class="container"><h3>No movies booked.</h3>
</div>' ; }
?>

</body>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="stylesheet.css" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	


</html>