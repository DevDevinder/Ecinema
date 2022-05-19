<?php # DISPLAY SHOPPING CART ADDITIONS PAGE.

# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Cart Addition' ;
include ( 'includes/nav_logout.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 



# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $id => $mov_qty )
  {
    # Ensure values are integers.
    $id = (int) $id;
    $qty = (int) $mov_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Open database connection.
require ( 'includes/connect_db.php' ) ;
  
  # Retrieve all items in the cart from the 'movie' database table.
  $q = "SELECT * FROM movie WHERE id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
  $r = mysqli_query ($con, $q);

  # Display body section with a form and a table.
  echo '<div class="container">
			<div class="pb-5">
				<div class="container">
					<div class="row">
					<div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
						<h4 class="alert-heading">'.$row['movie_title'].'</h4>
							<form action="cart.php" method="post">
								 <div class="table-responsive">
									<table class="table">
									  <thead>
										
										
			
		
	  ';
	  
	  echo "  <th scope=\"col\" class=\"border-0 bg-light\">
              <div class=\"p-2 text-uppercase\">Movie Title</div>
            </th>
			<th scope=\"col\" class=\"border-0 bg-light\">
              <div class=\"p-2 text-uppercase\">Time</div>
            </th>
            <th scope=\"col\" class=\"border-0 bg-light\">
              <div class=\"py-2 text-uppercase\">Price</div>
            </th>
            <th scope=\"col\" class=\"border-0 bg-light\">
              <div class=\"py-2 text-uppercase\">Quantity</div>
            </th>
            <th scope=\"col\" class=\"border-0 bg-light\">
              <div class=\"py-2 text-uppercase\">Total</div>
            </th>";
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $_SESSION['cart'][$row['id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo "
            </tr>
            </thead>
            <tbody>
			<tr>
              <th scope=\"row\" class=\"border-0\">
                <div class=\"p-2\">{$row['movie_title']}</div>
			  </th>
			  <th scope=\"row\" class=\"border-0\">
			    <div class=\"p-2\">
				  <span class=\"badge badge-secondary\"> {$row['screening_1']}</span>
			    </div>
			  </th>
			   <th scope=\"row\" class=\"border-0\">
                <div class=\"p-2\">{$row['mov_price']} </div>
			  </th>
				<th scope=\"row\" class=\"border-0\">
                  <div class=\"p-2\">
					<input type=\"text\" class=\"form-control\" name=\" qty[{$row['id']}]\" value=\" {$_SESSION['cart'][$row['id']]['quantity']}\">
				  </div>
				</th>
				<th scope=\"row\" class=\"border-0\">
				  <div class=\"p-2\">
					 £ " .number_format ($subtotal, 2). "
				  </div>
				 </th>
				</tr>
		 
		 </form> ";
  }
   # Display the total.
  echo '
		<tr>
			 <th scope=\"row\" class=\"border-0\">
			 </th>
			<th scope=\"row\" class=\"border-0\">
			 </th>
		
		 
		  <th scope=\"row\" class=\"border-0\">
		  <div class=\"p-2\"><input type="submit" name="submit" class="btn btn-dark" value="Update My Cart"></div>
		  </th>
		
		  <th scope=\"row\" class=\"border-0\">
		  <div class=\"p-2\"><a href="checkout.php?total='.$total.'"><button type="button" class="btn btn-secondary" role="button">Continue Booking Process</button></a></div>
		    <th scope=\"row\" class=\"border-0\">
			<div class=\"p-2\"> Total =  £'.number_format($total,2).'</div>
		  </th>
		</tr>
		</tbody>
		</form>
		</table>
		</div>';
}
else
# Or display a message.
{ echo '<div class="container"><h2>No reservations have been made.</h2>' ; }

?>

</body>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
