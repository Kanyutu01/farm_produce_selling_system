<?php
    $email=$_POST['email'];
    $password=$_POST['password'];

    $con=new mysqli("localhost", "root", "", "soen370");

    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    }
    else{
       
        $stmt=$con->prepare("SELECT * FROM farmersdetails where email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();

        if($stmt_result->num_rows>0){
            $stmt1=$con->prepare("update detailsChecker set updatedemail='' where columnId='cold1'");
            $stmt2=$con->prepare("update detailsChecker set updatedemail=? where columnId='cold1'");
            $stmt2->bind_param("s", $email);
            

            $stmt1->execute();
            $stmt2->execute();

           /* $stmt2_result=$stmt->get_result();*/

            $data=$stmt_result->fetch_assoc();
            
            if($data['password']===$password){
                if($data['Type']==="Seller"){
                header("Location:seller.html");
                }else{
                    header("Location:index.php");
                }
            }
            else{
                header("Location:farmerLogin.html");
            }

        }else{
            echo"<h2>Invalid Email or password</h2>";
        }
    }

?>