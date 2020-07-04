<html><head><title>Mail PHP</title></head>
<body>

<?php
$to = "poongkundran2006@gmail.com";
$subject = "php mail";
$txt = "my msg";
$header = "From:poongkuyilmuse@gmail.com \r\n";
$header .= "Cc:poongkuyilbtech@gmail.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";


$result = mail ($to,$subject,$txt,$header);

if($result == TRUE) 
{
	echo "message sent succcessfully..";
}
else
{
	echo "message could not be sent...";
}

?>

</body></html>