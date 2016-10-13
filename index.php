<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>IT117 - John Cummings</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li style="float: right;" ><a href="login.php">Login/New User</a></li>
			<li style="float: right;" ><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="intro">
		<h2>IT218<i> Community</i></h2>
		<hr />
	</div>
	<div id="sign_in" class="form">
		<form id="signin" action="/" method="post">
		<h2> Sign in!</h2>
			<input type="text" name="user_name" placeholder="Enter your username">
			<input type="password" name="password" placeholder="Enter your password">
			<span>Don't have an account? Make one <span id="sign_swap" onclick="new_user()">here</a></span>
			<button type="submit">Sign in</button>
		</form>
	</div>
	<div id="sign_up" class="form hidden">
		<form id="reg" action="form.php" method="post">
		<h2>Sign up today!</h2>
			<input type="text" name="first_name" placeholder="Enter your first name"/>
			<input type="text" name="last_name" placeholder="Enter your last name"/>
			<input type="text" name="user_name" placeholder="Enter a username"/>
			<input type="email" name="email_1" placeholder="Enter your email"/>
			<input type="email" name="email_2" placeholder="Re-enter your email"/>
			<input type="password" name="password_1" placeholder="Enter a password" />
			<input type="password" name="password_2" placeholder="Re-enter password" />
			<span><input type="checkbox" name="terms"> I have read and agree to the <b><a href="### CHANGE TO TERMS LINK ###">terms</a></b>
			of service</span>
			<span>Already have an account? Click <span id="sign_swap" onclick="signup()">here</span></span>
			<button type="submit">Sign Up</button>
		</form>
	</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
