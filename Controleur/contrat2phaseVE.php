<style type="text/css">
#Phase {
	padding:10px;
	margin:10px;
	border:2px;
	border-color:black
}

#Phase h2 {
	background-color:yellow;
	text-align:center;
}

#Phase a {
	text-align:right;
}

</style>

<?php
// $dossierVE est une variable globale à définir avant d'utiliser les fonctions

function Titre($titre, $VE) { // VE et dossierVE ne sont pas forcément identiques.Exemple: tronc de cône et tronc2cone
global $dossierVE;
?>

<h1>Cr&eacute;er <?=$titre?> </h1>
<p>On veut r&eacute;aliser : <img src="Articles/<?=$dossierVE?>/VEcote.png" style="vertical-align:middle; height:300px" alt="<?=$VE?> cot&eacute;"></p>
<?php
}

function PlanDesquisse() {
global $dossierVE;
?>

<div id="Phase">
<h2>Choisir le plan d&apos;esquisse</h2>
<p>choisir un plan d&apos;esquisse (Face, Dessus ou Doite) dans l&apos;arbre de cr&eacute;ation<img src="Vue/images/arbre.png" style="vertical-align:middle" alt="Arbre de cr&eacute;ation vide"></p>
<a href="Vue/planDesquisse.avi">Montre moi</a>
</div>
<?php
}

function EsquisseCotée($liste_icones, $esquisse ='esquisse', $vidéo = 'esquisse') {
	// les 2 derniers aramètre permettent de créer plusieurs contrat de phase sur une seul page. Utile pour le tronc de cone et le cylindre
global $dossierVE;
?>

<div id="Phase">
<h2>Esquisse cot&eacute;e</h2>
<img src="Articles/<?=$dossierVE.'/'.$esquisse?>.png" style="vertical-align:middle; height:300px" alt="esquisse cot&eacute;e">
<p>Dans la barre d&apos;outils onglet Esquisse <img src="Vue/images/outilsEsquisse.png" alt="Barre d&apos;outils Esquisse"></p>
<p>Vous aurez besoin <?=$liste_icones?></p>
<p>Et enfin cotation intelligente<img src="Vue/images/cotation.png" style="vertical-align:middle" alt="ic&ocirc;ne cotation intelligente">pour coter votre esquisse.</p>
<a href="Articles/<?=$dossierVE.'/'.$vidéo?>.avi">Montre moi</a>
</div>
<?php
}

function MiseEnVolume($extrusion = true, $parametres = 'parametres', $vidéo = 'miseEnVoume') {
global $dossierVE;
?>

<div id="Phase">
<h2>Fonction de mise en volume</h2>
<p>Dans la barre d&apos;outils onglet Fonctions <img src="Vue/images/fonctions.png" style="vertical-align:middle" alt="Barre d&apos;outils Fonctions"></p>
<p>Cliquez sur l&apos;ic&ocirc;ne <?=$extrusion ? 'Base/Bossage extrud&eacute;' : 'Base bossage avec r&eacute;volution'?>
<img src="Vue/images/<?=$extrusion ? 'extrusion' : 'revolution'?>.png" style="height:30px; vertical-align:middle" alt="ic&ocirc;ne de mise en volume"></p>
<p>A gauche de l&apos;&eacute;cran apparaissent les param&egrave;tres: <img src="Articles/<?=$dossierVE,'/',$parametres?>.png" style="vertical-align:middle; " alt="param&egrave;tres"></p>
<p><?=$extrusion ? 'Dans la partie <b>Direction 1</b>, inscrivez la profondeur ici 70 mm.' : 'texte pour la révolution'?></p>
<a href="Articles/<?=$dossierVE.'/'.$vidéo?>.avi">Montre moi</a>
</div>
<?php
}