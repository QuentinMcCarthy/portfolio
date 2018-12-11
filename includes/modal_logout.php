<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h5 class="modal-title">Log out</h5>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<?php if($_POST && isset($_POST["logout"])): ?>
					<?php
						unset($_SESSION["username"]);
					?>

					<div class="alert alert-success">
						<p class="mb-0">Succesfully logged out</p>
					</div>

					<a href="#" class="btn btn-primary">Close</a>
				<?php else: ?>
					<p>Are you sure you want to log out?</p>


					<form action="index.php" method="post">
						<input type="hidden" name="logout" value="true">

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" name="submit" class="btn btn-primary">Logout</button>
					</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
