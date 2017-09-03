<!DOCTYPE html>
    <head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
		<link href="_/css/mystyles.css" rel="stylesheet" media="screen">
        <link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
	</head>
    <body>
        <section class="col-lg-8 col-md-12">
			<?php 
				session_start();
				if(empty($_SESSION['uname'])){
					header('Location:login_form.php');				}
				
			?>
            <h1>Welcome!</h1>
			<div>			
					<span class="col-lg-3 col-md-3">Name</span>
					<span class="col-lg-3 col-md-3">User Nmae</span>
					<span class="col-lg-2 col-md-3">Contact No</span>
					<span class="col-lg-2 col-md-2">College</span>
					<span class="col-lg-2 col-md-1">Year</span>
				
				
					<span class="col-lg-3 col-md-3"><?php echo $_SESSION['name']; ?></span>
					<span class="col-lg-3 col-md-3"><?php echo $_SESSION['uname']; ?></span>
					<span class="col-lg-2 col-md-3"><?php echo $_SESSION['mno']; ?></span>
					<span class="col-lg-2 col-md-2"><?php echo $_SESSION['clg']; ?></span>
					<span class="col-lg-2 col-md-1"><?php echo $_SESSION['year']; ?></span>
				
			</div>
			<a  href="register.php"><button class="btn btn-success col-lg-2" style="margin:20px 0 20px;">Register</button></a>
            <a  href="_/includes/session_unset.php"><button class="btn btn-success col-lg-2" style="margin:20px 0 20px;">Logout!</button></a>
			
        </section>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="_/js/bootstrap.js"></script>
        <script src="_/js/myscript.js"></script>
    </body>
</html>