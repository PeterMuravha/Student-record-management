<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAIN MENU</title>
    <style>
        body {
            background-color: black;
        }

        h2 {
            background-color: grey;
            padding: 10px;
            display: block;
            width: 350px;
            border-radius: 10px;
            margin-bottom: 10%;
            font-style: italic;
        }

        a:hover {
            color: blue;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .container {
            display: flex;
            flex-direction: column;
            margin-top: 5%;
            margin-left: 5%;
        }

        .view {
            margin-left: 10%;
        }

        .delete {
            margin-left: 13%;
        }

        .update {
            margin-left: 13%;
        }

        .delete {
            margin-left: 13%;
        }

        .search {
            margin-left: 10%;
        }

        img {
            border-radius: 300px;
        }
        .all{
            display: flex;
            max-width: 1400px;
            justify-content: space-between;

        }
        .hero{
            margin-top: 80px;
            margin-right: 80px;
        }
    </style>
</head>

<body>
   <div class="all">
   <div class="container">
        <h2 class="add"><a href="/FinalWebsite/add_record.php">ADD RECORD</a></h2>
        <h2 class="view"><a href="/FinalWebsite/view_form.php">VIEW RECORD</a></h2>
        <h2 class="delete"><a href="/FinalWebsite/delete_form.php">DELETE RECORD</a></h2>
        <h2 class="update"><a href="/FinalWebsite/update_form.php">UPDATE RECORD</a></h2>
        <h2 class="search"><a href="/FinalWebsite/search_form.php">SEARCH RECORD</a></h2>
        <h2 class="out"><a href="/FinalWebsite/login_form.php">LOG OUT.....</a></h2>
    </div>

    <div class="hero">
        <img src="/FinalWebsite/images/hero.PNG" alt="hero">
    </div>
   </div>

</body>

</html>