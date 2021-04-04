<?php

$req=($_POST["mydata"]);
$req=implode("&",$req);

$q=mysqli_connect('localhost','root','','newdb');
$inq="INSERT INTO `users`(`email`) VALUES ('$req')";
$stutas=mysqli_query($q,$inq);
echo $stutas;


?>