<?php
class base2donnees { // chaque requête doit commencer par une nouvelle connexion. =< utilisation de new à chaque appael
private $resultat;
private $BD; // PDO initialisé dans connexion.php

public function __construct() { // chemin de la forme 'chemin/'. Cette classe peut être demandé de plusiers endroits du site
	try	{// On se connecte à MySQL grâce au script non suivi par git
		include 'connexion.php';
	} // contient: $this->BD = new PDO('mysql:host=hote;dbname=base;charset=utf8', 'identifiant', 'mot2passe');
	catch (Exception $e)	{ // En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
}

private function Requete($requete, array $T_parametre) {
	$this->resultat = $this->BD->prepare($requete);
	// la liste de paramètres sous forme d'un tableau dans le même ordre que les ? dans la requête
	$this->resultat->execute($T_parametre);
}

private function Fermer() { $this->resultat->closeCursor(); }	 // Termine le traitement de la requête

public function ClassePage() {
	$this->Requete('SELECT * FROM Vue_classePage WHERE alpha= ? AND beta= ? AND gamma= ?', [$_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse['nom'];
}

public function TexteErreur() {
	$this->Requete('SELECT texte FROM Items WHERE alpha=-1 AND beta= ?', [$_SESSION['beta']]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse['texte'];
}

public function Liste_niveau($niveau) {
	switch ($niveau) {
		case 1:	$index = 'alpha';	$expAlpha = '>=0';						$expBeta = '= 0';					$signe = '=';	break;
		case 2:	$index = 'beta';	$expAlpha = "= {$_SESSION['alpha']}";	$expBeta = '> 0';					$signe = '=';	break;
		case 3:	$index = 'gamma';	$expAlpha = "= {$_SESSION['alpha']}";	$expBeta = "= {$_SESSION['beta']}";	$signe = '>';	break;
		default: header("location:?alpha=-1&beta=3");	// tout autre valeur est rejetée
	}
	$sql = "SELECT {$index} AS i, code FROM Vue_code_item WHERE alpha {$expAlpha} AND beta {$expBeta} AND gamma {$signe} 0";
	$this->Requete($sql, []);
	$tableau = null;
	while ($ligne = $this->resultat->fetch()) {
		$i = $ligne['i'];
		$tableau[$i] = $ligne['code'];
	}
	$this->Fermer();
	return $tableau;
}
// fin du code PEUNC
public function PagesConnexes() {
	$this->Requete('SELECT URL FROM Vue_pagesConnexes WHERE alpha= ? AND beta= ? AND gamma= ?', [$_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']]);
	$reponse = $this->resultat->fetchAll();
	$this->Fermer();
	return $reponse;
}

public function DossierArticle() {
	$this->Requete('SELECT * FROM Vue_articleMenu WHERE alpha= ? AND beta= ? AND gamma= ?', [$_SESSION['alpha'], $_SESSION['beta'], $_SESSION['gamma']]);
	$reponse = $this->resultat->fetch();
	$this->Fermer();
	return $reponse['dossier'];
}

}
