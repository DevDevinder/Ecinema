<?php # DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ' ;
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

if(!empty($_SESSION))
  {
    include ( 'includes/nav_logout.php' );
  }
  else
  {
     include ('includes/nav.html');
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway|Righteous&display=swap" rel="stylesheet">
	

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style>
  .blok{margin:30px;}
</style>
</head>
<body>

<nav class="nav">
    <li class="nav-item">
      <button type="button" class="btn" >
	  <i class="fa fa-cog"></i><font color="white">  Dashboard</font>
	  </button>
    </li>
	
	<li class="nav-item">
	<!-- Button trigger modal -->
	<button type="button" class="btn" data-toggle="modal" data-target="#password">
		<i class="fa fa-key"></i>  <font color="white">Change Password</font>
	</button>
    </li>
	
	<li class="nav-item">
	<button type="button" class="btn" data-toggle="modal" data-target="#add_card" >
	  <i class="fa fa-credit-card"></i>  <font color="white">Add Card</font>
    </button>
	</li>
	
	<li class="nav-item">
      <button type="button" class="btn" data-toggle="modal" data-target="#delete_card" >
	  <i class="fa fa-credit-card"></i>  <font color="white">Remove Card</font>
    </button>
	
	
	
  </ul>
</nav>
 <!--  =============================
	=====    Tab Navigation   =======
	=================================== -->
<div class="container">
  <h1 class="display-4"> 
	Dashboard
	</h1>

	<!--  =============================
	=====   User Info  =======
	=================================== -->	
	<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT * FROM users WHERE user_id={$_SESSION[user_id]}" ;
	$r = mysqli_query( $con, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '
	<div class="row">
  ';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	<div class="col-sm">
	  <div class="alert alert-success" alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>	
	  <h1>'  . $row['first_name'] . ' '  . $row['last_name'] . '<strong>  </h1> 
	  <p><strong> User ID : EC2020 '  . $row['user_id'] . ' </strong></p>
	  <p><strong> Email : </strong> '  . $row['email'] . ' </p>
	  <p><strong> Registration Date : </strong> '  . $row['reg_date'] . ' </p>
	 </div>
    </div>
	';
  }
	
  # Close database connection.
  #mysqli_close( $con ) ; 
}
else { echo '<h3>No user details.</h3>

' ; }
?>


<!--  =============================
	=====    Payment Card Stored   =======
	=================================== -->
 
    	
<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT * FROM payments WHERE user_id={$_SESSION[user_id]}" ;
	$r = mysqli_query( $con, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '<div class="col-sm">';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	
		<div class="alert alert-primary" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		   </button>
			<h1>Card Stored</h1>
			<strong> Card Holder : </strong> '  . $row['full_name'] . ' </p>
			<strong> Card Number : </strong> '  . $row['card_number'] . ' </p>
			<strong> Expire Date : </strong> '  . $row['exp_month'] . '   '  . $row['exp_year'] . '</p>
		</div>
	</div>
	';
  }
	
  # Close database connection.
  #mysqli_close( $con ) ; 
}
else { echo '<div class="alert alert-primary" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		   </button>
			<h1><font color="black">Card Stored</font></h1>
			<h3>No card stored.</h3>
		</div>
		
' ; }
?>
</div>



<!--  =============================
	=====    Booking History   =======
	=================================== -->
		<div class="row">
		  <div class="col-sm">
<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}" ;
	$r = mysqli_query( $con, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '
		  ';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
		<div class="alert alert-warning" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		<h1>Booking History</h1>
		<strong> Booking ID : </strong> '  . $row['booking_id'] . ' </p>
		<strong> Total : &pound </strong> '  . $row['total'] . ' </p>
		<strong> Booking Date : </strong> '  . $row['booking_date'] . '   '  . $row['exp_year'] . '</p>
		<hr>
	</div>
	';
  }
	
  # Close database connection.
  #mysqli_close( $con ) ; 
}
else { echo '<div class="alert alert-info" alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		<h1>Booking History</h1>
		<h3>No booking details.</h3>
</div>
</div>' ; }
?>
	  
	  
	  
<!--  =============================
=====    Modal Change Password   =======
	=================================== -->	 

	
	  <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="change-password.php" method="post">
            <div class="form-group">
                <input type="email" 
					   name="email" 
					   class="form-control" 
					   placeholder="Confirm Email" 				
					   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>

            </div>
            <div class="form-group">
                <input type="password" 
				       name="pass1" 
					   class="form-control" 
					   placeholder="New Password"
					   value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>

            </div>
            <div class="form-group">
                <input type="password" 
					   name="pass2" 
					   class="form-control" 
					   placeholder="Confirm New Password"
					   value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>

            </div>
				<div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="btnChangePassword" class="btn btn-dark btn-lg btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>
	  
	  
	   <!--  =============================
=====    Modal Add Credit Card    =======
	=================================== -->
 <?php 
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Open database connection.
require ( 'includes/connect_db.php' ) ;
			echo'
	
	  <div class="modal fade" id="add_card" tabindex="-1" role="dialog" aria-labelledby="add_card" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		 <form action="add_card.php" method="post">
         <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" placeholder="Full Name (printed on card)" required class="form-control ">
         </div>
         <div class="form-group">
            <label for="cardNumber">Card number</label>
                <div class="input-group">
                  <input type="text" name="card_number" placeholder="Your card number" required class="form-control"  ">
                  <div class="input-group-append">
                    <span class="input-group-text text-muted">
                        <i class="fa fa-cc-visa mx-1"></i>
                        <i class="fa fa-cc-amex mx-1"></i>
                        <i class="fa fa-cc-mastercard mx-1"></i>
                    </span>
                  </div>
				</div>
			</div>
		 <div class="form-group">
			<label for="expiryDate">Expiry Date</label>
				<div class="input-group">
                  <input type="number" placeholder="MM" name="exp_month" required class="form-control" > 
                  <input type="number" placeholder="YY" name="exp_year" required class="form-control"  > 
                </div>
         </div>
         
		 <div class="form-group">
			<label data-toggle="tooltip" placeholder="Three-digits code on the back of your card">CVV
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                 <input type="text" name="cvv" required class="form-control" required >
			  
        </div>
		
		 <input class="btn btn-dark btn-lg btn-block" type="submit" value="Add Card">
            
	</form>
	</div>
    </div>
  </div>
</div>';
 #Close database connection.
mysqli_close( $con ) ;
?>
	 

<!--  =============================
=====    Modal Delete Card  =======
	=================================== -->	 
<div class="modal fade" id="delete_card" tabindex="-1" role="dialog" aria-labelledby="delete_card" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Card Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php
	# Open database connection.
	require ( 'includes/connect_db.php' ) ;
	
	 # Retrieve items from 'users' database table.
	$q = "SELECT * FROM payments WHERE user_id={$_SESSION[user_id]}" ;
	$r = mysqli_query( $con, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
  
  echo '<div class="col-sm">';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
	
		
			<h1>Card Stored</h1>
			<strong> Card Holder : </strong> '  . $row['full_name'] . ' </p>
			<strong> Card Number : </strong> '  . $row['card_number'] . ' </p>
			<strong> Expire Date : </strong> '  . $row['exp_month'] . '   '  . $row['exp_year'] . '</p>
			 </div>
			 
				
				<div class="modal-footer">
				 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  <div class="form-group">
				   <form action="delete_card.php" method="post">
				   
					<a href="delete_card.php?user_id=' .$row['user_id'] . '" class="btn btn-dark btn-lg btn-block" >Delete</a>
				  </div>
				</div>
         </form>		
		 
      </div>
     
    </div>
  </div>
</div>
		
	';
  }
	
  # Close database connection.
  mysqli_close( $con ) ; 
}
else { echo '<div class="container"><h3>No card stored</h3>
<div class="modal-footer">
				 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>' ; }
?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="stylesheet.css" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	

 

