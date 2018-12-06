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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap JS-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<!-- Modal scripts -->
		<?php require "./includes/modal_scripts.php"; ?>

		<script src="js/script.js"></script>
	</body>
</html>
