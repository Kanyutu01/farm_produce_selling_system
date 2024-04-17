<html>
    <head>
    <link rel="stylesheet" type="text/css" href="orderStyling.css">
    <style>
        table:not(.sidetable){
            border-collapse:collapse;
            background-color:white;
            

        }
        tr td:not(.left){
            border:1px solid black;
        }
        body{
            background-color:white;
        }
        nav{
            background-color: white;
            border:1px solid black;
            justify-content:end;
            flex-wrap: wrap;
            display: flex;
            margin-bottom: 0;
            position:fixed;
            width:100%;
            top:0;

        }
        li{
            list-style: none;
            display:inline;
            padding:20px;
            color:black;
            font-size: 20px;
            font-weight: bold;
            margin-top:0;
            display:flex;
            justify-content: end;
            flex-wrap:wrap;
        }
        .left{
            background-color: white;
            border:1px solid black;
            color:black;
            width:20%;
            overflow-y:scroll ;
            scroll-behavior: smooth;
            height:100vh;
            position:fixed;
            font-size:20px;
            font-weight: bold;
            top:-10;
            left:-15;
            float:left;
            
            
        }
       .heading{
        width:80%;
        float:right;
        margin:auto;
        margin-top:115px;
    
       
        
        
        
       }
       div{
        float:right;
            margin:10px;
            height:70vh;
            width:100%;
            border:1px solid black;
            
       }
       .sidetable{
        height:100vh;
        left:0;
        top:0;
        border-collapse: collapse;
        width:100%;
        overflow-y:scroll;

       }
       #headStyle{
        margin:auto;
        margin-left:50px;
       }
       #sellersPage{
            margin-left:100px;
       }
       

    </style>
</head>
<body>
    <nav>
        <li id="sellersPage"><a href="seller.html">HOME</a></li>
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

<div class="heading">
    <h1 id="headStyle">SALES PAGE</h1>

    <center>
        
<?php
session_start();
$conn=mysqli_connect('localhost', 'root', '', 'soen370');
if(mysqli_connect_errno()){
    echo 'failed to connect: '.mysqli_connect_error();
}
if(isset($_POST['delete'])){
    $DeleteQuery="DELETE from orders WHERE id='$_POST[hidden]' AND orderStatus=fulfilled";
    mysqli_query($conn, $DeleteQuery);
}
if(isset($_POST['view'])){
    header('Location:viewOrders.php');
}
$query="SELECT * FROM orders WHERE orderStatus='fulfilled' ORDER BY id";
$results=mysqli_query($conn, $query);

echo '<table border="1">';
echo'<tr>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>EMAIL</th>';
    echo '<th>Order Name</th>';
    echo '<th>Order Code</th>';
    echo '<th>Order QTY</th>';
    echo '<th>SUB TOTAL</th>';
echo '</tr>';
while($orderData=mysqli_fetch_array($results)){
    echo '<form action="order.php" METHOD="POST">';
    echo '<tr>';
        echo '<td>'.$orderData['firstname'].'</td>';
        echo '<td>'.$orderData['lastname'].'</td>';
        echo '<td>'.$orderData['email'].'</td>';
        echo '<td>'.$orderData['ordername'].'</td>';
        echo '<td>'.$orderData['ordercode'].'</td>';
        echo '<td>'.$orderData['orderqty'].'</td>';
        echo '<td>'.$orderData['subtotal'].'</td>';
        echo '<td><input type="hidden" name="hidden" value="'.$orderData['id'].'"></td>';
        echo '<td><input type="submit" name="delete" value="Delete"></td>';
        echo '</form>';

        echo '</tr>';



}
echo '</table>';
mysqli_close($conn);
?>
    </center>
</div>
</body>
</html>