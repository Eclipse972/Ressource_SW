<?php
ob_start();	// début du code <section>
?>
	<h1>Ouvrir eficacement un fichier</h1>
	<p>Un projet peut contenir un nombre &eacute;lev&eacute; de pi&egrave;ces. Un moyen de s&apos;en sortir est de filtrer la liste de fichier.</p>
<?php
$tampon = ob_get_contents();
ob_end_clean();
$this->setSection($tampon);
