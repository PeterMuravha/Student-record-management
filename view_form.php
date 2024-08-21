<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: url('/FinalWebsite/images/page.jpg');
            height: 100vh;
            background-size: cover;
            background-position: center;
            object-fit: contain;
            font-style: italic;
            color: white;
        }

        .main {
            margin-top: 5%;
        }

        .container {

            margin: 0 auto;
            max-width: 1200px;
        }

        table {
            max-width: 1200px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: black;
            border-radius: 10px;

        }

        .container table th {
            border-bottom: 1px solid black;
            width: 250px;
            height: 50px;
            text-align: left;
            font-size: 20px;
            font-style: italic;
        }

        .container table td {
            border-bottom: 1px solid black;
            width: 250px;
            height: 40px;
            font-size: 16px;
            font-size: 18px;
        }

        .container table tr:nth-child(even) {
            background-color: blue;
        }

        .edit {
            background-color: blue;
        }

        .delete {
            background-color: red;
        }

        button {
            height: 30px;
            width: 60px;
            border: none;
        }

        a {
            color: white;
            text-decoration: none;

        }

        li {
            list-style: none;
            margin-top: 30px;
            margin-right: 40px;
        }

        a {
            text-decoration: none;
            font-size: 20px;
            color: white;
            font-style: italic;

        }

        li:hover {
            transform: translateY(-3px);
        }

        .list {
            display: flex;
        }

        .navbar {
            height: 80px;
            width: 100.8%;
            background-color: black;
            display: flex;
            justify-content: space-between;
        }

        h1 {
            color: blue;
            margin-left: 20px;
            font-style: italic;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="page">
            <h1>VIEW DATABASE</h1>
        </div>
        <div class="list">
            <li><a href="/FinalWebsite/main_menu.php">Main Menu</a></li>
            <li><a href="/FinalWebsite/add_record.php">Add Record</a></li>
            <li><a href="/FinalWebsite/update_form.php">Update Record</a></li>
            <li><a href="/FinalWebsite/delete_form.php">Delete Record</a></li>
            <li><a href="/FinalWebsite/search_form.php">Search Record</a></li>
        </div>
    </div>
    <div class="main"></div>
    <div class="container">
        <h2>VIEW RECORD DATABASE</h2>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Reg</th>
                <th>User Name</th>
                <th>Password</th>
            </thead>

            <tbody>
                <?php

                include('config.php');

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if (!$result) {
                    die('Invalid query' . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[FirstName]</td>
                    <td>$row[LastName]</td>
                    <td>$row[Reg]</td>
                    <td>$row[Username]</td>
                    <td>$row[Password]</td>
                </tr>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>