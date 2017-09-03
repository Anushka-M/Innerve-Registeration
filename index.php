<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        <link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyles.css" rel="stylesheet" media="screen">
       
        <title>Sign Up</title>
    </head>
    <body onload="signupForm.reset()">

        <section class="entry_form">

            <div >
                <?php
				if(isset($_SESSION['uname']) && !(empty($_SESSION['uname']))){
					header('Location:welcome.php');
				}
                $name="";
                $id = "";
				$uname="";
				$pass="";
                $mno="";
                $clg="";
				$year="";
                if(isset($_POST['name']) && $_POST['uname']) && $_POST['pass']) && isset($_POST['id']) && isset($_POST['mno']) && isset($_POST['clg']) && isset($_POST['year'])){
                    $name = $_POST['name'];
					$pass= $_POST['pass'];
					$cpass = $_POST['cpass'];
					$id = $_POST['id'];
					$mno= $_POST['mno'];
					$clg= $_POST['clg'];
					$year= $_POST['year'];

                    if(!(empty($name)) && !(empty($id)) && !(empty($mno)) && !(empty($clg)) && !(empty($year))){                      
                            include "_/DbConnect/Dbase.php";
                            $objDb = new DbConnect();
							if($cpass==$pass){
                            $objDb->prepare_Insert(array(
                                'name' => $name,
								'uname' => $name,
								'pass' => $name,
                                'id' => $id,
                                'mno' => $mno,
								'clg' => $clg,
                                'year' => $year
                            ));
                            $objDb->insert('user_data') || die("Error:Couldn't process your request. Please contact your admin.<br>Error can be caused due to:<br>1.Username exists, please rediredt to login page<br>2.Connection was interrupted");
                            
                            header("Location: login_form.php");
							}else{
								?><script type="text/javascript">alert("Enter the correct passwords");</script><?php
							}
                    }else{
                        ?><script type="text/javascript">alert("All the fields are mandatory")</script><?php
                    }
                }
                ?>
               <form id="signupForm" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                   <legend style="margin-bottom: 2%;" ><strong>Sign Up</strong></legend>
				   <div>
                   <section>				
						
						<label>Full Name:</label>
						<span class="highlight"></span>
						<span class="bar"></span>
						<input id="name" type="text" name="name" onkeyup="validateForm(this)"  required />
                       
                   </section>
				   <section>						
                       <label>Username:</label>
					   <span class="highlight"></span>
						<span class="bar"></span>
					   <input id="id" type="text" name="uname" onkeyup="validateForm(this)"  required />
                       <span id="exists1"></span>
                   </section>
				   <section>						
                       <label>Password:</label>
					   <span class="highlight"></span>
						<span class="bar"></span>
					   <input id="id" type="text" name="pass" onkeyup="validateForm(this)"  required />
                   </section>
				   <section>						
                       <label>Confirm Password:</label>
					   <span class="highlight"></span>
						<span class="bar"></span>
					   <input id="id" type="text" name="cpass" onkeyup="validateForm(this)"  required />
                   </section>
                   <section>						
                       <label>Email-ID:</label>
					   <span class="highlight"></span>
						<span class="bar"></span>
					   <input id="id" type="text" name="id" onkeyup="validateForm(this)"  required />
                       <span id="exists1"></span>
                   </section>
                   <section>
						<label>Contact No:</label>
						<span class="highlight"></span>
						<span class="bar"></span>
						<input type="text" id="mno" name="mno" onkeyup="validateForm(this)"  required />                      
                   </section>
                   <section>
						<label>Gender:</label>
						<span class="highlight"></span>
						<span class="bar"></span>
						<input type="text" id="clg" name="clg"  onkeyup="validateForm(this)" required />						                                            
                   </section>
                   <section>
						<label>Age:</label>
						<span class="highlight"></span>
						<span class="bar"></span>
						<input type="number" id="year" name="year" onkeyup="validateForm(this)" required />  
                       
                   </section>
                   <section>
                       <button class="btn btn-info" type="submit" value="Submit" name="submit">Submit</button>
                   </section>
                   <a class="btn btn-success" href="login_form.php">Log In</a>
				   </div>
               </form>

            </div>
        </section>
        <script src="_/js/jquery-3.2.1.min.js"></script>
        <script src="_/js/bootstrap.js"></script>
        <script src="_/js/ajaxRequest.js"></script>
        <script src="_/js/custom.js"></script>
        <script src="_/js/npm.js"></script>

    </body>
</html>

