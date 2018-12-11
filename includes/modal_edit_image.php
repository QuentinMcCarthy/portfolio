<?php
	use Intervention\Image\ImageManager;

	$sql = "SELECT * FROM `sidebar_info` WHERE `contentid`='userImage'";

	$result = mysqli_query($dbc, $sql);

	if($result && mysqli_affected_rows($dbc) > 0){
		$userInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

		$originalImage = $userInfo['content'];
	} else{
		die("An error has occurred (DBC_SEL_FAIL)");
	}

	if($_POST && isset($_POST['imageEdit'])){
		$errors = array();

		extract($_POST);

		if(file_exists($_FILES['changedImage']['tmp_name'])){
			$fileSize = $_FILES['changedImage']['size'];
			$fileTmp = $_FILES['changedImage']['tmp_name'];
			$fileType = $_FILES['changedImage']['type'];

			if($fileSize > 5000000){
				array_push($errors, "The image is too large, must be under 5MB");
			} else{
				$validExtensions = array(
					"jpeg",
					"jpg",
					"png",
				);

				$fileNameArray = explode(".", $_FILES['changedImage']['name']);

				$fileExt = strtolower(end($fileNameArray));

				if(!in_array($fileExt, $validExtensions)){
					array_push($errors, "Image must be JPG or PNG");
				}
			}
		} else{
			array_push($errors, "Please upload an image");
		}

		if(empty($errors)){
			if(file_exists($_FILES['changedImage']['tmp_name'])){
				$newFileName = uniqid().".".$fileExt;

				$filename = mysqli_real_escape_string($dbc, $newFileName);

				$sql = "UPDATE `sidebar_info` SET `content`='$filename' WHERE `contentid`='userImage'";
			}

			$result = mysqli_query($dbc, $sql);

			if($result && mysqli_affected_rows($dbc) > 0){
				if(file_Exists($_FILES['changedImage']['tmp_name'])){
					unlink("./uploads/sidebar/resized-$originalImage");
					unlink("./uploads/sidebar/$originalImage");

					$destination = "./uploads/sidebar/";

					if(!is_dir($destination)){
						mkdir($destination."/", 0777, true);
					}

					$manager = new ImageManager();
					$mainImage = $manager->make($fileTmp);
					$mainImage->save($destination."/".$newFileName, 100);

					$resizedImage = $manager->make($fileTmp);

					$resizedImage->resize(null, 200, function($constraint){
						$constraint->aspectRatio();
						$constraint->upsize();
					});

					$resizedImage->save($destination."/resized-".$newFileName, 100);
				}

				// Use meta redirect to prevent header error.
				// header("Refresh:0;URL=./index.php");
				echo "<meta http-equiv='refresh' content='0; url=./index.php'>";
			} else{
				array_push($errors, "An error has occurred (DBC_UPDATE_FAIL)");
			}
		}
	}
?>

<div class="modal fade" id="imageEditModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title">New Image</h5>
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

				<form action="index.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="password">Upload new Image</label>
						<input type="file" name="changedImage" class="form-control-file" value="">
					</div>

					<input type="hidden" name="imageEdit" value="true">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
