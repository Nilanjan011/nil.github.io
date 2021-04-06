<?php
include_once("db.php");

if ($_REQUEST['case']=="update") {
	// var_dump($_POST);
	// var_dump($_FILES);
	// exit;
	$rand=rand(1,9999999999999);
	$id=$_POST["id"];
	$name=$_POST["name"];
	$location=$_POST["location"];
	$details=$_POST["details"];
	$price=$_POST["price"];
	$file=$_FILES["image"]['tmp_name'];
	$file_name=$rand.$_FILES["image"]['name'];

	 if(isset($file) && $file!="") {// new image update 
	        $sql="update poperties set name=?, location=?,price=?,image=? where id=?";
	        $run=$con->prepare($sql)->execute([$name,$location,$price,$file_name,$id]);
	        move_uploaded_file($file,"avatars/".$file_name);
	       	header("location:./tables.php");
	        
	    }else{
	        // without image update 
	        $sql="update poperties set name=?, location=?,price=? where id=?";

	        $run=$con->prepare($sql)->execute([$name,$location,$price,$id]);
	        header("location:./tables.php");;
	      
	    }

	}

if ($_REQUEST['case']=="insert") {
$rand=rand(1,9999999999999);
$name=$_POST["name"];
$location=$_POST["location"];
$details=$_POST["details"];
$price=$_POST["price"];
$file=$_FILES["image"]['tmp_name'];
$file_name=$rand.$_FILES["image"]['name'];

move_uploaded_file($file,"avatars/".$file_name);



// echo "$name and $roll";

$insert= "INSERT INTO poperties (name,location,details,price,image) VALUES(?,?,?,?,?)";
$run=$con->prepare($insert)->execute([$name,$location,$details,$price,$file_name]);
   
header("location:./tables.php");
}

if($_REQUEST['case']=="delete"){
	$img=$_POST["image"];
    $sql="DELETE FROM poperties WHERE id={$_POST["id"]}";
    $con->prepare($sql)->execute(); 
    unlink("avatars/".$img);
    header("location:./tables.php");
}

	if($_REQUEST['case']=="muliple"){
		// print_r($_POST);
		$class_id=$_POST["class_id"];
		$component=$_POST["component"];

		$amount=$_POST["amount"];
		$count=(count($amount));
		for ($i=0; $i < $count; $i++) {
			$com=$component[$i];
			$amt=$amount[$i];
			$insert= "INSERT INTO student (class_id,component,amount) VALUES(?,?,?)";
			$run=$con->prepare($insert)->execute([$class_id,$com,$amt]);
		}
		header('location:student.php?case=class');

	}


?>
