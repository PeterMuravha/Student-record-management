<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body{
            font-style: italic;
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
            background-color: gray;
            opacity: 0.7;
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
            border: none;
            border-bottom: 2px solid blue;
            background-color: transparent;
            border-radius: 5px;
            outline: none;


        }
        ::placeholder{
            color: black;
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
            color:blue;
        }
        .main{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1{
            margin-top: 0px;
            text-shadow: 3px 3px 5px black;
        }
        
    </style>
</head>

<body>
    <div class="main">
        <div class="container">

        <?php
        include('config.php');
        if(isset($_POST['submit'])){
            $Username = mysqli_real_escape_string($conn,$_POST['Username']);
            $Password = mysqli_real_escape_string($conn,$_POST['Password']);

            $result = mysqli_query($conn,"SELECT * FROM users WHERE Username = '$Username' AND Password = '$Password' ") or die('select error');
            $row = mysqli_fetch_assoc($result);

            if(($row) && !empty($row)){
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['Password'] = $row['Password'];
            }else{
                ?>
            
                <?php
                echo "<script>alert('Incorrect Username and Password...!')</script>";
                header('location: login_form.php');
                ?>
                
            
<?php
            }
            if(isset($_SESSION['Username'])){
                header('location: main_menu.php');
            }
        }else {
    ?>

            <h1>LOGIN</h1>
            <form action="" method="post">

                <input type="text" name="Username" required placeholder="Username" autocomplete="off">
                <input type="password" name="Password" required placeholder="Password" autocomplete="off">

                <input type="submit" name="submit" value="Login" class="btn">

                <p>Don't have an account <a href="/FinalWebsite/register_form.php">REGISTER..!</a> </p>

            </form>
        </div>
        <?php } ?>
    </div>
</body>

</html>