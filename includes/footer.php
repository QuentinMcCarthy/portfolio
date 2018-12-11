		<!-- Modals -->
		<?php
			// Login modal must be loaded first due to header information
			require "./includes/modal_login.php";

			$modalFiles = glob("./includes/modal_*.php");

			foreach($modalFiles as $modalFile){
				if(!strpos($modalFile, "scripts.php") && !strpos($modalFile, "modal_login.php")){
					require $modalFile;
				}
			}
		?>

		<!-- jQuery -->
		<script src="./assets/js/jquery.min.js"></script>

		<!-- Bootstrap JS-->
		<script src="./assets/js/bootstrap.min.js"></script>

		<!-- Modal scripts -->
		<?php require "./includes/modal_scripts.php"; ?>

		<script src="./assets/js/script.js"></script>
	</body>
</html>
