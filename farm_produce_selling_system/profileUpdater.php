<?php

$server='localhost';
$username='root';
$password='';
$dbname='soen370';

$conn=new mysqli($server, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
else{
    echo "connection successful";

    
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $password=$_POST['password'];
    $conPassword=$_POST['password'];
    $Address=$_POST['Address'];
    
 
    if($password!=$conPassword){
        echo "Password error";
    }
    else{
    $sql="UPDATE farmersdetails SET fName = '$fName',lName = '$lName',password = '$password',  Address='$Address' WHERE email=(select updatedemail from detailsChecker) ";
    
    


    if($conn->query($sql)===TRUE){
    
                echo "success";
        echo "record updated successfully";
        header("Location:profile.php");
        exit();
    
    }else{
        echo "error: ".$sql. "<br>" .$conn->error;
    }
}
}

?>