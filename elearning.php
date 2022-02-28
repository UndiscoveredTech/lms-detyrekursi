<?php
ob_start();
session_start();
if ($_SESSION['un'] == "") {
	header('location:login.php');
} else {
	ob_start();
	$un = "root";
	$upw = "password";
	$host = "localhost";
	$conn = mysqli_connect($host, $un, $upw);
	mysqli_select_db($conn, "luarasi-lms");
	$get = "select * from subject_master";
	$result = mysqli_query($conn, $get);
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
		<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="web/css/camera.css" rel="stylesheet" type="text/css" media="all" />
		<script type='text/javascript' src="web/js/jquery.min.js"></script>
		<script type='text/javascript' src="web/js/jquery.mobile.customized.min.js"></script>
		<script type='text/javascript' src="web/js/jquery.easing.1.3.js"></script>
		<script type='text/javascript' src="web/js/camera.min.js"></script>
		</script>
	</head>

	<body>
		<div class="wrap">
			<div class="wrapper">
				<div class="elearn">
					<h3>Tute</h3>
				</div>
				<div class="header_right">
					<div class="cssmenu">
						<ul>
							<li><a href="profile.php"><span>Profile</span></a></li>
							<li class="active"><a href="elearning.php"><span>E-Learning</span></a></li>
							<li class="last"><a href="logout.php"><span>Logout</span></a></li>
							<div class="clear"></div>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="profhead">
			<div class="welcome"> Welcome </div>
			<div class="welcome">
				<span>
					<?PHP echo $_SESSION['name']; ?>
				</span>
				<span>
					<?PHP echo $_SESSION['user_id']; ?>
				</span>
			</div>
			<div class="profile"><?PHP echo '<img src="profile_upload/' . $_SESSION['pic'] . '"height"40px" width="40px" alt="' . $_SESSION['pic'] . '"/>'; ?></div>
		</div>


		<div class="main_bg">
			<div class="wrap">
				<div class="wrapper">
					<div class="main">
						<div class="clear">

							<?php
							while ($row = mysqli_fetch_object($result)) {
							?>
								<?php /*?><tr> <td align="center"><a href="elearning_details.php?subject_name=<?php echo $row->subject;?>"><img class="imglogo" src="Logo_upload/<?php echo $row->logo;?>" height="150px" width="150px"> </a></td> </tr>
         <tr> <td align="center"><?php echo $row->subject;?></td> </tr>
		 <tr> <td align="center"> <?php echo "<br>"?></td> </tr><?php */ ?>
								<!-- <ul id="subject_list">
		 	<li><a href="elearning_details.php?subject_name=<?php echo $row->subject; ?>"><img class="imglogo" src="Logo_upload/<?php echo $row->logo; ?>" height="150px" width="150px"> </a></li>
		 </ul> -->
								<ul id="subject_list">
									<li><a href="elearning_details.php?subject_name=<?php echo $row->subject; ?>"><span class="imglogo"><?php echo $row->subject; ?></span> </a></li>
								</ul>
							<?php
							}
							?>

						</div>

					</div>

				</div>

			</div>

			<a href="subject_master.php">
				<button>Add</button>

			</a>

		</div>



		<div class="wrap">
			<div class="wrapper">
				<div class="footer">
					<div class="social-icons">
						<ul>
							<li class="icon_1"><a href="#" target="_blank"> </a></li>
							<li class="icon_2"><a href="#" target="_blank"> </a></li>
							<li class="icon_3"><a href="#" target="_blank"> </a></li>
							<li class="icon_4"><a href="#" target="_blank"> </a></li>
							<div class="clear"></div>
						</ul>
					</div>
					<div class="copy">
						<p class="w3-link">E-Learning | &copy; 2015</p>
					</div>
				</div>
			</div>


			<div>
				<button> POST </button>
				<button> DELETE </button>
			</div>
			<div class="clear"></div>
		</div>
	</body>

	</html>
<?php
}
?>