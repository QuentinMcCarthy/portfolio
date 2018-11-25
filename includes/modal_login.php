<?php
	if($_POST){
		$errors = array();

		extract($_POST);

		$sql = "SELECT * FROM `users` WHERE username = '$username'";

		$result = mysqli_query($dbc, $sql);

		if($result && mysqli_affected_rows($dbc) > 0){
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if(password_verify($password, $user['password'])){
				$_SESSION["valid"]=true;
				$_SESSION["timeout"]=time();
				$_SESSION["username"]=$username;

				header("Location: index.php");
			} else{
				array_push($errors, "Incorrect password");
			}
		} elseif($result && mysqli_affected_rows($dbc) == 0){
			array_push($errors, "Incorrect username");
		} else{
			array_push($errors, "An error has ocurred, please try again later (Error DBC_SEL_FAIL)");
		}

		if ( empty( $errors ) ) {
			wp_create_user( $username, $password, $email );

			$success = true;
		}
	}
?>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title">Modal Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<form action="index.php" method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" value="">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" value="">
					</div>

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" name="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>
