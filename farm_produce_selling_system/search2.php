<DOCtype html>
    <html>

    <head>
        <title>Search Results</title>
        <link rel="stylesheet" href="style1.css">
    </head>

    <body>
        <div class="nav">
            <ul>
                <a href="Home.php">Home</a>
                <a href="cart.php">Cart</a>
                <a href="orders.php">Orders</a>
                <a href="profile.php">Profile</a>
                <a href="aboutus.php">About US</a>
                <a href="cart.php">Cart</a>

                <div class="cart_div">

                </div>
            </ul>
        </div>

        <?php
  session_start();
include('db.php');
if(isset($_POST['search'])){
	
 $query=$_POST['search'];
$min_length=3;}
 if(strlen($query)>=$min_length){
	 $query=htmlspecialchars($query);
 //$query=mysqli_real_escape_string($query);
 }
	 ?>
        <?php
	 $results=mysqli_query($con,"SELECT * from products WHERE productName LIKE   '%$query%' ");
     if(mysqli_num_rows($results)>0){
	while($row = mysqli_fetch_assoc($results)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='productId' value=".$row['productId']." />
    <div class='image'><img src='".$row['productImage']."'style=width:200px;
	height:350px;/></div>
    <div class='name'>".$row['productName']."</div>
    <div class='price'>Ksh".$row['unitPrice']."</div>
	<div class='description'>".$row['productDescription']."</div>
    <div class='name'>".$row['email']."</div>
	<button type='submit' class='buy'>Buy Now</button>
	
    </form>
    </div>";
	 }}
         mysqli_close($con);
             ?>

    </body>

    </html>