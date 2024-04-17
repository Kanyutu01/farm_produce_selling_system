<?php
$server='localhost';
$username='root';
$password='';
$dbname='SOEN370';

$conn=new mysqli($server, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
else{
    echo "<script>
    Alert('submitted successfully');
    </script>";

   if(isset($_POST['sub'])){ 
    $productName=$_POST['productName'];
    $productDescription=$_POST['productDescription'];
    $unitPrice=$_POST['unitPrice'];
    $totalProducts=$_POST['totalProducts'];
    $totalPrice=$_POST['totalPrice'];
    if($_FILES['productImage']['name']){
        move_uploaded_file($_FILES['productImage']['tmp_name'], "upload/".$_FILES['productImage']['name']);
        $productImage="upload/".$_FILES['productImage']['name'];
    }
    
    $email="SELECT updatedemail FROM detailsChecker";

    $result=$conn->query($email);
    if($result->num_rows >0){
        while($row=$result->fetch_assoc()){

           $email=  $row['updatedemail'];
           
           
  
    $sql="INSERT INTO products( productName , productDescription, productImage, unitPrice, totalProducts, totalPrice, email) VALUES ( '$productName','$productDescription' , '$productImage', '$unitPrice', '$totalProducts', '$totalPrice', '$email')";

    if($conn->query($sql)===TRUE){
        echo "New record created successfully";
        header("Location:postPage.php");
        exit();
    }else{
        echo "error: ".$sql. "<br>" .$conn->error;
    }
}
}
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
* {

    border-radius: 20px;
    margin: 0;
    padding: 0;
}

body {
    background-color: orangered;
    border: 1px solid black;
    height: 100vh;
}

.wholeBody {
    height: 100vh;
}

.pictureHolder,
.container {
    float: left;
    width: 50%;
    margin: 0;
    padding: 0;
    height: 100vh;
}


img {
    height: 100vh;

}

.container {
    background-color: rgba(225, 215, 254);
}

#productName,
.productPicture,
.aboutPrice {
    padding: 40px;
    margin: 0;
    border: 1px solid black;
    background-color: lightgoldenrodyellow;
    box-shadow: 0, 0, 0, 20px, orange;


}

label {
    justify-content: start;
    display: flex;
    flex-wrap: wrap;
}

button {
    font-size: 20px;
}

img {
    width: 100%;
}

wholeBody {
    justify-content: left;
    width: 100vh;
}
</style>

<body>
    <div class="wholeBody">
        <div class="pictureHolder">
            <img src="images/pexels-mark-stebnicki-2255935.jpg" alt="">

        </div>
        <div class="container">
            <form method="POST" action="postPage.php" enctype="multipart/form-data">
                <div id="productName">
                    <span id="nameOfProduct">
                        <label for="nameOfProducts">Product Name:</label>
                        <input type="text" name="productName" required>
                    </span>
                    <span id="productDescription">
                        <label for="productDescription">Product Description:</label>
                        <textarea name="productDescription" id="description" cols="30" rows="10"></textarea>
                    </span>

                </div>
                <div class="productPicture">
                    <span id="productPicture">
                        <label for="productPicture">product Picture</label>
                        <input type="file" id="productPicture" name="productImage" required>
                    </span>
                </div>
                <div class="aboutPrice">
                    <label for="unitPrice">Unit Price:</label>
                    <input type="text" name="unitPrice" required>
                    <label for="totalProducts">Total Products</label>
                    <input type="text" name="totalProducts" required>
                    <label for="totalPrice">Total price:</label>
                    <input type="text" name="totalPrice" required>
                </div>

                <button name="sub">Submit</button>

            </form>
        </div>
    </div>
</body>

</html>