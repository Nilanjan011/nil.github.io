<?php
 $host="localhost";
 $user="root";
 $pass="";
 $db="td";
 $con=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
 $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>