<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Delete Confirmation</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        h1 {
            font-size: 40px;
            font-weight: bolder;
        }

        h3 {
            font-size: 18px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        div {
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c82333;
        }

        .redirect-button.blue {
            background-color: #007BFF;
        }

        .redirect-button.blue:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    $contactId = $_GET["ContactId"];

    //connect
    $dsn = "mysql:host=localhost;dbname=contactinfo;charset=utf8mb4";
    $dbusername = "root";
    $dbpassword = "";
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    //prepare
    $stmt = $pdo->prepare("SELECT * FROM `contacts` WHERE `contactId`= $contactId; ");

    //execute
    $stmt->execute();

    //process
    $row = $stmt->fetch()
    ?>
    <div class="container">
        <h1>Are you sure you want to delete this record?</h1>
        <h3>
            <table class="table">
                <tr>
                    <th>Contact ID</th>
                    <th>Contact Name</th>
                    <th>Contact Type</th>
                    <th>Missed</th>
                    <th>Date Called</th>
                    <th>Time Called</th>
                    <th>Contact Picture</th>
                    <th>Is Favorite</th>
                </tr>
                <tr>
                    <td><?= $row["ContactId"] ?></td>
                    <td><?= $row["contactName"] ?></td>
                    <td><?= $row["contactType"] ?></td>
                    <td><?= $row["missed"] ?></td>
                    <td><?= $row["dateCalled"] ?></td>
                    <td><?= $row["timeCalled"] ?></td>
                    <td><?= $row["contactPicture"] ?></td>
                    <td><?= $row["isFavourite"] ?></td>
                </tr>
            </table>
        </h3>
        <form action="delete.php" method="POST">
            <input name="ContactId" value=<?= "$row[ContactId]" ?> type="hidden">
            <input type="submit" class="btn btn-danger" value="Yes">
            <input class="btn btn-primary redirect-button blue" type="submit" formaction="select-contacts.php" class="btn btn-danger" value="No">
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
