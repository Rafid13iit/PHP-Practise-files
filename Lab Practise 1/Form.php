<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="">
    <h1>Registration Form</h1>
    <p>Use tab keys to move from one input field to next one.</p>
    <form action="SubmitForm.php" method="post">
        <ul>
            <li><label for="userId">User Id: </label></li>
            <li><input type="text" name="userId" id="userid" size="12" maxlength="12"></li>
            <li><label for="passId"> Password: </label></li>
            <li><input type="password" name="passId" id="passId" size="12"></li>
            <li><label for="userName">Name: </label></li>
            <li><input type="text" name="name" id="name" size="50"></li>
            <li><label for="address">Address: </label></li>
            <li><input type="text" name="address" size="50"></li>
            <li><label for="country">Country: </label></li>
            <li>
                <select name="country" id="">
                    <option selected="" value="Default">please select a country</option>
                    <option value="Australia">Australia</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Canada">Canada</option>
                    <option value="Russia">Russia</option>
                    <option value="USA">USA</option>
                </select>
            </li>
            <li><label for="email">Email: </label></li>
            <li><input type="email" name="email" id="email"></li>
            <li><label for="sex">Sex: </label></li>
            <li><input type="radio" name="sex" value="Male">Male</li>
            <li><input type="radio" name="sex" value="Female">Female</li>
            <li><label for="">Language: </label></li>
            <li><input type="checkbox" name="en" value="en"><span>English</span></li>
            <li><input type="checkbox" name="nonen" value="nonen"><span>Non English</span></li>
            <li><input type="submit"></li>
        </ul>

    </form>

    <a href="Sample.php"><button>Click me</button> </a>

    <br><br>
    <div class="clear"></div>
    <h3>Submitted data</h3>
    <hr>

    <table id="tblData" border="1">
        <?php
            $conn = mysqli_connect("localhost", "root","", "mydb");
            if(!$conn){
                die("Could not connect");
            }

            $sql = "SELECT * FROM FormTable";
            $mq = mysqli_query($conn,$sql);
            echo "<tr><th>UserID</th><th>Name</th><th>Email</th><th>Country</th><th>Sex</th><th>Language</th></tr>";
            while($row = mysqli_fetch_array($mq)){
                echo "<tr><td>".$row["UserId"]."</td><td>".$row["UserName"]."</td><td>".$row["Email"]."</td><td>".$row["Country"]."</td><td>".$row["Sex"]."</td><td>".$row["Lang"]."</td></tr>";
            }

            mysqli_close($conn);
        ?>
    </table>

    <script src="validation.js"></script>
</body>

</html>