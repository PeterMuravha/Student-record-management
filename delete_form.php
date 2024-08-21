<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <style>
        body{
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
        .main{
            margin-top: 5%;
        }
        .container {
            
            margin: 0 auto;
            max-width: 1200px;
        }
        table{
            max-width: 1200px;
            margin:  0 auto;
            border-collapse: collapse;
            background-color: black;
            border-radius: 10px;

        }
        .container table th{
            border-bottom: 1px solid black;
            width: 250px;
            height: 50px;
            text-align: left;
            font-size: 20px;
            font-style: italic;
        }
       
        .container table td{
            border-bottom: 1px solid black;
            width: 250px;
            height: 40px;
            font-size: 16px;
        }
        .edit{
            background-color: blue;
        }
        .delete{
            background-color: red;
        }
        button{
            height: 30px;
            width: 60px;
            border: none;
            background-color: red;
        }
        a{
            
            text-decoration: none;
            color: white;
           
        }
        li {
            list-style: none;
            margin-top: 30px;
            margin-right: 40px;
        }

        .list a {
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
            <h1>DELETE RECORD</h1>
        </div>
        <div class="list">
            <li><a href="/FinalWebsite/main_menu.php">Main Menu</a></li>
            <li><a href="/FinalWebsite/view_form.php">View Record</a></li>
            <li><a href="/FinalWebsite/add_record.php">Add Record</a></li>
            <li><a href="/FinalWebsite/update_form.php">Update Record</a></li>
            <li><a href="/FinalWebsite/search_form.php">Search Record</a></li>
        </div>
    </div>
    <div class="main"></div>
    <div class="container">
        <h2>DELETE RECORD</h2>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Reg</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php

                include('config.php');


                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn,$sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $FirstName = $row['FirstName'];
                        $LastName = $row['LastName'];
                        $Reg = $row['Reg'];
                        $Username = $row['Username'];
                        $Password = $row['Password'];

                        echo '
                        <tr>
                        <th scope = "row">'.$id.'</th>
                        <td>'.$FirstName.'</td>
                        <td>'.$LastName.'</td>
                        <td>'.$Reg.'</td>
                        <td>'.$Username.'</td>
                        <td>'.$Password.'</td>
                        <td>
                        '?>
                        <button> <a href="/FinalWebsite/delete1.php?id=<?php echo $row['id']; ?>">Delete</a></button>
                        <?php '
                        </td>
                    </tr>
                        ';

                    }
                }

                ?>
        
            </tbody>
        </table>
    </div>
</body>

</html>