<?php 
session_start();

if(isset($_SESSION['admin_id'])) {
    if($_SESSION['admin_id'] != NULL) {
        header('Location: admin_master.php');
    }
}

require 'classes/login_signup.php';

$obj_login_signup = new Login_signup();
$message = '';
if (isset($_POST['btn'])) {
    $message = $obj_login_signup->admin_login_check($_POST);
}
?>
<html>
<head>
	<title>Sign In And Sign Up Forms</title>
        <link rel="stylesheet" href="assets/frontend/sign_in/css/style.css">
        <link href="assets/frontend/sign_in/css/popup-box.css" rel="stylesheet" type="text/css" media="all" />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Sign In And Sign Up Forms  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</script><script src="assets/frontend/sign_in/js/jquery.min.js"></script>
<script src="assets/frontend/sign_in/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/frontend/sign_in/js/modernizr.custom.53451.js"></script> 
 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
</script>	
		
</head>
<body>
	<h1>Welcome To Product Management Team</h1>
	<div class="w3layouts">
		<div class="signin-agile">
                    <h2>Sign In</h2> <?php echo $message; ?>
			<form action="" method="post">
                            <input type="text" name="email_address" class="name" placeholder="Username" required="">
				<input type="password" name="password" class="password" placeholder="Password" required="">
				<ul>
					<li>
						<input type="checkbox" id="brand1" value="">
						<label for="brand1"><span></span>Remember me</label>
					</li>
				</ul>
				<a href="#">Forgot Password?</a><br>
				<div class="clear"></div>
                                <input type="submit" name="btn" value="Login">
			</form>
		</div>
		<div class="signup-agileinfo">
			<h3>Sign Up</h3>
			<p>This site is developed by Product Management Team of EDISON MOBILE. If you are a member of this team then please sign up.</p>
			<div >
                            <a class="text button-isi"  href="#">Sign Up</a>				
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer-w3l">
		<p class="agileinfo"> &copy; 2016 Sign In And Sign Up Forms . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
		
<body>
</html>