<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Records</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 20px;
            color: black;
        }

        a {
            display: inline-block;
            background-color: #007BFF;
            color: #fff;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }

        /* Add custom styles for table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Center align the data in the table cells */
        tbody td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Records</h1>
        <a class="btn btn-primary" href="form.php">Add a record</a>

        <?php
        //connect
        $dsn = "mysql:host=localhost;dbname=contactinfo;charset=utf8mb4";
        $dbusername = "root";
        $dbpassword = "";
        $pdo = new PDO($dsn, $dbusername, $dbpassword);

        //prepare
        $stmt = $pdo->prepare("SELECT * FROM `contacts`; ");

        //execute
        $stmt->execute();
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Contact ID</th>
                    <th>Contact Name</th>
                    <th>Contact Type</th>
                    <th>Missed</th>
                    <th>Date Called</th>
                    <th>Time Called</th>
                    <th>Contact Picture</th>
                    <th>Favorite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $stmt->fetch()) {
                ?>
                    <tr>
                        <td><?= $row["ContactId"] ?></td>
                        <td><?= $row["contactName"] ?></td>
                        <td><?= $row["contactType"] ?></td>
                        <td><?= $row["missed"] ?></td>
                        <td><?= $row["dateCalled"] ?></td>
                        <td><?= $row["timeCalled"] ?></td>
                        <td><?= $row["contactPicture"] ?></td>
                        <td><?= $row["isFavourite"] ?></td>
                        <td>
                            <a class="btn btn-danger" href='delete-confirmation.php?ContactId=<?= $row["ContactId"] ?>'>Delete</a>
                            <a class="btn btn-primary" href='update-confirmation.php?ContactId=<?= $row["ContactId"] ?>'>Update</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
