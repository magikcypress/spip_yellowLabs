<?php
/**
 * Pipeline pour Monitor
 *
 * @plugin     Monitor
 * @copyright  2014
 * @author     Vincent
 * @licence    GNU/GPL
 * @package    SPIP\Monitor\fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Traiter les données pour les afficher dans un tableau
 *
 * @param string $href
 * @return array resultat
 */
function yellowLab($href) {

	$result[] = attrape_yellowlab($href);

	return $result;
}

/**
 * Traiter les données plus profonde
 *
 * @param string $texte
 * @return array resultat
 */
function tableau_yellowLab($texte) {

	if (isset($texte)) {
		foreach ($texte as $cle => $valeur) {
			$donnees[$cle] = $valeur;
		}
	}

	return $donnees;
}

/**
 * Afficher le code couleur du score
 *
 * @param string $nombre
 * @return array resultat
 */
function score($nombre) {
	if (is_numeric($nombre) && $nombre > 80) {
		return 'A';
	}
	if (is_numeric($nombre) && $nombre > 60) {
		return 'B';
	}
	if (is_numeric($nombre) && $nombre > 40) {
		return 'C';
	}
	if (is_numeric($nombre) && $nombre > 20) {
		return 'D';
	}
	if (is_numeric($nombre) && $nombre > 0) {
		return 'E';
	}
	if (is_numeric($nombre) && $nombre == 0) {
		return 'F';
	}
}
