<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an UPDATE query) 
   //update student table
   if (!empty($_POST['name'])){
    $sql = "UPDATE Student SET name='$_POST[name]' WHERE student_id='$_POST[student_id]'";
   }

   if (!empty($_POST['year'])){
    $sql = "UPDATE Student SET year='$_POST[year]' WHERE student_id='$_POST[student_id]'";
   }
   
   if (!empty($_POST['phone_number']))
    $sql = "UPDATE Student SET phone_number='$_POST[phone_number]' WHERE student_id='$_POST[student_id]'";

   if (!empty($_POST['major']))
    $sql = "UPDATE Student_Major SET major='$_POST[major]' WHERE student_id = '$_POST[student_id]'"; 

   if (!empty($_POST['major_add']))
    $sql = "INSERT INTO Student_Major (student_id, major) VALUES ('$_POST[student_id]','$_POST[major_add]')";


   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   echo "Profile Updated Successfully"; // Output to user

   mysqli_close($con);
?>
