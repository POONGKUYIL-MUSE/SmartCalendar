<?php

include 'C:\xampp\php\php.ini';
include 'C:\xampp\sendmail\sendmail.ini';

int_set("SMTP","dmtp.gmail.com");
inti_set("sendmail_from","<email-address>Agmail.com>");

$to = "8428992535@vtext.com";
$from = "poongkuyilmuse@gmail.com";
$msg = "My message";
$headers = "From: $from \n";

mail($to,"",$msg,$headers);
?>

