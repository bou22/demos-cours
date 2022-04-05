<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
echo envoyerMail("8197600499@msg.telus.com", "Allo !");

function envoyerMail($to, $message) {
     $subject = '1er mail avec php';
     $headers = 'From: 8197600499@msg.telus.com' . "\r\n" .
     'Reply-To: 8197600499@msg.telus.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     return mail($to, $subject, $message, $headers);    
}



?>
    </body>
</html>
