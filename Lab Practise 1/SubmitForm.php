<?php
$conn = mysqli_connect("localhost", "root","", "mydb" );

if(!$conn){
    die("couldn't connect to database");
}

$sql = "CREATE TABLE IF NOT EXISTS FormTable(
    UserId varchar(12),
    Pass varchar(255) not null,
    UserName varchar(255) not null,
    Email varchar(255),
    Addr varchar(255),
    Country varchar(255),
    Sex varchar(10),
    Lang Varchar(100)
)";

$mq = mysqli_query($conn, $sql);
if (!$mq)  
{ 
  echo"Could not created table";
}

    $UserId = $_POST['userId'];
    $Pass = $_POST['passId'];
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $country = $_POST['country'];
    $Sex = isset($_POST["sex"]) ? $_POST["sex"] : "";
    $Language = isset($_POST["en"]) ? "English" : "";
    $Language .= isset($_POST["nonen"]) ? " Non English" : "";

    $sql = "INSERT INTO FormTable (UserId, Pass, UserName, Email, Addr, Country, Sex, Lang) VALUES('$UserId', '$Pass', '$Name', '$Email', '$Address', '$country', '$Sex', '$Language')";

    $mq = mysqli_query($conn,$sql);
    if (!$mq) {
        echo "Could not insert data: ";
    } else {
        header("Location: Form.php");
        exit();
    }

    mysqli_close($conn);

?>