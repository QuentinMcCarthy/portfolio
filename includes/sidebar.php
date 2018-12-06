<?php
	$sql = "SELECT `contentid`, `content` FROM `sidebar_info`;";

	$result = mysqli_query($dbc, $sql);

	if($result){
		$allInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);

		$userImage    = "";
		$userName     = "";
		$userContent  = "";
		$userGithub   = "";
		$userFacebook = "";
		$userGoogle   = "";
		$userBehance  = "";
		$userLinkedin = "";

		foreach($allInfo as $info){
			switch($info['contentid']){
				case "userImage":
					if($info['content'] == "default-userimage.png"){
						$userImage = "./assets/img/".$info['content'];
					} else{
						$userImage = "./uploads/sidebar/resized-".$info['content'];
					}

					break;
				case "userName":
					$userName = $info['content'];

					break;
				case "userContent":
					$userContent = $info['content'];

					break;
				case "userGithub":
					$userGithub = $info['content'];

					break;
				case "userFacebook":
					$userFacebook = $info['content'];

					break;
				case "userGoogle":
					$userGoogle = $info['content'];

					break;
				case "userBehance":
					$userBehance = $info['content'];

					break;
				case "userLinkedin":
					$userLinkedin = $info['content'];

					break;
				default:
					die("An error has occurred (INFO_UNKNOWN)");

					break;
			}
		}
	} else {
		die("An error has occurred (DBC_SEL_FAIL)");
	}
?>

<div id="userSidebar" class="col-6 bg-dark text-light pt-2 pb-2">
	<div class="row">
		<div class="col d-flex align-items-center justify-content-between">
			<div id="userImageContainer" class="position-relative">
				<img id="userImage" class="img-fluid" src="<?= $userImage ?>" alt="User Portrait">
				<?php if(isset($_SESSION["username"])): ?>
					<div id="userImageEdit" class="edit-container d-flex position-absolute justify-content-center" data-toggle="modal" data-target="#imageEditModal" data-backdrop="static" data-keyboard="false">
						<i class="fas fa-camera fa-2x align-self-center"></i>
					</div>
				<?php endif; ?>
			</div>

			<div class="position-relative">
				<h1 id="userName"><?= $userName ?></h1>
				<?php if(isset($_SESSION["username"])): ?>
					<div class="edit-container position-absolute">
						<div class="edit-btn d-none position-absolute justify-content-center" data-toggle="modal" data-target="#nameEditModal" data-backdrop="static" data-keyboard="false">
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
			<?php if(isset($_SESSION["username"])): ?>
				<div class="edit-container position-absolute">
					<div class="edit-btn d-none position-absolute justify-content-center" data-toggle="modal" data-target="#contentEditModal" data-backdrop="static" data-keyboard="false">
						<i class="fas fa-edit align-self-center"></i>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Sidebar footer, contains social media links and meta login -->
	<div class="row">
		<div class="col">
			<hr>
			<?php if(empty($_SESSION["username"])): ?>
				<a href="#" data-toggle="modal" data-target="#loginModal" data-backdrop="static" data-keyboard="false"><i class="fas fa-sign-in-alt fa-2x"></i></a>
			<?php else: ?>
				<a href="#" data-toggle="modal" data-target="#logoutModal" data-backdrop="static" data-keyboard="false"><i class="fas fa-sign-out-alt fa-2x"></i></a>
			<?php endif; ?>

			<?php if(strlen($userGithub) > 0): ?>
				<a id="userGithub" href="<?= $userGithub; ?>"><i class="fab fa-github fa-2x"></i></a>
			<?php endif; ?>

			<?php if(strlen($userFacebook) > 0): ?>
				<a id="userFacebook" href="<?= $userFacebook; ?>"><i class="fab fa-facebook fa-2x"></i></a>
			<?php endif; ?>

			<?php if(strlen($userGoogle) > 0): ?>
				<a id="userGoogle" href="<?= $userGoogle; ?>"><i class="fab fa-google-plus fa-2x"></i></a>
			<?php endif; ?>

			<?php if(strlen($userBehance) > 0): ?>
				<a id="userBehance" href="<?= $userBehance; ?>"><i class="fab fa-behance-square fa-2x"></i></a>
			<?php endif; ?>

			<?php if(strlen($userLinkedin) > 0): ?>
				<a id="userLinkedin" href="<?= $userLinkedin; ?>"><i class="fab fa-linkedin fa-2x"></i></a>
			<?php endif; ?>
		</div>
	</div>
</div>
