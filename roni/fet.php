<?php
$data=json_decode(file_get_contents('php://input'));
// print_r($data);
$nam=$data->name;
$nam="abc_d".$nam;
$pass=$data->pass;
// $p=$_POST["pass"];
$res = array("name"=>$nam,"pass"=>$pass);
echo json_encode($res);
?>