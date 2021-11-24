<html>
<head>
    <div class="navbar">
        <a href="http://localhost/FINALProject/home.html">Home</a>
        <a href="http://localhost/FINALProject/addfriend.html">Add Friend</a>
        <a href="http://localhost/FINALProject/profile.php" class="right">Profile</a>
    </div>
    <title>Friend Finder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <h1><?php 
    session_start();
    $db = mysqli_connect('localhost', 'root', '', '4750 proj');
    ///echo $_SESSION['studentID'];  
    
    $sName = $db->query("SELECT student.name FROM student WHERE student_id='$_SESSION[studentID]'")->fetch_object()->name;
    echo $sName;
     
     ?></h1>
    
    
    <a href="http://localhost/FINALProject/editprofile.html">Edit Profile</a>

</body>
</html>
