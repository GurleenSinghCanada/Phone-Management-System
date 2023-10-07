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
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }

        label {
            font-weight: bold;
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
</head>

<body>
    <div class="container">
        <h1>Phone Management System</h1>
        <form action="insert-contact.php" method="POST">
            <div class="form-group">
                <label for="ContactName">Contact Name</label>
                <input type="text" name="ContactName" class="form-control">
            </div>
            <div class="form-group">
                <label>Contact Type:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="ContactType" value="mobile" checked class="form-check-input">
                    <label for="mobile" class="form-check-label">Mobile</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="ContactType" value="home" class="form-check-input">
                    <label for="home" class="form-check-label">Home</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="ContactType" value="work" class="form-check-input">
                    <label for="work" class="form-check-label">Work</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="missed" class="form-check-input">
                    <label for="missed" class="form-check-label">Missed</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="isFavourite" class="form-check-input">
                    <label for="isFavourite" class="form-check-label">Favourite</label>
                </div>
            </div>
            <div class="form-group">
                <label for="DateCalled">Date Called</label>
                <input type="date" name="DateCalled" class="form-control">
            </div>
            <div class="form-group">
                <label for="TimeCalled">Time Called</label>
                <input type="time" name="TimeCalled" class="form-control">
            </div>
            <div class="form-group">
                <label for="ContactPicture">Contact Picture:</label>
                <input type="file" name="ContactPicture" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
