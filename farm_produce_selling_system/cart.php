if(mysqli_query($conn, $sql)){
echo "inserted successfully..!";
header("Location:farmerLogin.html");
}<DOCtype html>
    <html>

    <head>
        <title>Cart</title>
        <link rel="stylesheet" href="style1.css">
    </head>

    <body>
        <div class="nav">
            <ul>
                <a href="Home.php">Home</a>
                <a href="index.php">Products</a>
                <a href="orders.php">Orders</a>
                <a href="profil.php">Profile</a>
                <a href="aboutus.php">About US</a>
                <a href="cart.php">Cart</a>
            </ul>
        </div>


    </body>

    </html>
    <?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["productId"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}
if(isset($_POST['action']) && $_POST['action']=="buy"){

        $sql = "INSERT INTO orders  VALUES(productName,productId,quantity,items)  WHERE productId=['productId']
        ";
        $result = $conn->query($sql);
		
	
}
	

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['productId'] === $_POST["productId"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
    <div class="cart">
        <?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
        <table class="table">
            <tbody>
                <tr>
                    <td></td>
                    <td>ITEM NAME</td>
                    <td>QUANTITY</td>
                    <td>UNIT PRICE</td>
                    <td>ITEMS TOTAL</td>
                </tr>
                <?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
                <tr>
                    <td>
                        <img src='<?php echo $product["productImage"]; ?>' width="50" height="40" />
                    </td>
                    <td><?php echo $product["productName"]; ?><br />
                        <form method='post' action=''>
                            <input type='hidden' name='productId' value="<?php echo $product["productId"]; ?>" />
                            <input type='hidden' name='action' value="remove" />
                            <button type='submit' class='remove'>Remove Item</button>
                        </form>
                    </td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='productId' value="<?php echo $product["productId"]; ?>" />
                            <input type='hidden' name='action' value="change" />
                            <select name='quantity' class='quantity' onChange="this.form.submit()">
                                <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                                <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                                <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                                <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                                <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                            </select>
                        </form>
                    </td>
                    <td><?php echo "Ksh".$product['unitPrice']; ?></td>
                    <td><?php echo "Ksh".$product['unitPrice']*$product["quantity"]; ?></td>
                </tr>
                <?php
$total_price += ($product['unitPrice']*$product["quantity"]);
}
?>
                <tr>
                    <td colspan="5" align="right">
                        <strong>TOTAL: <?php echo "Ksh".$total_price; ?></strong>
                        <br>
                        <br>
                        <form method='post' action=''>
                            <input type='hidden' name='productId' value="<?php echo $product["productId"]; ?>" />
                            <input type='hidden' name='action' value="buy" />
                            <input type="submit" name="buy" value="BUY" style="background:orange; border-radius:9px;">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
    </div>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
        <?php echo $status; ?>
    </div>