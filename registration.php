<!DOCTYPE HTML>
 <html>
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
     <!--slider-->
     <link href="web/css/camera.css" rel="stylesheet" type="text/css" media="all" />
     <script type='text/javascript' src="web/js/jquery.min.js"></script>
     <script type='text/javascript' src="web/js/jquery.mobile.customized.min.js"></script>
     <script type='text/javascript' src="web/js/jquery.easing.1.3.js"></script>
     <script type='text/javascript' src="web/js/camera.min.js"></script>
     <style>
* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
     </style>
   </head>
   <body>
     <div class="wrap">
       <div class="wrapper">
         <div class="logo">
           <a href="index.php">
             <h1>Tute</h1>
           </a>
         </div>
         <div class="header_right">
           <div class="cssmenu">
             <ul>
               <li class="has-sub">
                 <a href="index.php">
                   <span>Home</span>
                 </a>
               </li>
               <li>
                 <a href="login.php">
                   <span>Login</span>
                 </a>
               </li>
               <li class="active">
                 <a href="registration.php">
                   <span>Registration</span>
                 </a>
               </li>
               <li class="last">
                 <a href="contact.php">
                   <span>Contact</span>
                 </a>
               </li>
               <div class="clear"></div>
             </ul>
           </div>
         </div>
         <div class="clear"></div>
       </div>
     </div>
     
       


       <form>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="fn"><b>First name</b></label>
    <input type="text" placeholder="First name" name="fn" required>

    <label for="ln"><b>Last name</b></label>
    <input type="text" placeholder="Last name" name="ln" required>

    <label for="course"><b>Cours</b></label>
    <select name="course">
           <option value="MCA">MCA</option>
           <option value="MSc">MSc</option>
           <option value="MTech">MTech</option>
         </select>
    <label for="gender"><b>Gender</b></label>
    <select name="gender">
           <option value="gender">Male</option>
           <option value="gender">Female</option>
    </select>     
    
    <label for="reg"><b>ID</b></label>
    <input type="text" placeholder="Enter your ID" name="reg" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" required>

    <label for="phno"><b>Phone number</b></label>
    <input type="text" placeholder="Enter phone number" name="phno" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="pw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pw" required>

    <label for="cpw"><b>Repeat password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpw" required>
    <label for="file"><b>Profile photo</b></label>
    <input type="file" name="profile" />

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
    <button type="reset" class="registerbtn">Reset</button>

  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
     </div>
   </body>
 </html>