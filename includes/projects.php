<?php
	$sql = "SELECT `id`, `name`, `url`, `image`, `description` FROM `projects`;";

	$result = mysqli_query($dbc, $sql);

	if($result){
		$allProjects = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		die("An error has occurred (DBC_SEL_FAIL)");
	}
?>

<div id="allProjects" class="col px-0">
	<div class="row mx-0">
		<?php foreach($allProjects as $project): ?>
			<div class="project col-4 px-0" data-id="<?= $project['id']; ?>">
					<div class="position-relative">
						<img class="project-image" src="./uploads/projects/<?= $project['image']; ?>" alt="">

						<a href="<?= $baseURL; ?>project/<?= $project['url']; ?>">
							<div class="project-info position-absolute p-1">
								<h2><?= $project['name']; ?></h2>
								<p><?= $project["description"]; ?></p>
							</div>
						</a>
					</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
