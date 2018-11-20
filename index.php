<?php require "./includes/header.php" ?>
	<div class="container-fluid pt-5 pb-5">
		<div class="row">
			<!-- Sidebar details for the user -->
			<div id="userSidebar" class="col-6 bg-dark text-light pt-2 pb-2">
				<div class="row">
					<div class="col d-flex align-items-center justify-content-between">
						<img id="userImage" class="img-fluid" src="http://placehold.it/150x150" alt="User Portrait">

						<h1>Quentin M<sup>c</sup>Carthy</h1>
					</div>
				</div>

				<!-- Sidebar content -->
				<div class="row">
					<div class="col pl-3 pr-3 pt-3">
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>

				<!-- Footer, contains social media links and meta login -->
				<div class="row">
					<div class="col">
						<hr>
						<a href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt fa-2x"></i></a>
						<a href="https://www.behance.net/qmccarthy9cc69"><i class="fab fa-behance-square fa-2x"></i></a>
					</div>
				</div>
			</div>

			<div class="col">
				<div class="row">
					<div class="col">
						<h1>Grid</h1>
					</div>
					<div class="col">
						<h1>Grid</h1>
					</div>
					<div class="col">
						<h1>Grid</h1>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h1>Grid</h1>
					</div>
					<div class="col">
						<h1>Grid</h1>
					</div>
					<div class="col">
						<h1>Grid</h1>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h1>Grid</h1>
					</div>
					<div class="col">
						<h1>Grid</h1>
					</div>
					<div class="col">
						<h1>Grid</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal Title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
				</div>

				<div class="modal-body">
					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save Changes</button>
				</div>
			</div>
		</div>
	</div>
<?php require "./includes/footer.php" ?>
