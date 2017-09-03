<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
		<link href="_/css/mystyles.css" rel="stylesheet" media="screen">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
        <title>User Login</title>
        <link href="css/mystyles.css" rel="stylesheet" type="text/css">
    </head>
    <body onload="loginForm.reset();">
        <section class="entry_form">
            <div class="register">
                <?php
                /**
                 * Created by PhpStorm.
                 * User: AnushkaM
                 * Date: २७-०६-२०१७
                 * Time: ११:०४
                 */
                    session_start();
                    if(isset($_SESSION['uname']) && !(empty($_SESSION['uname']))){						
                        header('Location:index.php');
                    }
                    else{
                        include "_/includes/session.php";
                    }
                ?>
            </div>
        </section>
		<script src="_/js/jquery-3.2.1.min.js"></script>
        <script src="_/js/bootstrap.js"></script>
        

    </body>
</html>

