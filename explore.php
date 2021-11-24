<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <div class="navbar">
        <a href="http://localhost/FINALProject/home.html">Home</a>
        <a href="http://localhost/FINALProject/explore.php">Explore</a>
        <a href="http://localhost/FINALProject/addfriend.html">Add Friend</a>
        <a href="http://localhost/FINALProject/profile.php" class="right">Profile</a>
    </div>
    <title>Friend Finder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    </style>
</head>

<body>
    <h1> Explore </h1>
    <p>Find friends in your classes!</p>
    <a href="http://localhost/FINALProject/filter.php">Click</a> to Filter.
    <?php 
        session_start();
        $db = mysqli_connect('localhost', 'root', '', '4750 proj');
        $sql = "SELECT student.name, course_id, section FROM Takes NATURAL JOIN student";
        $res = $db->query($sql);
        if($res->num_rows > 0){
            echo"<table><tr><th>Name</th><th>Course ID</th><th>Section</th></tr>";
            while($row = $res->fetch_assoc()){
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["course_id"] . "</td><td>" . $row["section"] .  "</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 results";
        }

    ?>
</body>
</html>