<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css" />
</html>
<?php 
$page_title = 'Pay ' ;
include('includes/nav_logout.php');
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('includes/connect_db.php'); 
  
  
  # Initialize an error array.
  $errors = array();

  # Check for a full name.
  if ( empty( $_POST[ 'full_name' ] ) )
  { $errors[] = 'Enter your full name as printed on the card.' ; }
  else
  { $fn = mysqli_real_escape_string( $con, trim( $_POST[ 'full_name' ] ) ) ; }

  # Check for a card number.
  if (empty( $_POST[ 'card_number' ] ) )
  { $errors[] = 'Enter your card number.' ; }
  else
  { $cn = mysqli_real_escape_string( $con, trim( $_POST[ 'card_number' ] ) ) ; }

  # Check for an month:
  if ( empty( $_POST[ 'exp_month' ] ) )
  { $errors[] = 'Enter expiration month.'; }
  else
  { $m = mysqli_real_escape_string( $con, trim( $_POST[ 'exp_month' ] ) ) ; }

   # Check for year:
  if ( empty( $_POST[ 'exp_year' ] ) )
  { $errors[] = 'Enter expiration year.'; }
  else
  { $y = mysqli_real_escape_string( $con, trim( $_POST[ 'exp_year' ] ) ) ; }

  
  # Check for CVV:
  if ( empty( $_POST[ 'cvv' ] ) )
  { $errors[] = 'Enter CVV three digit code on back of your card.'; }
  else
  { $c = mysqli_real_escape_string( $con, trim( $_POST[ 'cvv' ] ) ) ; }


 
  # On insert to payments database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO payments (user_id, full_name, card_number, exp_month, exp_year, cvv, reg_date) VALUES (". $_SESSION['user_id'].",'$fn', '$cn', '$m', '$y', '$c',  NOW() )";
    $r = @mysqli_query ( $con, $q ) ;
    
  
    # Close database connection.
   # mysqli_close($con); 

  }

  
    echo '<div class="container">
			<div class="alert alert-dark alert-dismissible fade show" role="alert">
				<p><strong>Payment Complete! </strong> Enjoy your movie. </p> 
				
				 <a href="reservation.php"> <button type="button" class="btn btn-dark" role="button">E-Ticket</button> </a>
		  
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		 </div>' ; 
   
}



