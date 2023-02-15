<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Response</title>
<link rel="stylesheet" href="css/main.css">
</head>

<body>
<div id="container">

<?php
if (isset($_POST['sender_name']) && isset($_POST['sender_email'])) {

    $mail_to = 'yourname@youremail.com'; // specify your email here

    // script adapted from
    // http://webdesy.com/how-to-create-html-php-contact-form-part-2/

    // Assigning data from the $_POST array to variables
    $name = $_POST['sender_name'];
    $mail_from = $_POST['sender_email'];
    $message = $_POST['sender_message'];

    // Construct email subject
    $subject = ' Message from blah blah blah ';

    // Construct email body
    $body_message = 'From: ' . $name . "\r\n\n";
    $body_message .= 'Email: ' . $mail_from . "\r\n\n";
    $body_message .= 'Message: ' . $message;

    // Construct email headers
    $headers = 'From: ' . $mail_from . "\r\n";
    $headers .= 'Reply-To: ' . $mail_from . "\r\n";

    $mail_sent = mail($mail_to, $subject, $body_message, $headers);

// now PHP will write a response message in the HTML of THIS page --> 
    if ($mail_sent == true){ ?>
        <h1>Thank you!</h1>
        <p>Your message has been received.</p>
        <!--  window.history.back();  leaves form fields filled  -->

    <?php } else { ?>

        <h1>Message not sent.</h1>
        <p>We are sorry. There has been an error.</p>

    <?php
    }
    // end of message if form was received; next, message if no form 
    // or wrong form was received 
} else { ?>
    <h1>The form was not received.</h1>
    <p>Perhaps you are on the wrong page.</p>
<?php
}
?>



</div> <!-- end container div -->

</body>
</html>
