<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            /* Adjust the max-width to make the form wider */
            max-width: 600px; /* Updated width */
        }

        h1 {
            font-size: 40px;
            margin-bottom: 20px;
            color: black;
            text-align: center;
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

        /* Add custom styles for table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
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
        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="file"],
        .form-check-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-check-label {
            margin-left: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    </style><?php
$ContactId = $_GET["ContactId"];

// Connect to the database
$dsn = "mysql:host=localhost;dbname=contactinfo;charset=utf8mb4";
$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

// Prepare SQL statement
$stmt = $pdo->prepare("SELECT * FROM `contacts` WHERE `ContactId` = $ContactId; ");

// Execute SQL statement
$stmt->execute();

// Fetch the record
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Update Record</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
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
                    <th>Favorite</th>
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
            <br>
            <form action="process-update.php" method="POST">
                <input name="ContactId" value="<?= $row["ContactId"] ?>" type="hidden">

                <div class="form-group">
                    <label for="ContactName">Contact Name</label>
                    <input type="text" name="ContactName" class="form-control" value="<?= $row["contactName"] ?>"><br>
                </div>

                <div class="form-group">
                    <label>Contact Type:</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="ContactType" value="mobile" class="form-check-input" <?= $row["contactType"] === "mobile" ? "checked" : "" ?>>
                        <label for="mobile" class="form-check-label">Mobile</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="ContactType" value="home" class="form-check-input" <?= $row["contactType"] === "home" ? "checked" : "" ?>>
                        <label for="home" class="form-check-label">Home</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="ContactType" value="work" class="form-check-input" <?= $row["contactType"] === "work" ? "checked" : "" ?>>
                        <label for="work" class="form-check-label">Work</label>
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="missed" class="form-check-input" <?= $row["missed"] == 1 ? "checked" : "" ?>>
                    <label for="missed" class="form-check-label">Missed</label><br>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="isFavourite" class="form-check-input" <?= $row["isFavourite"] == 1 ? "checked" : "" ?>>
                    <label for="isFavourite" class="form-check-label">Favourite</label><br>
                </div>

                <div class="form-group">
                    <label for="DateCalled">Date Called</label>
                    <input type="date" name="DateCalled" class="form-control" value="<?= $row["dateCalled"] ?>"><br>
                </div>

                <div class="form-group">
                    <label for="TimeCalled">Time Called</label>
                    <input type="time" name="TimeCalled" class="form-control" value="<?= $row["timeCalled"] ?>"><br>
                </div>

                <div class="form-group">
                    <label for="ContactPicture">Contact Picture:</label>
                    <input type="file" name="ContactPicture" class="form-control-file"><br>
                </div>

                

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
