<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>User Data</h2>

<table>
    <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Country</th>
        <th>ZIP Code</th>
        <th>Email</th>
        <th>Sex</th>
        <th>Languages</th>
        <th>About</th>
    </tr>
    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration_php_task_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the database
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["userid"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td>" . $row["zip"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["sex"] . "</td>";
            echo "<td>" . $row["languages"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No data found</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
