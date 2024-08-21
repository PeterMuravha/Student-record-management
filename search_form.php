<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Record</title>
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
        .container{
            margin: 0 auto;
            max-width: 1200px;
        }
        form{
            margin-bottom: 5%;
        }
        input{
            height: 40px;
            width: 600px;
            outline: none;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            font-style: italic;
            border: 1px solid black;
            border-left: none;
        }
        button{
            height: 45px;
            width: 120px;
            visibility: hidden;
        }
        ::placeholder{
            font-size: 20px;
            padding-left: 5px;
        
        }
        .container table th{
            border-bottom: 1px solid black;
            width: 250px;
            height: 50px;
            text-align: left;
            font-size: 20px;
            font-style: italic;
            background-color: blue;
        }
        .container table td{
            border-bottom: 1px solid black;
            width: 250px;
            height: 40px;
            font-size: 18px;
        }
        .searchEngine{
            display: flex;
        }
        img{
            width: 40px;
            height: 42px;
            border:1px solid black;
            border-right: none;
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
            <h1>SEARCH DATABASE</h1>
        </div>
        <div class="list">
            <li><a href="/FinalWebsite/main_menu.php">Main Menu</a></li>
            <li><a href="/FinalWebsite/add_record.php">Add Record</a></li>
            <li><a href="/FinalWebsite/view_form.php">View Record</a></li>
            <li><a href="/FinalWebsite/update_form.php">Update Record</a></li>
            <li><a href="/FinalWebsite/delete_form.php">Delete Record</a></li>
        </div>
    </div>
    <div class="container">
    <h2>SEARCH RECORD</h2>

    <form method="POST">
        <div class="searchEngine">
        <img src="/FinalWebsite/images/searchLogo.PNG" alt="">
        <input type="text" name="search" placeholder="Search here...." autocomplete="off">
        </div>
      

        <button type="search">Search</button>
    </form>

    <table>
    <tr>
    <th>ID</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Reg</th>
    <th>Username</th>
    <th>Password</th>
    </tr>
    </table>

    <?php

include('config.php');

if(!$conn){
    die ('connection failed');
}

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($conn,$_POST['search']);

$query = "SELECT * FROM users WHERE FirstName LIKE '%$search%' OR LastName LIKE '%$search%' OR Username LIKE '%$search%' OR Reg LIKE '%$search%'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) >0){
    echo "<table>";


    while($row = $result->fetch_assoc()){
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
    echo "</table>";

}else{
    echo "<h2>NO RESULTS FOUND</h2>";
}
}

mysqli_close($conn);
?>
    </div>
</body>
</html>