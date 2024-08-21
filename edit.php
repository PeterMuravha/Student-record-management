<?php
include("config.php");
/*$id = $_REQUEST['id'];
$query = "SELECT * from users where id='" . $id . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);*/

$id = $_REQUEST['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("s", $id); // 's' specifies the variable type => 'string'

$stmt->execute();

$result = $stmt->get_result(); // get the mysqli result
$row = $result->fetch_assoc(); // fetch data
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit Record</title>
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
        .container {
            max-width: 1200px;
            margin: 0 auto;
            font-size: 18px;

        }
        
        form {
            padding: 40px;
            width: 80%;
            background-color: black;
            border-radius: 20px;
            
            
        }
        .main {
            margin-top: 12%;
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
        label {
            margin-right: 250px;
            margin-left: 0;

        }
        .reg {
            margin-left: 24px;
            margin-right: 22px;

        }
        .pass{
            margin-left: 10px;
        }
        .submit{
            width: 100px;
            height: 40px;
            color:white;
            background-color: blue;
            border: none;
        }
        a{
            color: white;
        }
        h3{
            color:white;
            font-size: 20px;
        }
   </style>
</head>

<body>
    <div class="main"></div>
    <div class="form">
        <?php
        $status = "";
        if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_REQUEST['id'];
            $FirstName = $_REQUEST['FirstName'];
            $LastName = $_REQUEST['LastName'];
            $Reg = $_REQUEST["Reg"];
            $Username = $_REQUEST["Username"];
            $Password = $_REQUEST["Password"];
            /*$update = "update users set FirstName='" . $FirstName . "',LastName='" . $LastName . "', Reg='" . $Reg . "',Username='" . $Username . "',Password='" . $Password . "' where id='" . $id . "' ";*/
            $stmt = $conn->prepare("UPDATE users SET FirstName = ?, LastName = ?, Reg = ?, Username = ?, Password = ? WHERE id = ?");
$stmt->bind_param("ssssss", $FirstName, $LastName, $Reg, $Username, $Password, $id); // 's' specifies the variable type => 'string'

$stmt->execute();
           /* mysqli_query($conn, $update) or die(mysqli_error($conn));*/
            $status = "<h3>Record Updated Successfully...</h3><a href='update_form.php'>View Updated Record</a>";
            echo '<p style="color:black;">' . $status . '</p>';
        } else {
        ?>
            <div class="container">
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <div class="firstname">
                <label for="name">First Name</label>
                <input type="text" name="FirstName" autocomplete="off" required value="<?php echo $row['FirstName'] ?>">
            </div>

            <div class="lastname">
                <label for="name">Last Name</label>
                <input type="text" name="LastName" autocomplete="off" required value="<?php echo $row['LastName'] ?>">
            </div>

            <div class="reg">
                <label for="name">Reg</label>
                <input class="reg" type="text" name="Reg" autocomplete="off" required value="<?php echo $row['Reg'] ?>">
            </div>

            <div class="username">
                <label for="name">User Name</label>
                <input type="text" name="Username" autocomplete="off" required value="<?php echo $row['Username'] ?>">
            </div>

            <div class="password">
                <label for="name">Password</label>
                <input class="pass" type="text" autocomplete="off" name="Password" required value="<?php echo $row['Password'] ?>">
                    <p><input class="submit" name="submit" type="submit" value="Update" /></p>
                </form>
            <?php } ?>
            </div>
    </div>
</body>

</html>