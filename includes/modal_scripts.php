<script>
	$(document).ready(function(){
		<?php
			$reopenLoginModal = "false";

			if(isset($_POST["login"]) && !empty($errors)){
				$reopenLoginModal = "true";
			}
		?>
		if(<?= $reopenLoginModal; ?>){
			$("#loginModal").modal("show");
		}

		<?php
			$reopenLogoutModal = "false";

			if(isset($_POST["logout"])){
				$reopenLogoutModal = "true";
			}
		?>
		if(<?= $reopenLogoutModal; ?>){
			$("#logoutModal").modal("show");
		}
	});
</script>
