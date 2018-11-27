<?php
	$sql = "SELECT `id`, `name`, `image`, `description` FROM `projects`;";

	$result = mysqli_query($dbc, $sql);

	if($result){
		$allProjects = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		die("An error has occurred (DBC_SEL_FAIL)");
	}
?>

<div class="col">
	<div class="row">
		<?php foreach($allProjects as $project): ?>
			<div class="col-4">
				<h1>Grid</h1>
			</div>
		<?php endforeach; ?>
	</div>
</div>
