<?php
	require "./includes/header.php";

	$sql = "SELECT `contentid`, `content` FROM `sidebar_info`;";

	$result = mysqli_query($dbc, $sql);

	if($result){
		$allInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		die("An error has occurred (DBC_SEL_FAIL)");
	}

	$userImage   = "";
	$userName    = "";
	$userContent = "";
	$userBehance = "";

	foreach($allInfo as $info){
		switch($info['contentid']){
			case "userImage":
				$userImage = $info['content'];

				break;
			case "userName":
				$userName = $info['content'];

				break;
			case "userContent":
				$userContent = $info['content'];

				break;
			case "userBehance":
				$userBehance = $info['content'];

				break;
			default:
				die("An error has occurred (INFO_UNKNOWN)");

				break;
		}
	}
?>
	<div class="container-fluid pt-5 pb-5">
		<div class="row">
			<!-- Sidebar details for the user -->
			<div id="userSidebar" class="col-6 bg-dark text-light pt-2 pb-2">
				<div class="row">
					<div class="col d-flex align-items-center justify-content-between">
						<div class="position-relative">
							<img id="userImage" class="img-fluid" src="./assets/img/<?= $userImage ?>" alt="User Portrait">
							<?php if(isset($_SESSION["username"])): ?>
								<div id="userImageSelect" class="position-absolute justify-content-center align-content-center">
									<i class="fas fa-camera fa-2x align-self-center"></i>
								</div>
							<?php endif; ?>
						</div>

						<h1 id="userName"><?= $userName ?></h1>
					</div>
				</div>

				<!-- Sidebar content -->
				<div class="row">
					<div class="col pl-3 pr-3 pt-3">
						<p id="userContent" class="text-justify"><?= $userContent ?></p>
					</div>
				</div>

				<!-- Footer, contains social media links and meta login -->
				<div class="row">
					<div class="col">
						<hr>
						<?php if(empty($_SESSION["username"])): ?>
							<a href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt fa-2x"></i></a>
						<?php else: ?>
							<a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-2x"></i></a>
						<?php endif; ?>
						<a id="userBehance" href="<?= $userBehance ?>"><i class="fab fa-behance-square fa-2x"></i></a>
					</div>
				</div>
			</div>

			<!-- Main content grid -->
			<div class="col">
				<div class="row">
					<div class="col-4">
						<h1>Grid</h1>
					</div>
					<div class="col-4">
						<h1>Grid</h1>
					</div>
					<div class="col-4">
						<h1>Grid</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						<h1>Grid</h1>
					</div>
					<div class="col-4">
						<h1>Grid</h1>
					</div>
					<div class="col-4">
						<h1>Grid</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-4">
						<h1>Grid</h1>
					</div>
					<div class="col-4">
						<h1>Grid</h1>
					</div>
					<div class="col-4">
						<h1>Grid</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require "./includes/footer.php"; ?>
