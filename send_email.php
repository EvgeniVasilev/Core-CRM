<?php
require_once './functions/crud.php';
require_once './templates/head.php';
$to = $_REQUEST["email"];
$full_name = $_REQUEST["full_name"];
$message = $_REQUEST['message'];
$caption = "Message from Orenda CRM Services";


$message_mail = <<< MSG
<html>
    <head>
        <title>Message from Orenda CRM</title>
        <meta charset= "utf-8"/>
        <style>
            h3{
                background-color: rgb(34,34,34);
                color: white;
                padding: 10px;
                width: 480px;
                text-align: center;
                border-radius: 5px;
            }
            p{
                font-family: Arial, Verdana,sans-serif;
                font-size: 14px;
                text-alin: justify;
            }
        </style>
    </head>
    <body>
    <h3>
        $caption
    </h3>
    <p>
        $message
    </p>
    </body>
</html>
MSG;


// headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html; charset=utf-8";
$headers .= "From: <evgeni.vasilev1209@gmail.com>";
$headers .= "X-Mailer:PHP  /". phpversion();

$mail = mail($to,$caption,$message_mail, $headers);
?>
<div class="container-fluid window">
<?php
$notification = <<< NOTE
<div class="alert-success slick">
   <p>You have just sended the following E-mail to <b><u>$full_name</u></b><?p>
</div>
NOTE;
if($mail){
  echo $notification;  
}
echo $message_mail;
 ?>
</div>

<?php
require_once './templates/footer.php';    