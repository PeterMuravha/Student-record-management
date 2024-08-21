<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <style>
        body{
            background: url('/FinalWebsite/images/page.jpg');
            background-size: cover;
            background-position: center;
            overflow: hidden;
            object-fit: contain;
        }
        .container {
            text-align: center;
            height: 400px;
            width: 340px;
            background-color: grey;
            opacity: 0.8;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            justify-content: center;
            border-radius: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            height: 30px;
            width: 300px;
            margin-top: 6px;
            margin-left: 16px;
            padding: 5px 0 5px 5px;
            border:none;
            border-bottom: 3px solid blue;
            border-radius: 5px;
            outline: none;
            background-color: transparent;



        }
        ::placeholder{
            color:black;
        }

        .btn {
            background-color: blue;
            border: none;
            border-radius: 10px;
            width: 250px;
            color: white;
            margin-left: 42px;
            margin-top: 10px;

        }

        a {
            text-decoration: none;
            color: red;
        }

        .main {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h2 {
            text-shadow: 3px 3px 5px black;
        }

        body {
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="container">

            <?php

            include('config.php');
            if (isset($_POST['submit'])) {
                $FirstName = $_POST['FirstName'];
                $LastName = $_POST['LastName'];
                $Reg = $_POST['Reg'];
                $Username = $_POST['Username'];
                $Password = $_POST['Password'];

                $verify = mysqli_query($conn, "SELECT Username FROM users WHERE Username = $Username AND Password = $Password");
                if (mysqli_num_rows($verify) != 0) {
                    echo "<div>
                    <script>alert('Username and Password already used..!')</script>
                </div>";
                } else {
                    mysqli_query($conn, "INSERT INTO users(FirstName,LastName,Reg,Username,Password) VALUES('$FirstName','$LastName','$Reg','$Username','$Password')");

                    echo "<div>
        <script>alert('Registration Successfully...!')</script>
    </div>";
    header('location:/FinalWebsite/register_form.php');
                }
            } else {

            ?>

                <h2>REGISTER TO LOGIN</h2>
                <form action="" method="post">

                    <input type="text" name="FirstName" required placeholder="FirstName" autocomplete="off" >
                    <input type="text" name="LastName" required placeholder="Last Name" autocomplete="off">
                    <input type="text" name="Reg" required placeholder="Registration No" autocomplete="off">
                    <input type="text" name="Username" required placeholder="Username" autocomplete="off">
                    <input type="password" name="Password" required placeholder="Password" autocomplete="off">

                    <input type="submit" name="submit" value="Register" class="btn">

                    <p>Already have an account <a href="/FinalWebsite/login_form.php">LOG NOW..!</a> </p>

                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>