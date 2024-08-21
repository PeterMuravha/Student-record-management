<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
    table,th,td{
        border: 1px solid black;
        border-collapse: collapse;
    }

</style>
</head>
<body>
    <table>
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Surname</th>
        </thead>

        <tbody>
        <?php

        $connect = mysqli_connect('localhost','root','','dblogin') or die ('unsuccessfull');

        $sql = "SELECT * FROM users";
        $result = $connect->query($sql);


        while($row = $result->fetch_assoc()){
        echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[FirstName]</td>
        <td>$row[LastName]</td>
        </tr>
        ";

        };

?>
        </tbody>
    </table>
</body>
</html>