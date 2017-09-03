
    <?php
    $email = "";
    $mno= "";
    $current_file = $_SERVER['SCRIPT_NAME'];
    $login_fail = false;
    if(isset($_POST['uname'])  && isset($_POST['pass'])){
        $uname = $_POST['uname'];
		$pass= $_POST['pass'];
        if(!(empty($email)) && !(empty($mno))){            
            include "./_/DbConnect/Dbase.php";
            $obDb  = new DbConnect();
            $table = 'user_table';
            $query = "SELECT * FROM `{$table}` where `uname`='{$uname}' AND `pass`='{$pass}'";
			$runQuery = $obDb->run_query($query);
            $fetch = mysqli_fetch_assoc($runQuery);
            if(empty($fetch)){
                $login_fail=true;
            }
            else{                
				$_SESSION['name'] = $fetch['name'];
				$_SESSION['uname'] = $fetch['uname'];
				$_SESSION['id'] = $fetch['id'];
				$_SESSION['mno'] = $fetch['mno'];
				$_SESSION['clg'] = $fetch['clg'];
				$_SESSION['year'] = $fetch['year'];
                header('Location:welcome.php');
            }
        }
    }
    ?>
    <form id="loginForm" action="<?php echo $current_file; ?>" method="POST">
        <legend style="margin-bottom: 2%;" ><strong>Login</strong></legend>
        <?php
            if($login_fail){
                ?>
                <p style="color: red;">Incorrect username/password</p>
            <?php
            }
        ?>
		<div>
        <section >
			<label>User Nmae:</label>
			<span class="highlight"></span>
			<span class="bar"></span>
			<input id="uname" type="text" name="uname"   required />
        </section>
        <section >
            <label>Password:</label>
			<span class="highlight"></span>
			<span class="bar"></span>
			<input type="text" id="pass" name="pass"   required />       
        </section>
        <section>
            <button class="btn btn-info" type="submit" name="submit">Log In</button>
        </section>
            <a class="btn btn-success" href="index.php">Sign Up</a>
		
    </form>
</div>