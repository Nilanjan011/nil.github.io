<?php
include("db.php");
if (isset($_POST["submit"])) {
    $id=$_POST["id"];
    if(!($_POST["up_n"])==""){
        $nam=$_POST["up_n"];
        $rol=$_POST["up_r"];
    }
    
    $up_sql="update user set name=?, rollno=? where id=?";
    $st=$con->prepare($up_sql);
    $result=$st->execute([$nam,$rol,$id]);

    if ($result) {
        header("location:crud.php");
    }
}