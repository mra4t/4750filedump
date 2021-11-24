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
    <h1>
        <?php 
            session_start();
            $db = mysqli_connect('localhost', 'root', '', '4750 proj');
            $sName = $db->query("SELECT student.name FROM student WHERE student_id='$_SESSION[studentID]'")->fetch_object()->name;
            echo $sName;
        ?>
     </h1>
    
     <?php 
        echo 'Computing ID: ' . $_SESSION['studentID'] . '<br>';
        $sYear = $db->query("SELECT student.year FROM student WHERE student_id='$_SESSION[studentID]'")->fetch_object()->year;
        echo 'Year: ' . $sYear . '<br>';
        $sPhone = $db->query("SELECT student.phone_number FROM student WHERE student_id='$_SESSION[studentID]'")->fetch_object()->phone_number;
        echo 'Phone Number: ' . $sPhone . '<br>';
        $sMajor = $db->query("SELECT student_major.major FROM student_major WHERE student_id='$_SESSION[studentID]'");
        if ($sMajor->num_rows > 1){
            $i = 1;
            while($row = $sMajor->fetch_assoc()){
                echo 'Major ' . $i . ': ' . $row['major'] . '<br>';
                $i++;
            }
        }
        else {echo "0 results";}
    
     ?>
    <h2>Class Schedule</h2>
    <?php 
        $sql = "SELECT course_id, section, course.name, days_of_week, course.time, address_street, address_room FROM LocatedAt NATURAL JOIN Course NATURAL JOIN takes WHERE student_id='$_SESSION[studentID]'";
        $coursetable = $db->query($sql);
        if($coursetable->num_rows > 0){
            echo"<table><tr><th>Course ID</th><th>Section</th><th>Name</th><th>Meeting Days</th><th>Time</th><th>Building</th><th>Room</th></tr>";
            //output each class
            while($row = $coursetable->fetch_assoc()){
                echo "<tr><td>" . $row["course_id"] . "</td><td>" . $row["section"] . "</td><td>" . $row["name"] . "</td><td>" . $row["days_of_week"] . "</td><td>" . $row["time"] . "</td><td>" . $row["address_street"] . "</td><td>" . $row["address_room"] . "</td></tr>";
            }
            echo "</table>";
        }
        else {echo "0 results";}

    ?>
    
    
    <br> <br>

    <p><a href="http://localhost/FINALProject/editprofile.html">Edit Profile</p>
    <p><a href="http://localhost/FINALProject/addcourse.html">Add A Class</p>
    <p><a href="http://localhost/FINALProject/dropcourse.html">Drop A Class</p>

</body>
</html>