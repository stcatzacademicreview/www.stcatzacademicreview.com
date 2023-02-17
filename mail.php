<?php 

//Checking for errors
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

//If form submit
if(isset($_POST['submit'])){
    
    //Is it a real email
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){  
        
        $name = $_POST['name'];
        
        //Is there a name
        if($name!=""){
    
        $from = " "; // my Email address. Put one there
        $to = strip_tags($_POST['email']); //  Email address from the form

        //Email subject
        $subject = "Web Workshop Demo Email";
        
        //Add HTML contents in $message
        $message = " ";

        $headers = "From:".$from. "\r\n";
        $headers .= "Reply-To: ". $from . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  
              
         //Mail function   
        mail($to,$subject,$message,$headers);
            
            
        echo "Mail Sent. Thank you " . $name . ". The email you used was: ". $to;
            
        }else{ echo "Please enter a name"; }
        
    }else{ echo "Not a Valid Email"; }    
        
    }
?>




<!DOCTYPE html>
<html>

<head>
<title>Web Workshop Demo Email</title>
</head>

<body>
    <h1>Get Email</h1>
    <h3>Enter your email below to get the demo</h3>

    <form action="" method="post">
        Name: <input type="text" name="name" required />
        <br />
        Email: <input name="email" type="email" required />
        <input type="submit" name="submit" value="Send" />
    </form>

</body>

</html>
