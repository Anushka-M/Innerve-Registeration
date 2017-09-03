<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        <link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyles.css" rel="stylesheet" media="screen">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
        <!--<link href="_/css/mystyles.css" rel="stylesheet" media="screen">-->
        <title>User Login</title>
    </head>
    <body onload="registerForm.reset()">

        <section class="entry_form">

            <div >
                <?php
				if(isset(!(empty($_SESSION['uname']))){
					header('Location:index.php');
				}
				$uname= $_SESSION['uname'];
				$event_name="";
				$event_id = "";
				$team_name = "";
				$no_of_members = 1;
				include "_/DbConnect/Dbase.php";
                $objDb = new DbConnect();
				$query1 = "SELECT `event_name` FROM events ";
				if(isset($_POST['event_name']) && isset($_POST['team_name']) && isset($_POST['no_of_members'])){
					$event_name = $_POST['event_name'];
					$team_name = $_POST['team_name'];
					$no_of_members = $_POST['no_of_members'];
					if(!empty($event_name) && !empty($team_name) && !empty($no_of_members)){
						$query2 = "SELECT `team_strength` FROM `events` WHERE `event_name`='{$event_name}'";
						$query3 = "SELECT `event_id` FROM `events` WHERE `event_name`='{$event_name}'";
						$query4 = "SELECT * FROM `event_register` WHERE `team_name`='{$team_name}' AND `event_name`='{$event_name}'";
						$result2 = $objDB->fetchAll($query2);
						$result3 = $objDB->fetchAll($query3);
						$result4 = $objDB->fetchAll($query4);
						if($result3){
							$fetch1 = mysqli_fetch_assoc($result3);
							$event_id = $fetch['event_id'];
						}
						$fetch2 = mysqli_fetch_assoc($result2);
						$strength = $fetch2['team_strength'];
						
						$countMember = mysqli_num_rows($result4);
						if($no_of_members<=$strength && $countMember!=$strength){
							$objDb->prepare_Insert(array(
                                'event_id' => $event_id,
                                'uname' => $uname,
                                'team_name' => $team_name,
								'no_of_members' => $no_of_members
                            ));
							$objDB->insert('event_register') ||  die("Not successful");
						}
						if($no_of_members>$strength){
							?><script type="text/javascript">alert("No of members exceeded for event, please re-enter");</script><?
						}
						if($countMember==$strength){
							?><script type="text/javascript">alert("The team has already been registered to maximum limit");</script><?
						}
					}
				}
				
                ?>
               <form id="registerForm" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                   <legend style="margin-bottom: 2%;" ><strong>Registeration Form</strong></legend>
				   <div>
                   <section>				
						
						<label>Event Name:</label>
						<span class="highlight"></span>
						<span class="bar"></span>
						<select id="event_name" name="event_name">
							<?php 	
								$result = $objDB->fetchAll($query1);
								while($row = mysqli_fetch_assoc($result)) {
										?><option><?php echo $row['event_name']; ?></option><?php
									}
								}
							?>
						</select>
                       
                   </section>
                   <section>						
                       <label>Team Name:</label>
					   <span class="highlight"></span>
						<span class="bar"></span>
					   <input id="team_name" type="text" name="team_name"   required />
                       <span id="exists"></span>
                   </section>
                   <section>
						<label>No of Members:</label>
						<span class="highlight"></span>
						<span class="bar"></span>
						<input type="text" value="1" id="no_of_members" name="no_of_members" />                      
                   </section>
                   
                   <section>
                       <button class="btn btn-info" type="submit" value="Submit" name="submit">Submit</button>
                   </section>
                   
				   </div>
               </form>
				<section>
                       <a href="welcome.php"><button><<< BACK</button></a>
                </section>
            </div>
        </section>
        <script src="_/js/jquery-3.2.1.min.js"></script>
        <script src="_/js/bootstrap.js"></script>
        <script src="_/js/ajaxRequest.js"></script>
        <script src="_/js/custom.js"></script>
        <script src="_/js/npm.js"></script>

    </body>
</html>

