<?php

require 'config.php';
include 'randomComic.php';

$to = getMailIds();
$from = 'spridevfactory@gmail.com'; 
$fromName = 'Paresh Sharma'; 
$subject = "Comics by Paresh Sharma"; 
 
$message = getComic();

$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
 
// Send email
if(strlen(trim($to))==0){
   echo "Emails not found";
   return;
}
foreach(str_getcsv($to) as $mail){
   $message1 = $message."<a href='pareshsharma.com/unsubscribe.php?mail=$mail'><h5>Unsubscribe</h5></a>";
   if(mail($mail, $subject, $message1, $headers)){ 
      echo "<p>Email has sent to $mail successfully.</p>"; 
   }else{ 
      echo "<p>Email sending failed to $mail.</p>"; 
   }
}
?>