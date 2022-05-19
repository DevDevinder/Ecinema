<!DOCTYPE html>
<html>

<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','HNDSOFT2SA3','Kp911JH34','HNDSOFT2SA3');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM movie WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "
	<div class=\"container\">
	<div class=\"alert alert-dark alert-dismissible fade show\" role=\"alert\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
	
	<table class=\"table table-borderless\">
  <thead>
    <tr>
     ";
while($row = mysqli_fetch_array($result)) {
    
	echo '<th><h4 class=\"alert alert-dark\" role=\"alert\"> ' . $row['movie_title'] . '</h4></th><th></th><thead>';
	echo '<tbody><td><img src=" '. $row['img'] .  ' "></td>';
    echo "<td>" . $row['further_info'] . "</td></tr>";
    echo "<tr><td><h2><span class=\"badge badge-secondary\">" . $row['screening_1'] . "</span><span class=\"badge badge-secondary\">" . $row['screening_2'] . "</h2></span></td>";
    echo "<td>
	<a href =". $row['book_now'] . "><button type=\"button\" class=\"btn btn-dark btn-block\">Book Now</button></a></td>";
    echo "</tr></tbody><table></div>";
}
echo "</div>";
mysqli_close($con);
?>
</body>
</html>