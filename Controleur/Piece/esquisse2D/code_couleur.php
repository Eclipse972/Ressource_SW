<?php
ob_start();	// début du code <section>
?>
	<h1>Code couleur</h1>
	<p>Page en construction</p>
<?php
$this->scriptSection = ob_get_contents();
ob_end_clean();
