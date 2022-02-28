<?php
  $role = $_POST['role'];
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
  // $pic=$_FILES['profile']['name'];
  //$target = "profile_upload/".$pic;
  // move_uploaded_file($_FILES['profile']['tmp_name'], $target);
  $query= "insert into registration values('','$regdate','$fn','$ln','$gender','$course','$reg','$phno','$email','bosh','$user','$pw','accept')";
  
 $un="root";
  $upw="password";
  $host="localhost";
  $conn = mysqli_connect($host,$un,$upw);
  mysqli_select_db($conn, "luarasi-lms");
 if($pw==$cpw)
  {
      $user_id_inserted;
      $role_id;
      mysqli_query($conn, $query);
      //changes by me get the last row inserted and set the selected role to the db
      $query_get_last_record = "select * from registration r ORDER BY r.user_id DESC LIMIT 1";
      $last_record_result = mysqli_query($conn,$query_get_last_record) or die('Invalid query: ' . mysqli_error());
      while ($row = mysqli_fetch_assoc($last_record_result)) {
        $user_id_inserted = $row['user_id'];
        // echo $row['user_id'];
        
      }
      
        //Here we have the user_id who is actually registered and access role by $role
        //after we have role by name we retrive the id of the role    

        $retrieve_role_id = "select role_id from roles r  where r.role_name = '$role' ";
        $retrive_role_id_result = mysqli_query($conn,$retrieve_role_id) or die('Invalid query: ' . mysqli_error());
        while ($row_role = mysqli_fetch_assoc($retrive_role_id_result)) {

          //here we get the value for the role id selected
          $role_id = $row_role['role_id'];
          // echo $row['user_id'];     
        }

        if(is_null($user_id_inserted) || is_null($role_id)){
          echo '<script>alert("Something is wrong");</script>';

        } else{
          //insert into table system_users_to_roles
          $query_insert_role_for_user = "insert into system_users_to_roles VALUES('', '$user_id_inserted', '$role_id')";
          //insert
          mysqli_query($conn, $query_insert_role_for_user);
          echo '<script>alert("User added Successfully");window.location="login.php";</script>';

        }
  }
  else
  {
     echo '<script>alert("PASSWORD DOESNOT MATCH");window.location="registration.php";</script>';
  }