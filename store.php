<?php
  $fn= $_POST['fn'];
  $ln= $_POST['ln'];
  
  $gender= $_POST['gender'];
  $course= $_POST['course'];
  $reg= $_POST['reg'];
   
  
  $phno= $_POST['phno'];
  $email= $_POST['email'];
  $user= $_POST['username'];
  $pw= $_POST['pw'];
  $cpw= $_POST['cpw'];
  $regdate=date('d/m/Y');
    /* PROFILE UPLOAD   */
  $pic=$_FILES['profile']['name'];
  $target = "profile_upload/".$pic;
  move_uploaded_file($_FILES['profile']['tmp_name'], $target);
  $query= "insert into registration values('$regdate','$fn','$ln','$gender','$course','$reg','$phno','$email','$pic','$user','$pw','accept')";
 $un="root";
  $upw="password";
  $host="localhost";
  $conn = mysqli_connect($host,$un,$upw);
  mysqli_select_db($conn, "luarasi-lms");
 if($pw==$cpw)
  {
      mysqli_query($conn, $query);
	 echo '<script>alert("REGISTERED SUCCESSFULLY");window.location="login.php";</script>';

    //changes by me get the last row inserted and set the selected role to the db

  }
  else
  {
     echo '<script>alert("PASSWORD DOESNOT MATCH");window.location="registration.php";</script>';
  }
  ?>