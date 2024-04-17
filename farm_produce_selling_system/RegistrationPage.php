<?php
$server='';
$username='';
$password='';
$dbname='';

$conn=new mysqli($server, $username, $password, $dbname);
 
if(isset($_POST['sub'])) {
	 $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $password=$_POST['password'];
    $conPassword=$_POST['conPassword'];
    $email=$_POST['email'];
    $Type=$_POST['Type'];
    $Address=$_POST['Address'];
    $latitude=$_POST["latitude"];
    $longitude=$_POST["longitude"];
 
	//code for image uploading
	if($_FILES['f1']['name']){
		move_uploaded_file($_FILES['f1']['tmp_name'], "upload/".$_FILES['f1']['name']);
		$image="upload/".$_FILES['f1']['name'];
	}
 
	 $sql="INSERT INTO farmersdetails (fName, lName, password, conPassword, email, Type, Address, longitude, latitude, image)
 VALUES ('$fName', '$lName', '$password', '$conPassword', '$email', '$Type', '$Address','$longitude', '$latitude', '$image')";
     if(mysqli_query($conn, $sql)){
		echo "inserted successfully..!";
        header("Location:farmerLogin.html");
	}
    
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>FARMERS WEBSITE</title>
    <style>
    body {
        background-image: url("istockphoto-1369012070-1024x1024.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }

    form {
        margin: auto;
        width: 50vh;
        border: 4px solid yellow;
        border-radius: 20px;
        margin-top: 30vh;
        background-color: rgba(255, 255, 255, 0.75);
        padding: 5px;
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.5);
    }

    input {
        border: none;
        border-bottom: 2px solid black;
        background-color: transparent;
    }

    .imageFile {
        border: none;
    }
    </style>
</head>

<body>

    <body onload="getLocation()" autocomplete="off">
        <form method="POST" class="myForm" enctype="multipart/form-data">
            <table>
                <tr>
                    <center style="background-color:white; color:lawngreen; font-size: 20px; font-weight: bold;">
                        <img src="images/new.png" alt="header image"><br>

                        <head>Registration Form</head>

                    </center>
                </tr><br>

                <tr>
                    <td>
                        <label for="">First Name:</label>
                        <input type="text" name="fName" required>
                    </td>
                    <td>
                        <label for="">Last Name:</label><br>
                        <input type="text" name="lName" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Password</label>
                        <input type="password" name="password" required minlength="7" maxlength="10">
                    </td>
                    <td>
                        <label for="">Confirm Password</label>
                        <input type="Password" name="conPassword" required minlength="7" maxlength="10">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Email</label>
                        <input type="email" name="email" required>
                    </td>
                    <td>
                        <label for="">Type</label><br>
                        <input type="text" list="Type" name="Type" required>
                        <datalist id="Type">
                            <option value="Seller">Farmer</option>
                            <option value="Purchaser">Buyer</option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Address</label>
                        <input type="text" name="Address">
                    </td>
                    <td>

                        <input type="file" name="f1" />
                    </td>
                </tr>

            </table>
            <input type="hidden" name="latitude" value="">
            <input type="hidden" name="longitude" value="">

            <center>
                <input type="submit" value="submit" name="sub"
                    style="border: 2px solid black; background:orange; border-radius:20%;">
            </center>
        </form>
        <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                    location.reload();
                    break;

            }
        }
        </script>
    </body>

</html>
