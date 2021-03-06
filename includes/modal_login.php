<?php
	if($_POST && isset($_POST["login"])){
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

				// Use meta redirect to prevent header error.
				// header("Refresh:0;URL=./index.php");
				echo "<meta http-equiv='refresh' content='0; url=./index.php'>";
			} else{
				array_push($errors, "Incorrect password");
			}
		} elseif($result && mysqli_affected_rows($dbc) == 0){
			array_push($errors, "Incorrect username");
		} else{
			array_push($errors, "An error has ocurred, please try again later (DBC_SEL_FAIL)");
		}
	}
?>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title">Login</h5>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<?php if($_POST && !empty($errors)): ?>
					<div class="alert alert-danger" role="alert">
						<ul class="post-errors-list">
							<?php foreach($errors as $error): ?>
								<li><?= $error; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<form action="index.php" method="post" autocomplete="off">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" value="">
					</div>

					<input type="hidden" name="login" value="true">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" name="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>
