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

function yellowLab($href) {

	$result[] = attrape_yellowlab($href);

	return $result;
}

function tableau_yellowLab($texte) {

	if (isset($texte)) {
		foreach ($texte as $cle => $valeur) {
			$donnees[$cle] = $valeur;
		}
	}

	return $donnees;
}

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
