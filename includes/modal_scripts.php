<script>
	$(document).ready(function(){
		<?php
			$reopenLoginModal = "false";

			if($_POST["loginmodal"] == "true" && !empty($errors)){
				$reopenLoginModal = "true";
			}
		?>
		if(<?= $reopenLoginModal; ?>){
			$("#loginModal").modal("show");
		}
	});
</script>
