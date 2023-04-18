<?php 
 	
 	include('config/db_connect.php');

	$errors = array('email'=>'', 'password'=>'','user_role'=>'', 'paid'=>'', 'user_role'=>'');
	
	if(isset($_POST['submit'])){
		/*
 		if(empty($_POST['id'])){
 			$errors['id'] = 'An id is required <br />';
 		} else{
 			//echo htmlspecialchars($_POST['id']);
 			$id = $_POST['id'];
 			if(!filter_var($id, FILTER_VALIDATE_INT)){
 				//echo 'id must be integer';
 				$errors['id'] = 'id must be integer';
 			}
 		}*/

 		if(empty($_POST['email'])){
 			$errors['email'] = 'A email is required <br />';
 		} else{
 			//echo htmlspecialchars($_POST['email']);
 			$email = $_POST['email'];
 			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 				//echo 'email must be letters & spaces only';
 				$errors['email'] = 'email must be letters & spaces only';
 			}
 		}

 		if(empty($_POST['paid'])){
 			$errors['paid'] = 'A payment is required <br />';
 		} else{
 			//echo htmlspecialchars($_POST['email']);
 			$paid = $_POST['paid'];

 		}

 		
 		if(empty($_POST['user_role'])){
 			$errors['user_role'] = 'An user_role is required <br />';
 		} else{
 			//echo htmlspecialchars($_POST['user_role']);
 			$user_role = $_POST['user_role'];
 			
 		}

 		if(empty($_POST['paid'])){
 			$errors['paid'] = 'An paid is required <br />';
 		} else{
 			//echo htmlspecialchars($_POST['paid']);
 			$paid = $_POST['paid'];
 			
 		}

 		if(empty($_POST['paid'])){
 			$errors['paid'] = 'An paid is required <br />';
 		} else{
 			//echo htmlspecialchars($_POST['paid']);
 			$paid = $_POST['paid'];
 			
 		}

 		

 		if(array_filter($errors)){
 			//send error
 		}else{
 			
 			$email = mysqli_real_escape_string($conn, $_POST['email']);
 			$password = mysqli_real_escape_string($conn, $_POST['password']);
 			$user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
 			$paid = mysqli_real_escape_string($conn, $_POST['paid']);
 			$tid = $_POST['tid'];


 			$sql = "INSERT INTO user(email, password, user_role, paid) VALUES('$email','$password','$user_role', '$paid')";

 			$select = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$email."'");


 			if(!mysqli_num_rows($select)){
 				if($tid != ''){
	 				if(mysqli_query($conn, $sql)){
					//success
						header('Location: index.php');
					} else{
						echo 'query error: ' . mysqli_error($conn);
						
					}
 				}else{
 					echo 'transaction id not given';
 				}
				
			}else{
				echo 'email already exists';
			}

 	
 		}
 	}


?>

<!DOCTYPE html>
<html>

	<?php include('templates/login_header.php') ?>

	<section class="center grey-text">
		<h4 class="center">
			Create an Account
		</h4>
		<form class="white form" action="register.php" method="POST">
			
			<label class="left">Email:</label>
			<input type="text" name="email">
			<div class="red-text"><?php echo $errors['email'] ?></div>
			<label class="left">Password:</label>
			<input type="text" name="password">
			<div class="red-text"><?php echo $errors['password'] ?></div>
			<label class="left">User Type:</label>
			<select name="user_role" class="browser-default">
				<!--<option>--Select User--</option>-->
				<option value="Client">Client</option>
				<option value="Designer">Designer</option>
			</select>
			<div class="red-text"><?php echo $errors['user_role'] ?></div>
			

			<label class="left">Payment method:</label>
			<select name="paid" class="browser-default">
				<!--<option>--Select Method--</option>-->
				<option value="Bkash">Bkash</option>
				<option value="Nagad">Nagad</option>
				<option value="Visa">Visa</option>
				<option value="Mastercard">Mastercard</option>
			</select>
			<div class="red-text"><?php echo $errors['paid'] ?></div>

			<!--<input type="text" name="user_role">-->

			<label class="left">Transaction ID:</label>
			<input type="text" name="tid">
			
			
			<div class="center">
				<a href="login.php" class="btn brand z-depth-0">Back</a>
				<input type="submit" name="submit" value="Create" class="btn brand z-depth-0"></input>
			</div>
		</form>
	</section>
	
	<?php include('templates/footer.php') ?>



</html>