<?php
	require "./includes/header.php";

	if($_POST){
		extract($_POST);

		$errors = array();

		if(!$email){
			array_push($errors, "Please provide an email");
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			array_push($errors, "Please enter a valid email address");
		} elseif(strlen($email) > 254){
			array_push($errors, "Email address is too long, cannot be longer than 254 characters");
		}

		if(!$username){
			array_push($errors, "Please provide a username");
		} elseif(strlen($username) < 4){
			array_push($errros, "Username cannot be shorter than 4 characters");
		} elseif(strlen($username) > 25){
			array_push($errors, "Username cannot be longer than 25 characters");
		}

		if(!$password){
			array_push($errors, "Please provide a password");
		} elseif(strlen($password) < 6){
			array_push($errors, "Password cannot be shorter than 6 characters");
		} elseif(strlen($password) > 100){
			array_push($errors, "Password cannot be longer than 100 characters");
		}

		if($confirmpass != $password){
			array_push($errors, "Passwords do not match");
		}

		if(empty($errors)){
			$email = mysqli_real_escape_string($dbc, $email);
			$username = mysqli_real_escape_string($dbc, $username);
			$password = mysqli_real_escape_string($dbc, $password);

			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			$sql  = "CREATE TABLE `users` (`id` tinyint(6) UNSIGNED NOT NULL, `email` varchar(254) CHARACTER SET utf8mb4 NOT NULL, `username` varchar(25) CHARACTER SET utf8mb4 NOT NULL, `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1; ";
			$sql .= "INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES (1, '$email', '$username', '$hashedPassword');";
			$sql .= "ALTER TABLE `users` ADD PRIMARY KEY (`id`); ";
			$sql .= "ALTER TABLE `users` MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2; ";

			$sql .= "CREATE TABLE `sidebar_info` (`id` tinyint(6) UNSIGNED NOT NULL, `contentid` varchar(25) CHARACTER SET utf8mb4 NOT NULL, `content` varchar(1000) CHARACTER SET utf8mb4 NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1; ";
			$sql .= "INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (1, 'userImage', 'default-userimage.png'); ";
			$sql .= "INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (2, 'userName', 'Lorem Ipsum'); ";
			$sql .= "INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (3, 'userContent', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'); ";
			$sql .= "INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES (4, 'userBehance', 'https://www.behance.net/qmccarthy9cc69'); ";
			$sql .= "ALTER TABLE `sidebar_info` ADD PRIMARY KEY (`id`); ";
			$sql .= "ALTER TABLE `sidebar_info` MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4; ";

			$result = mysqli_multi_query($dbc, $sql);

			if($result){
				header("Refresh:2; URL=./index.php");
			} else{
				die("An error has occurred (DBC_FAIL_INIT)");
			}
		}
	}
?>
		<div class="container mt-5">
			<p>Please ensure the .env file is setup correctly and that the specified database exists and is empty.</p>

			<p>If any errors are produced from this file, you may setup the database manually as per the instructions in the README</p>

			<?php if($_POST && !empty($errors)): ?>
				<div class="alert alert-danger" role="alert">
					<ul class="post-errors-list">
						<?php foreach($errors as $error): ?>
							<li><?= $error; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<form action="db_init.php" method="post">
				<div class="form-group">
					<label for="email">Root Email</label>
					<input class="form-control" type="email" name="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"]; } ?>">
				</div>

				<div class="form-group">
					<label for="username">Root Username</label>
					<input class="form-control" type="text" name="username" value="<?php if(isset($_POST["username"])){ echo $_POST["username"]; } ?>">
				</div>

				<div class="form-group">
					<label for="password">Root Password</label>
					<input class="form-control" type="password" name="password" value="">
				</div>

				<div class="form-group">
					<label for="confirmpass">Confirm Root Password</label>
					<input class="form-control" type="password" name="confirmpass" value="">
				</div>

				<input type="submit" name="submit" value="Begin setup">
			</form>
		</div>
	</body>
</html>
