<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
</head>

<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];  
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "formDS1";

        $createDB = "CREATE DATABASE IF NOT EXISTS $dbname;";
        $tableName = "students";

        $createTB = "CREATE TABLE IF NOT EXISTS $tableName ( firstName VARCHAR(10));";
        

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        if($conn){
            $conn->query($createDB);
            // $conn->query($createTB);
        }

        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn){
            // $conn->query($createDB);
            $conn->query($createTB);
        }

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO $tableName VALUES ('$name');";

        if ($conn->query($sql) == FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }

    
?>
<body>
    <form action="" method="POST">
        <input type="text" name="name">
        <input type="submit">
    </form>
</body>
</html>