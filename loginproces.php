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

        //get role id for user_id
        $query_fetch_role_id = "select role_id from system_users_to_roles ur where ur.user_id = $user_id ";
        $fetch_role_id_result = mysqli_query($conn,$query_fetch_role_id) or die('Invalid query: ' . mysqli_error());
        while ($row_role = mysqli_fetch_assoc($fetch_role_id_result)) {
          //here we get the value for the role id selected
          $role_id = $row_role['role_id'];
          $_SESSION['role_id'] = $role_id;
          
          // echo $row['user_id'];     
        }
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
   