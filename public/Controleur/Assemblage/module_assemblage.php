<?php
ob_start();	// début du code <section>
?>
	<h1>Le module assemblage</h1>
	<p>Dans cette section seront trait&eacute;s l'assemblage de pi&egrave;ces et de sous assemblages.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
