<?php

include('config.php');

$FirstName = "";
$LastName = "";
$Reg = "";
$Username = "";
$Password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Reg = $_POST["Reg"];
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    do {
        if (empty($FirstName) || empty($LastName) || empty($Reg) || empty($Username) || empty($Password)) {
            $errorMessage = "all field are required";
            break;
        }

        //insert
        $sql = "INSERT INTO users(FirstName,LastName,Reg,Username,Password)" . " VALUES('$FirstName','$LastName','$Reg','$Username','$Password')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "invalid query";
        }


        $FirstName = "";
        $LastName = "";
        $Reg = "";
        $Username = "";
        $Password = "";

        $successMessage = "Record created successfully";

        header("location: /FinalWebsite/view_form.php");
        exit;
    } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background:url('/FinalWebsite/images/page.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            overflow: hidden;
            object-fit: contain;
            color:white;
            font-style: italic;
        }

        .main {
            margin-top: 6%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            font-size: 18px;

        }

        form {
            padding: 30px;
            width: 80%;
            background-color: black;
            border-radius: 20px;
            
            
        }

        input {
            height: 30px;
            width: 500px;
            margin-bottom: 16px;
            outline: none;
            border-radius: 5px;
            border: 1px solid gray;
            background-color: gainsboro;

        }

        .reg {
            margin-left: 24px;
            margin-right: 22px;

        }

        label {
            margin-right: 250px;
            margin-left: 0;

        }

        .btns {
            display: flex;
            margin-left: 41%;
        }

        .btns button {
            height: 30px;
            width: 200px;
            margin-left: 20px;
            border-radius: 5px;
            border: 1px solid blue;
            color: white;
        }

        .sub {
            background-color: blue;
        }

        .btns button a {
            color: blue;
            text-decoration: none;
            font-size: 15px;
        }

        .pass {
            margin-left: 10px;
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
            <h1>ADD RECORD</h1>
        </div>
        <div class="list">
            <li><a href="/FinalWebsite/main_menu.php">Main Menu</a></li>
            <li><a href="/FinalWebsite/view_form.php">View Record</a></li>
            <li><a href="/FinalWebsite/update_form.php">Update Record</a></li>
            <li><a href="/FinalWebsite/delete_form.php">Delete Record</a></li>
            <li><a href="/FinalWebsite/search_form.php">Search Record</a></li>
        </div>
    </div>
    <div class="main"></div>
    <div class="container">
        <h2>INSERT RECORD</h2>

        <?php
        if (!empty($errorMessage)) {
            echo " <div class='alert'>
       <strong>$errorMessage</strong>
       <button type='button' class='btnClose' arial-label='Close'></button>
       </div>
   ";
        }
        ?>

        <form action="" method="post">

            <div class="firstname">
                <label for="name">First Name</label>
                <input type="text" name="FirstName" autocomplete="off" required value="<?php echo $FirstName ?>">
            </div>

            <div class="lastname">
                <label for="name">Last Name</label>
                <input type="text" name="LastName" autocomplete="off" required value="<?php echo $LastName ?>">
            </div>

            <div class="reg">
                <label for="name">Reg</label>
                <input class="reg" type="text" name="Reg" autocomplete="off" required value="<?php echo $Reg ?>">
            </div>

            <div class="username">
                <label for="name">User Name</label>
                <input type="text" name="Username" autocomplete="off" required value="<?php echo $Username ?>">
            </div>

            <div class="password">
                <label for="name">Password</label>
                <input class="pass" type="text" autocomplete="off" name="Password" required value="<?php echo $Password ?>">
            </div>

            <?php
            if (!empty($successMessage)) {
                echo " <div class='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btnClose' arial-label='Close'></button>
                </div>
            ";
            }
            ?>

            <div class="btns">
                <div class="submit">
                    <button class="sub" type="submit">Submit</button>
                </div>

                <div class="cancel">
                    <button role="button"><a href="/FinalWebsite/main_menu.php">Cancel</a></button>
                </div>

            </div>
        </form>
    </div>

</body>

</html>