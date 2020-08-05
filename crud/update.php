<?php
include("db.php");
try {
$sql="select * from user where id={$_POST["id"]}";
$stmt=$con->prepare($sql);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
// print_r($row);

} catch (\Throwable $th) {
    echo "the error id $th"; 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPDATE </title>
</head>
<body>
    <form action="up.php"  method="post">
        <input type="text" name="up_n" value="<?php echo $row["name"]; ?>">
        <br><br>
        <input type="text" name="up_r" value="<?php echo $row["rollno"]; ?>">
        <input type="hidden" name="id" value="<?php echo $row["id"];?>">
        <br><br>
        <input type="submit"name="submit">

    </form>
</body>
</html>
<?php $con=null;