?>
<script>
$(function() {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<div class="container">
	<div class="alert alert-dark" role="alert">
	
	
	  <div class="row mb-4">
       <div class="col-lg-8 mx-auto text-center">
		 <h1 class="display-4">Payment</h1>
	   </div>
	  </div>
	
  <div class="row">
    <div class="col-lg-7 mx-auto">
      
        <!-- Credit card form tabs -->
          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
		<ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                    <i class="fa fa-credit-card"></i>
                        Add/Use New Card
            </a>
          </li>
		  
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                <i class="fa fa-paypal"></i>
                    Paypal
                </a>
          </li>
		  
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                <i class="fa fa-university"></i>
                    Stored Card
            </a>
		  </li>
          
        </ul>


        <div class="tab-content"; style="padding: 20px">

    <!-- credit card info-->
    <div id="nav-tab-card" class="tab-pane fade show active" >
          
          
            <form  action="payments.php" method="post">
              <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" placeholder="Full Name (printed on card)" required class="form-control" value="<?php if (isset($_POST['full_name'])) echo $_POST['full_name']; ?>"> 
              </div>
              <div class="form-group">
                <label for="cardNumber">Card number</label>
                <div class="input-group">
                  <input type="text" name="card_number" placeholder="Your card number" class="form-control" required value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>"> 
                  <div class="input-group-append">
                    <span class="input-group-text text-muted">
                        <i class="fa fa-cc-visa mx-1"></i>
                        <i class="fa fa-cc-amex mx-1"></i>
                        <i class="fa fa-cc-mastercard mx-1"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label><span class="hidden-xs">Expiration</span></label>
                    <div class="input-group">
                      <input type="number" placeholder="MM" name="exp_month" class="form-control" required value="<?php if (isset($_POST['exp_month'])) echo $_POST['exp_month']; ?>"> 
                      <input type="number" placeholder="YY" name="exp_year" class="form-control" required value="<?php if (isset($_POST['exp_year'])) echo $_POST['exp_year']; ?>"> 
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group mb-4">
                    <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                    <input type="text" name="cvv" required class="form-control"value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>"> 
                  </div>
                </div>
              </div>
             <input class="btn btn-dark btn-lg btn-block" type="submit" value="Complete Booking">
            
			</form>
    </div>
          <!-- End Form 'New Card'-->
		 
		 
	<!-- Paypal info -->
    <div id="nav-tab-paypal" class="tab-pane fade">
        <h3>Paypal is easiest way to pay online</h3>
				
		<div id="paypal-button-container"></div>

					<script src="https://www.paypalobjects.com/api/checkout.js"></script>
					<script>
					// Render the PayPal button
					paypal.Button.render({
					// Set your environment
					env: 'sandbox', // sandbox | production

					// Specify the style of the button
					style: {
					  layout: 'vertical',  // horizontal | vertical
					  size:   'medium',    // medium | large | responsive
					  shape:  'rect',      // pill | rect
					  color:  'white'       // gold | blue | silver | white | black
					},

					// Specify allowed and disallowed funding sources
					//
					// Options:
					// - paypal.FUNDING.CARD
					// - paypal.FUNDING.CREDIT
					// - paypal.FUNDING.ELV
					funding: {
					  allowed: [
						paypal.FUNDING.CARD,
						paypal.FUNDING.CREDIT
					  ],
					  disallowed: []
					},

					// Enable Pay Now checkout flow (optional)
					commit: true,

					// PayPal Client IDs - replace with your own

					client: {
					  sandbox: 'AbD3_Z5mNgmb_chYadJfFnez-PeHemLdB5NuU8oFOpaVtAywf7Eyn2Mwm-v0x84yU9JjrcZFOnmRbOMV',
					  production: '<insert production client id>'
					},

					payment: function (data, actions) {
					  return actions.payment.create({
						payment: {
						  transactions: [
							{
							  amount: {
								total: '0.01',
								currency: 'GBP'
							  }
							}
						  ]
						}
					  });
					},

					onAuthorize: function (data, actions) {
					  return actions.payment.execute()
						.then(function () {
						  window.alert('Payment Complete!');
						});
					}
					}, '#paypal-button-container');
					</script>
				
	</div>
			
    <!--Stored Card -->
    <div id="nav-tab-bank" class="tab-pane fade">
        <h3>Card Details</h3>
            <dl>
			<?php  #saved bank card info 

			# Access session.
			session_start() ;

			# Redirect if not logged in.
			if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
			# Open database connection.
			require ( 'includes/connect_db.php' ) ;
 
			# Retrieve items from 'bookings' database table.
			$q = "SELECT * FROM payments WHERE user_id={$_SESSION[user_id]}" ;
			$r = mysqli_query( $con, $q ) ;
			if ( mysqli_num_rows( $r ) > 0 )
			{
             echo '
              <dt>Bank</dt>
              <dd> THE WORLD BANK</dd>
            </dl>';
			 
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
			{
			echo '
				<dt>Name on Card:</dt>
				<dd>'  . $row['full_name'] . '</dd>
				<dt>Account number:</dt>
				<dd>'  . $row['card_number'] . '</dd>';
			}
	
			# Close database connection.
			mysqli_close( $con ) ; 
			}
			# Or display message.
			else { echo '<p>No card strored.</p>' ; }
			?>
			<button class="btn btn-dark"onclick="myFunction()">Use This Card</button>

				<script>
				function myFunction() {
				  alert("Payment Complete! Enjoy your movie.");
				}
				</script>
			
			
		<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
</div>
</div>
</div>
		
		
	
          <!-- End -->      
</div>

  </body>
</html>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>