<?php
ob_start();	// début du code <section>
?>
	<h1>Couper une pi&egrave;ce &agrave; l&apos;&eacute;cran</h1>
	<p>Page en construction</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
