<?php

// phpinfo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!-- <form action="firest.php" method="post">
        <input type="text" name="ph" placeholder="enter">
        <input type="text" name="i" placeholder="enter id">
        <input type="submit" name="s" value="s">
    </form> -->
    <input type="text" id="id">
    <button onclick="show()">show</button>
    <button onclick="send()">send</button>
    <form>
        <div id="show">

        </div>
    </form>
    <script>
        var no;
        function show(){
            no = document.getElementById("id").value;
            // console.log(no);
            str="";
            for (let i = 0; i < no; i++) {
                str += `<input type="text" id="data[${i}]">`;
                document.getElementById("show").innerHTML=str;
            }
        }
        function send() {
             var data=[];
            for (let i = 0; i < no; i++) {
                data[i] = document.getElementById("data["+i+"]").value;              
            }
            // console.log(data);
            // data=JSON.stringify(data);
            // console.log(data);
            $.ajax({
                url:"ajax_im.php",
                type:"POST",
                data:{mydata:data},
                success: function (res) {
                    console.log(res);
                }
            });
        }


    </script>
</body>
</html>