<?php
include("db.php");
if (isset($_POST['GoData'])) {

    if(!($_POST["name"])==""){
        $name=$_POST["name"];
        $roll=$_POST["rollno"];
        // echo "$name and $roll";

        // $insert= "INSERT INTO `user` (`name`,`rollno`) VALUES(?,?)"; #ataooo kaj kre6a
        $insert= "INSERT INTO user (name,rollno) VALUES(?,?)";
        $run=$con->prepare($insert)->execute([$name,$roll]);
    }
   
}

if (isset($_POST["delete"])) {
    $sql="DELETE FROM user WHERE id={$_POST["id"]}";
    $con->prepare($sql)->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cred operation </title>
</head>
<body>
<h2>insert record</h2>
    <form action="" method="post">
        <input type="name" name="name" placeholder="enter ur name">
        <br><br>
        <input type="text" name="rollno" placeholder="enter ur rollno.">
        <br><br>
        <input type="submit" name="GoData" value="submit">
    </form>
    <h2>dispay record</h2> 
    <table border="1">
        <thead>
            <tr>
                <td>NO.</td>
                <td>NAME</td>
                <td>ROLLNO.</td>
                <td>DELETE</td>
                <td>UPDATE</td>
            </tr>
        </thead>
        <tbody>
<?php  
        $sql="select * from user";
        $stmt=$con->prepare($sql);
        $stmt->execute();
        $i=1;
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
?>
            <tr>
                <td> <?php echo $i; ?> </td>
                <?php $i=$i+1; ?>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["rollno"]; ?></td>
                <td><form action="" method="post"><input type="hidden" name="id" value="<?php echo $row["id"]; ?>"><input type="submit" name="delete" style="color:red;" value="delete"> </form></td>
                <td><form action="update.php" method="post"><input type="hidden" name="id" value="<?php echo $row["id"]; ?>"><input type="submit" name="update" style="color:blue;" value="update"> </form></td>
            </tr>
    <?php
        }
    ?>
            
        </tbody>
    </table>
</body>
</html>
<?php
    $con=null;
?>