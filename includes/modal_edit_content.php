<?php
	$sql = "SELECT * FROM `sidebar_info` WHERE `contentid`='userContent'";

	$result = mysqli_query($dbc, $sql);

	if($result && mysqli_affected_rows($dbc) > 0){
		$userInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else{
		die("An error has occurred (DBC_SEL_FAIL)");
	}

	if($_POST && isset($_POST['contentEdit'])){
		$errors = array();

		extract($_POST);

		if(!$changedContent){
			array_push($errors, "Content cannot be blank.");
		}

		if(empty($errors)){
			$newContent = mysqli_real_escape_string($dbc, $changedContent);

			$sql = "UPDATE `sidebar_info` SET `content`='$newContent' WHERE `contentid`='userContent'";

			$result = mysqli_query($dbc, $sql);

			if($result && mysqli_affected_rows($dbc) > 0){
				// Use meta redirect to prevent header error.
				// header("Refresh:0;URL=./index.php");
				echo "<meta http-equiv='refresh' content='0; url=./index.php'>";
			}
		}
	}
?>

<div class="modal fade" id="contentEditModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title">Bio Edit</h5>
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
						<label for="changedContent">Bio</label>
						<textarea name="changedContent" class="form-control" style="height:210px;"><?php if(isset($_POST['changedContent'])){ echo $_POST['changedContent']; } else { echo $userInfo["content"]; } ?></textarea>
					</div>

					<input type="hidden" name="contentEdit" value="true">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
