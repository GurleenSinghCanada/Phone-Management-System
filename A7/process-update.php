<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Update Record</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: bold;
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
    $contactName = $_POST["ContactName"];
    $dateCalled = $_POST["DateCalled"];
    $timeCalled = $_POST["TimeCalled"];
    $contactPicture = $_POST["ContactPicture"];

    $dsn = "mysql:host=localhost;dbname=contactinfo;charset=utf8mb4";
    $dbusername = "root";
    $dbpassword = "";
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    if (isset($_POST['contactType'])) {
        $contactType = $_POST["contactType"];
    } else {
        $contactType = "Home";
    }

    if (isset($_POST['missed'])) {
        $missed = 1;
    } else {
        $missed = 0;
    }
    if (isset($_POST["isFavourite"])) {
        $isFavourite = 1;
    } else {
        $isFavourite = 0;
    }

    //prepare
    $stmt = $pdo->prepare("UPDATE `contacts`
    SET `contactName`= '$contactName',
    `contactType`= '$contactType',
    `missed`= '$missed',
    `dateCalled`= '$dateCalled',
    `timeCalled`= '$timeCalled',
    `contactPicture`= '$contactPicture',
    `isFavourite`= '$isFavourite'  
    WHERE `ContactId`= $ContactId; ");

    if ($stmt->execute()) {
    ?>
        <div class="container">
            <h1>Record Updated</h1>
            <a href="select-contacts.php" class="btn btn-primary">Back to Records</a>
        </div>
    <?php
    } else {
    ?>
        <div class="container">
            <h1>Could not update record</h1>
            <a href="select-contacts.php" class="btn btn-primary">Back to Records</a>
        </div>
    <?php
    }
    ?>
</body>

</html>
