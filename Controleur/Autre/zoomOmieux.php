<?php
ob_start();	// début du code <section>
?>
	<h1>Zoom au mieux</h1>
	<p>Permet de voir la pi&egrave;ce/l&apos;assemblage/la miseen plan en entier.</p>
	<p>Exemple: on a zoom&eacute; sur une partie de la pelleteuse</p>
	<img src="/images/Autre/avant.png">
	<p>On clique sur «zoom au mieux» la premi&egrave;re ic&ocirc;ne de la barre d&apos;outils pour afficher la pelleteuse en entier. On obtient</p>
	<img src="/images/Autre/apres.png">
<?php
$this->scriptSection = ob_get_contents();
ob_end_clean();

