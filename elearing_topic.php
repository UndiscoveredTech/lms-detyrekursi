<?php
      $notes_id = $_GET['notes_id'];
	  $un="root";
      $upw="password";
      $host="localhost";
      $conn = mysqli_connect($host,$un,$upw);
      mysqli_select_db($conn, "luarasi-lms");
      $get = "select * from tbl_notes_details where notes_id='$notes_id' ";
 	  $result = mysqli_query($conn, $get);
	  $row = mysqli_fetch_object($result);
	  	  echo "<a href='Notes_upload/$row->notes' target='main_content'><img src='web/images/notes.png' 'height='45px' width='160px'/></a>";  echo "<a href='Video_upload/$row->video' target='main_content'><img src='web/images/video.png' height'45px' width='160px'/></a>";
 ?>
 
 