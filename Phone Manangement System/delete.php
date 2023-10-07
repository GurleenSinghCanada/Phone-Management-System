<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Delete Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #007BFF;
        }

        a {
            display: inline-block;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    $ContactId = $_POST["ContactId"];
    
    // Connect to the database
    $dsn = "mysql:host=localhost;dbname=contactinfo;charset=utf8mb4";
    $dbusername = "root";
    $dbpassword = "";
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    
    // Prepare SQL statement
    $stmt = $pdo->prepare("DELETE FROM `contacts` WHERE `contacts`.`ContactId`= $ContactId; ");
    
    // Execute SQL statement
    if ($stmt->execute()) {
        ?>
        <div class="container">
            <h1>Record Deleted</h1>
            <a href="select-contacts.php" class="btn btn-primary">Back to Records</a>
        </div>
        <?php
    } else {
        ?>
        <div class="container">
            <h1>Could Not Delete Record</h1>
            <a href="select-contacts.php" class="btn btn-primary">Back to Records</a>
        </div>
        <?php
    }
    ?>
</body>

</html>
