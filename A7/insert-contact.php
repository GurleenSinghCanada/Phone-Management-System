<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Phone Management System</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        p {
            font-size: 30px;
            margin-bottom: 20px;
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
    <div class="container">
        <?php
        $ContactName = $_POST["ContactName"];
        $ContactType = $_POST["ContactType"];
        $DateCalled = $_POST["DateCalled"];
        $TimeCalled = $_POST["TimeCalled"];
        $ContactPicture = $_POST["ContactPicture"];

        $dsn = "mysql:host=localhost;dbname=contactinfo;charset=utf8mb4";
        $dbusername = "root";
        $dbpassword = "";
        $pdo = new PDO($dsn, $dbusername, $dbpassword);

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

        $stmt = $pdo->prepare("INSERT INTO `contacts` (`contactId`, `contactName`, `contactType`, `missed`, `DateCalled`, `TimeCalled`, `ContactPicture`, `isFavourite`) 
        VALUES (NULL, '$ContactName', '$ContactType', '$missed', '$DateCalled', '$TimeCalled', '$ContactPicture', '$isFavourite')");

        $stmt->execute();
        ?>
        <p>Thanks for your input!</p>
        <a class="btn btn-primary" href="select-contacts.php">Click here to see the records</a>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
