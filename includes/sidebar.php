<?php
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
				if($info['content'] == "default-userimage.png"){
					$userImage = "./assets/img/".$info['content'];
				} else{
					$userImage = "./uploads/sidebar/".$info['content'];
				}

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

<div id="userSidebar" class="col-6 bg-dark text-light pt-2 pb-2">
	<div class="row">
		<div class="col d-flex align-items-center justify-content-between">
			<div id="userImageContainer" class="position-relative">
				<img id="userImage" class="img-fluid" src="<?= $userImage ?>" alt="User Portrait">
				<?php if(isset($_SESSION["username"])): ?>
					<div id="userImageEdit" class="d-flex position-absolute justify-content-center">
						<i class="fas fa-camera fa-2x align-self-center"></i>
					</div>
				<?php endif; ?>
			</div>

			<div class="position-relative">
				<h1 id="userName"><?= $userName ?></h1>
				<?php if(isset($_SESSION["username"])): ?>
					<div id="userNameEdit" class="position-absolute">
						<div id="userNameEditBtn" class="d-none position-absolute justify-content-center">
							<i class="fas fa-edit align-self-center"></i>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Sidebar content -->
	<div class="row">
		<div class="col pl-3 pr-3 pt-3">
			<p id="userContent" class="text-justify"><?= $userContent ?></p>
		</div>
	</div>

	<!-- Sidebar footer, contains social media links and meta login -->
	<div class="row">
		<div class="col">
			<hr>
			<?php if(empty($_SESSION["username"])): ?>
				<a href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt fa-2x"></i></a>
			<?php else: ?>
				<a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-2x"></i></a>
			<?php endif; ?>

			<?php if(strlen($userBehance) > 0): ?>
				<a id="userBehance" href="<?= $userBehance ?>"><i class="fab fa-behance-square fa-2x"></i></a>
			<?php endif; ?>
		</div>
	</div>
</div>
