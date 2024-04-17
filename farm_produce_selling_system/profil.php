<DOCtype html>
    <html>

    <head>
        <title>Products</title>
        <link rel="stylesheet" href="style1.css">
    </head>

    <body>
        <div class="nav">
            <ul>
                <a href="Home.php">Home</a>
                <a href="cart.php">Cart</a>
                <a href="orders.php">Orders</a>
                <a href="aboutus.php">About US</a>

            </ul>
        </div>
        <?php
 session_start();
$con=mysqli_connect('localhost', 'root', '','soen370');
if(mysqli_connect_errno()){
echo'failed to connect: '.mysqli_connect_error();}
 
$result = mysqli_query($con,"SELECT * FROM `farmersdetails` WHERE Type='Purchaser' AND email=(SELECT updatedemail FROM detailschecker)");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='clas'>
	<div class='hello'>
    <form method='post' action=''>
   
    <div class='image'><img src=".$row['image']." /></div>
    <div class='fname'>FirstName  :".$row['fName']."</div>
    <div class='lname'>LastName    :".$row['lName']."</div>
	<div class='email'>Email      :".$row['email']."</div>
	<div class='phoneNo'>Password   :".$row['password']."</div>
	<div class='location'>Address      :".$row['Address']."</div>
    
    </form>
    </div>
	</div>";
        }
mysqli_close($con);
?>

    </body>

    </html>