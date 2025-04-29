<?php 
    include 'database.php'; 
    $search = $_GET['query'];
    $search = mysqli_real_escape_string($conn, $search);
    $query = "SELECT * FROM products WHERE product LIKE '%$search%' OR brand LIKE '%$search%'";
    $products = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Vegan Skincare Products</title>
    
    <link rel="stylesheet" href="table.css">

</head>
<body>
<div id="container">

<form action="results.php" method="get">
  <label for="query">Search:</label>
  <input type="text" id="query" name="query" required>
  <input type="submit" value="Search">
</form>


<table>
	<!-- table column headings -->
	<tr>
	  <th>Product</th>
	  <th>Brand</th>
	  <th>Price (Low)</th>
	  <th>Price (High)</th>
	</tr>

<!-- Begin PHP while-loop to display database query results
     with each row enclosed in TD tags.
     Each time it loops, it writes ONE ROW.
	 This code depends on the first 5 lines at the start of this file.
	 $socks comes from that code.
	 NOTE all form controls must have a name= attribute.
     -->
<?php while ($row = mysqli_fetch_assoc($products)) :  ?>

<tr>
  <!-- notice how, above, the database record id becomes
       the id and value of the radio button -->
  <td><?php echo $row['product']; ?></td>
  <td><?php echo $row['brand']; ?></td>
  <td>$<?php echo $row['low']; ?></td>
  <td>$<?php echo $row['high']; ?></td>
</tr><!-- end of HTML table row -->

<?php endwhile;  ?>
<!-- end the PHP while-loop
     everything else on this page is normal HTML -->

</table>

</div>

<p id='footer-content'>This page was created by Brodie Henson as the final project for JOU4364: Advanced Web Apps for Communicators at the University of Florida. It was built using a MySQL database and the information was scraped from the beauty retail sites Ulta, r.e.m. beauty and Pacifica. The link to the GitHub repo for this project can be found here.</p>


</body>
</html>