<?php
ob_start(); // to clear the browser cache...
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$get="select * from registration where username='$username' and password='$password' and status='accept' ";
$un="root";
  $upw="password";
  $host="localhost";
  $conn = mysqli_connect($host,$un,$upw);
   mysqli_select_db($conn, "luarasi-lms");
   $res=mysqli_query($conn, $get);
   while($r=mysqli_fetch_object($res))
   {
       //changes by me, gettin user_id from the qeury results
       $user_id = $r->user_id;
      $fn= $r->first_name;
      $ln= $r->last_name;
	  $name=$fn.' '.$ln;
      
      
      $gender= $r->gender;
      $course= $r->course;
      
      $reg= $r->register_no;
      $phno= $r->phno;
      $email= $r->email;
      $profile_pic=$r->photo;
	  $pasword=$r->password;
	  $status='accept';
	  
   }
   if(mysqli_affected_rows($conn)>0)
   {
       //Changes made by me 
       //Store the user_id for the user actuarlly logged in, this id will after be used to check for authorization
        $_SESSION['user_id']=$user_id;
        //End of changes by me 

        $_SESSION['un']=$username;
        $_SESSION['name']=$name;
	
		$_SESSION['gender']=$gender;
        $_SESSION['course']=$course;
		
		$_SESSION['reg']=$reg;
		$_SESSION['phno']=$phno;
		$_SESSION['email']=$email;
		$_SESSION['pic']=$profile_pic;
		$_SESSION['pswd']=$pasword;
		header("location:elearning.php");
	}
	else
	{
	    echo '<script>alert("NOT AUTHENTICATED");window.location="login.php";</script>';
	}
?>
   