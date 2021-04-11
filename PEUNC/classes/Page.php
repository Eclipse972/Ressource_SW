<?php
// classes pages de PEUNC
abstract class PagePEUNC
{
	protected $BD;
	protected $logo;
	protected $titre;

	abstract public function CSS();
	abstract public function Section();
	abstract public function PagesConnexes();	// page en lien sur le site

	public function __construct()
	{
		$this->BD = new base2donnees;
		$this->logo = "Vue/images/logo.png";
		$this->titre = "Foire Aux Questions SolidWorks de ChristopHe";
	}

	public function CodeCSS($nom)	{ echo "<link rel=\"stylesheet\" href=\"Vue/{$nom}.css\" />\n"; }

	public function hearderLogo() { echo $this->logo; }

	public function headerTitre() { echo $this->titre; }

	public function LienFormulaire() { echo " - <a href=\"?alpha=-2\">Me contacter</a>\n"; }

	public function Onglets()
	{
		$T_Onglets = $this->BD->Liste_niveau(1);
		echo "<ul>\n";
		foreach($T_Onglets as $alpha => $code)
			echo "\t\t<li>", (($alpha == $_SESSION['alpha']) ? str_replace('href', 'id="onglet_actif" href', $code) : $code), "</li>\n";
		echo "\t</ul>\n";
	}

	public function Menu()
	{
		$T_item = $this->BD->Liste_niveau(2);
		echo "<nav>\n\t<ul>\n";
		foreach($T_item as $beta => $code) {
			echo "\t\t<li>", (($beta == $_SESSION['beta']) ? str_replace('href', 'id="item_actif" href', $code) : $code), "</li>\n";
			if ($beta == $_SESSION['beta']) {	// sous-menu?
				$T_sous_item = $this->BD->Liste_niveau(3);
				if (isset($T_sous_item)) {	// génération sous-menu s'il existe
					echo "\t\t<ul>\n";
					foreach($T_sous_item as $gamma => $sous_code)
						echo "\t\t\t<li>", ($gamma == $_SESSION['gamma']) ? str_replace('href', 'id="sous_item_actif" href', $sous_code) : $sous_code, "</li>\n";
					echo "\t\t</ul>\n";
				}
			}
		}
		echo "\t</ul>\n</nav>\n";
	}

	public function ArticlesConnexes()
	{
		echo "<aside>\n";
		$this->PagesConnexes();
		echo "</aside>\n";
	}
}

// Classes filles
class ErreurPEUNC extends PagePEUNC
{
	public function CSS() { $this->CodeCSS("erreur"); }

	public function Menu()	{ ?><nav></nav><?php } // génère une colonne vide

	public function PagesConnexes() {}

	public function Section()	{ ?><h1>Erreur <?=$_SESSION['beta']?>: <?=$this->BD->TexteErreur()?></h1><?php	}
}

class FormulairePEUNC extends PagePEUNC
{
	public function __construct() {
		parent::__construct();
		if (empty($_POST))	{ // préparation affichage du formulaire

		} else {	// traitement du formulaire

		}
	}
	// fonctions obligatoires
	public function CSS() { $this->CodeCSS("formulaire"); }

	public function Menu()	{ ?><nav></nav><?php } // génère une colonne vide

	public function PagesConnexes() {}

	public function Section()
	{
	?>
	<h1>Formulaire en construction</h1>
	<form method="post" action="?formulaire=1" id=formulaire>
		<p>Nom		<input type="text"	name="nom"		/></p>
		<p>Courriel	<input type="email" name="courriel" /></p>
		<p>Objet	<input type="text"	name="objet"	/></p>
		<p>Message	<textarea name="message" rows="6"></textarea></p>
		<?=$this->Afficher_validation();?>
		<p style="text-align:center;">
			<input type="submit" value="Envoyer" style="width:100px; margin-right:200px" />
		</p>
	</form>
	<?php
	}
	// fin de fonctions obligatoires
	public function Afficher_validation()
	{
	?><div id=validation>
			<p>Validation du formulaire</p>
			<ul>

			</ul>
			<p>Code	<input type="text" name="code" style="width:100px;" /></p>
		</div>
	<?php
	}

	public function LienFormulaire() {}
}
