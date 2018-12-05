<script>
	$(document).ready(function(){
		<?php
			$reopenLoginModal = "false";

			if(isset($_POST['login']) && !empty($errors)){
				$reopenLoginModal = "true";
			}

			$reopenLogoutModal = "false";

			if(isset($_POST['logout'])){
				$reopenLogoutModal = "true";
			}

			$reopenNameEditModal = "false";

			if(isset($_POST['nameEdit']) && !empty($errors)){
				$reopenNameEditModal = "true";
			}
		?>
		
		if(<?= $reopenLoginModal; ?>){
			$("#loginModal").modal("show");
		}

		if(<?= $reopenLogoutModal; ?>){
			$("#logoutModal").modal("show");
		}

		if(<?= $reopenNameEditModal; ?>){
			$("#nameEditModal").modal("show");
		}
	});
</script>
