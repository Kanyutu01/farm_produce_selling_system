<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
button {
    background-color: white;
    box-shadow: 10px solid black;


}

body {
    background-color: rgb(241, 243, 239);
    font-size: 20px;


}

.btn {
    width: 10%;
    height: 5%;
    font-size: 22px;
    padding: 0px;
}

form {
    background-color: rgba(0, 0, 0, 0.75);
    border-radius: 20px;
    border: 2px solid orange;
}

.container {
    background-color: white;

    background: white;
    border-radius: 10px;
    margin: auto;
    color: white;
    width: 60vh;
    font-size: 20px;
    border: 2px solid orangered;
}

img {
    object-fit: contain;
    height: 80px;
    width: 30%;


}

* {
    font-size: 28px;
}



label {
    display: flex;
    flex-wrap: wrap;
    flex-direction: start;
    font-size: 20px;
}

input {
    width: 97%;
    background-color: white;
    margin: auto;
}

table {
    height: 100%;
    width: 100%;
    border-collapse: collapse;

}

nav {
    background-color: white;
    border: 1px solid black;
    justify-content: end;
    flex-wrap: wrap;
    display: flex;
    margin-bottom: 1px;
    position: fixed;
    width: 100%;

}

li {
    list-style: none;
    display: inline;
    padding: 20px;
    color: black;
    font-size: 20px;
    font-weight: bold;
    margin-top: 0;
}

.left {
    background-color: white;
    border: 1px solid black;
    color: black;
    width: 20%;
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 100vh;
    position: fixed;
    font-size: 20px;
    font-weight: bold;
    float: left;

}

.profile_Container {

    background-color: white;
    width: 80%;
    float: right;


    padding: 10vh;
    background-color: rgb(245, 243, 239);
    height: 70vh;
    align-items: center;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    border-radius: 10px;
    border: 2px solid black;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    margin-top: 70px;
}

.side-table {
    font-size: 15px;
}
</style>

<body>

    <nav>
        <li><a href="seller.html">HOME</a></li>
        <li><a href="postedProducts.php">My Products</a></li>
        <li><a href="PostPage.html">POST</a></li>
        <li><a href="Contacts.html">CONTACTS</a></li>
        <li><a href="sales.php">SALES</a></li>
        <li><a href="order.php">ORDERS</a></li>
        <li><a href="profile.php">PROFILE</a></li>
        <li><a href="farmerLogin.html">LOGOUT</a></li>
    </nav>
    <div class="left">

        <table class="sidetable">
            <tr>

                <td><u>FACTUAL DATA</u></td>
            </tr>
            <tr>
                <td><a href="weather.html">WEATHER</a></td>
            </tr>
            <tr>
                <td><a href="order.php">ORDERS</a></td>
            </tr>
            <tr>
                <td><a href="data.php">Buyers Location</a></td>
            </tr>
            <tr>
                <td><a href="Contacts.html">Customer care</a></td>
            </tr>
            <tr>
                <td><a href="indexPage.php">Message</a></td>
            </tr>
        </table>
    </div>

    <div class="profile_Container">
        <div class="container">


            <?php
        $conn =new mysqli('localhost', 'root', '', 'soen370');
        if($conn->connect_error){
            die ("connection failed: " .$conn->connect_error);
        }
        $query="SELECT *FROM farmersDetails  where email=(SELECT updatedemail FROM detailsChecker)";

        $result=$conn->query($query);
        

        if($result->num_rows >0){
            while($row=$result->fetch_assoc()){
                
               
                ?>
            <form action="profileUpdater.php" method="post">
                <table>
                    <tr>
                        <td>
                            <center>
                                <img src="<?php echo $row['image'];?>" class="imagestyle" style="width:100%;">

                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">FIRST NAME:</label>
                            <input type="text" name="fName" value="<?php echo $row['fName']?>">
                        </td>

                    <tr>

                        <td>
                            <label for="">LAST NAME:</label>
                            <input type="text" name="lName" value="<?php echo $row['lName']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">PASSWORD:</label>
                            <input type="text" name="password" value="<?php echo $row['password']?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Address:</label>
                            <input type="text" name="Address" value="<?php echo $row['Address']?>">
                        </td>
                    </tr>


                </table>
                <center> <button>UPDATE</button></center>
            </form>

            <?php
            }
      
        }
        else{
            echo "0 results";
        }
        $conn->close();
        ?>
        </div>
    </div>
</body>

</html>