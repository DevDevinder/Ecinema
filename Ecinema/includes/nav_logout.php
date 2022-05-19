<!doctype html>
<html lang="en">
<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="stylesheet.css" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
function showMovie(str) {
    if (str == "") {
".innerHTML"
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getmovie.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="index.php">Ecinema 2020</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="review.php">Cinema Experience <span class="sr-only">(current)</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="cart.php">Cart<span class="sr-only">(current)</span></a>
      </li>
	  
	  <li class="nav-item active">
        <a class="nav-link" href="checkout.php">Checkout<span class="sr-only">(current)</span></a>
      </li>
	  
    <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
    </div>
	  
	  </li>
	  --> 
	  
</ul>

	
	
	<!--<div class="form-group">
   <label for="exampleFormControlSelect1">Search Movies</label>
		<select class="form-control" id="exampleFormControlSelect1 name="movie" onchange="showMovie(this.value)">
      <option value="">Search Movie:</option>
		  <option value="1">Big Hero 6</option>
		  <option value="2">Dawn Planet of the Apes</option>
		  <option value="3">Interstellar</option>
		  <option value="4">Avengers</option>
		  <option value="5">Lego Movie</option>
		  <option value="6">Spiderman</option>
    </select>
	</div>-->
	
	
 <ul class="nav content-end">
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
		<li class="nav-item active">
        <a class="nav-link" href="user_dash.php">Account <span class="sr-only">(current)</span></a>
      </li>
		
       <li class="nav-item active">
        <a class="nav-link" href="goodbye.php"><i class="fa fa-user"></i> Sign Out  </a>
      </li>
	  
    </ul>
    
  </div>
		
		<!-- <li class="nav-item active">
        <a class="nav-link" href="goodbye.php"><i class="fa fa-user"></i> Sign Out  </a>
      </li>-->
	  
	</ul>

	
	
	
	</nav>
	
<div id="txtHint">  </div>


</html>




	
	