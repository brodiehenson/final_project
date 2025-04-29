<?php 
    include 'database.php'; 
    $query = "SELECT * FROM products";
    $products = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Vegan Skincare Products</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&family=Questrial&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="table.css">

</head>
<body>
<div id="container">

     <h1>Welcome to Vegan Skincare</h1>

     <img src='rembeauty.png' alt='r.e.m. beauty product image'>
     <img src='elf.png' alt='elf product image'>
     <img src='peachandlily.png' alt='peach and lily product image'>
     <img src='bubble.png' alt='bubble product image'>
     <br>
     <caption>Photos of r.e.m. beauty, e.l.f. Cosmetics, Peach and Lily and Bubble products taken from Ulta.</caption>

     <div id='description'>
          <p>Shopping for vegan and cruelty-free products can be quite difficult, especially when you're first starting out as a vegan. At this site, I've made it convenient for you to check out all kinds of vegan skincare products by compiling those offered by retailers and beauty companies, including Ulta, r.e.m. beauty and Pacifica. Search for a brand, product or product type (e.g., moisturizer, sunscreen) and see what options are available to meet your needs!</p>
     </div>

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