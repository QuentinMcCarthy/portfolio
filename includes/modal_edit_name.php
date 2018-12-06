<?php
	$sql = "SELECT * FROM `sidebar_info` WHERE contentid = 'userName'";

	$result = mysqli_query($dbc, $sql);

	if($result && mysqli_affected_rows($dbc) > 0){
		$userInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else{
		var_dump("(DBC_SEL_FAIL)");
	}

	if($_POST && isset($_POST['nameEdit'])){
		$errors = array();

		extract($_POST);

		if(!$changedName){
			array_push($errors, "Name cannot be blank.");
		}

		if(empty($errors)){
			$newName = mysqli_real_escape_string($dbc, $changedName);

			$id = $userInfo['id'];

			$sql = "UPDATE `sidebar_info` SET `content`='$newName' WHERE `id`=$id";

			$result = mysqli_query($dbc, $sql);

			if($result && mysqli_affected_rows($dbc) > 0){
				header("Refresh:0;URL=./index.php");
			}
		}
	}
?>

<div class="modal fade" id="nameEditModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title">Name Edit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
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

				<form action="index.php" method="post">
					<div class="form-group">
						<label for="changedName">Name</label>
						<input type="text" name="changedName" class="form-control" value="<?php if(isset($_POST['changedName'])){ echo $_POST['changedName']; } else { echo $userInfo["content"]; } ?>">
					</div>

					<input type="hidden" name="nameEdit" value="true">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
