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
