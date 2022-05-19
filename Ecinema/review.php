<?php # DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'Cinema Experience' ;
session_start() ;
if(!empty($_SESSION))
  {
    include ( 'includes/nav_logout.php' );
  }
  else
  {
     include ('includes/nav.html');
  }
# Access session.


# Redirect if not logged in.


# Open database connection.
require ( 'includes/connect_db.php' ) ;

echo '<div class="container">
		<div class="row align-items-center">
			<div class="col">
		    
		
	';

# Display body section, retrieving from 'mov_rev' database table.
$q = "SELECT * FROM mov_rev" ;
$r = mysqli_query( $con, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  echo '
  
	<div id="txtHint">
	 <!-- Display Search -->	
	</div>
			
	 <h1> OUR CINEMA</h1>         
        
<p>
                       AT OUR CINEMA YOU CAN ENJOY GREAT MOVIES WITH THE IMAX EXPERIENCE WITH A GREAT RANGE OF CONFECTIONARYS AT HAND  

</p>


  
<p><center>

------------------------------------------------ OUR Tasty Snacks---------------------------------------------------- 
</p>
<p><center>


SNACKS______________PRICE________________________________________________DRINKS____________PRICE
</p>
<p><center>
Sweet popcorn_______£4.50________________________________________________Slush Puppy_______£1.50
</p></center>
<p><center>
</p></center>
<p><center>
Salted Popcorn______£4.50________________________________________________Diet Coke_________£3.00
</p></center>
                                            <p><center>
                                             natchos_____________£7.00________________________________________________regular Coke______£3.00

                                            </p></center>
 <img src="img/corn.jpg" alt="venom" width="500" height="333"> <img src="img/blast.jpg" alt="corn" width="500" height="333"> 
		<h1 class="display-4">Movie Reviews </h1>
		<div class="row align-items-center">
			<div class="col">	
				';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">
			<h4 class="alert-heading">' . $row['mov_title'] . '  </h4>
			<p>Rating:  ' . $row['rate'] . ' &#9734</p>
			<p>' . $row['message'] . '</p>
			<p></p>
			<hr>
			<footer class="blockquote-footer">' . $row['first_name'] .' '. $row['last_name'] . '<cite title="Source Title">'. $row['post_date'].'</cite></footer>
		</blockquote>
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
		';
	
    
  }

	if(!empty($_SESSION))
	{
  echo '<tr><td><button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button></tr></td></table></div></div>' ;
	}
	else
  {
     echo '<tr><td><a href="login.php"><button type="button" class="btn btn-secondary" role="button" >Add Movie Review</button></a></tr></td></table></div></div>' ;
  }
  
}
else
{
echo '<p>There are currently no movie reviews.</p> <button type="button" class="btn btn-dark btn-lg btn-block role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button></a></div>' ; 
}
		



# Close database connection.
mysqli_close( $con ) ;
  
?>


<!-- Modal pi-->
<div class="modal fade " id="rev" tabindex="-1" role="dialog" aria-labelledby="rev" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rev">Movie Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php # DISPLAY POST MESSAGE FORM.

			# Access session.
			session_start() ;

			# Redirect if not logged in.
			if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }


			# Display form.
			echo '<div class="container">
				<form action="post_action.php" method="post" accept-charset="utf-8">
				<div class="form-check">
					<label for="mov_title">Movie Title: </label>
						<input type="text" class="form-control" name="mov_title" required>
					<label for="rate">Rate Movie: </label>
				<div class="form-check">
				
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="rate" value="5">&#9734; &#9734; &#9734; &#9734; &#9734;
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="rate" value="4">&#9734; &#9734; &#9734; &#9734; 
					</label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="rate" value="3">&#9734; &#9734; &#9734;
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="rate" value="2" >&#9734; &#9734; 
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="rate" value="1">&#9734;  
				  </label>
				</div>
				<div class="form-group">
					<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5" id="message" name="message" required></textarea>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input class="btn btn-dark" type="submit" value="Post Review">
					</div>
				</div>
		</form>
      </div>
    ';
# Close database connection.
mysqli_close( $con ) ;
		?>
          
          
          
          
	
  </body>
        
        
        
  
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheet.css" />

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html> 