<?php
class Position {	// identifiant des paramètres actuels ...
private $onglet;	// de 0 à 4 car il n'y a que 5 onglets
private $item;		// 0 signifie aucun item sélectionné donc le premier item à pour identifiant 1
private $sous_item;	// idem

//private $id_article;
//private $dossier;
//private $No_page;

//private $code_items;
//private $code_sous_items;

// les classes BD,navigation sont nécessaires

public function __construct($onglet, $item = 0, $sous_item = 0) {
	$this->onglet = $onglet;		// onglet accueil
	$this->item = $item;			// pas d'item sélectionné
	$this->sous_item = $sous_item;	// pas de sous-item sélectionné	
}

public function Generer_items() {
	// recherche a faire dans la BD
}

public function Generer_sous_items() {
	// recherche a faire dans la BD
}

public function Selectionner_Code($T_code, $id_actif, $etiquette) {
// T_code: tableau contenant les lignes de code HTML
// id_actif: No de la ligne sélectionée
// etiquette: étiquette pour la ligne sélectionnée

// modification de l'item sélectionné grâce à la variable $id_actif
$T_code[$id_actif] = '<a id="'.$etiquette.'"'.substr($T_code[$id_actif], 2); // <a href= ... est remplacé par <a id="étiquette" href=...
return $T_code;
}

public function Generer_Code_onglets() {
	// comme il n'y a que 5 onglets immuables on stocke chaque ligne de code dans un tableau
	$T_code_onglets[0] = Lien('<img src="Vue/images/accueil.png" alt="accueil">Accueil', 0);
	$T_code_onglets[1] = Lien('<img src="Vue/images/piece.png" alt="pi&egrave;ce">Pi&egrave;ce</a>', 1);
	$T_code_onglets[2] = Lien('<img src="Vue/images/MEP.png" alt="Mise en plan">Mise en plan</a>', 2);
	$T_code_onglets[3] = Lien('<img src="Vue/images/assemblage.png" alt="Assemblage">Assemblage</a>', 3);
	$T_code_onglets[4] = Lien('<img src="Vue/images/autre.png" alt="Autre">Autre</a>', 4);
	
	$T_code_onglets = $this->Selectionner_Code($T_code_onglets, $this->onglet, 'onglet_actif');
	
	$code = '<ul>'."\n";
	for ($i = 0; $i<5; $i++) {
		$code .= "\t".'<li>'.$T_code_onglets[$i].'</li>'."\n";
	}
	$code .= "\t".'</ul>'."\n";
	return $code;
}

public function Code_menu() {
	// il va falloir intégrer le sous menu à la bonne place
}

}