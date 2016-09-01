<?php

/**
 * Pipeline pour Yellowlab
 *
 * @plugin     Yellowlab
 * @copyright  2014
 * @author     Vincent
 * @licence    GNU/GPL
 * @package    SPIP\yellowlab\fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Créer le fichier JSON
 *
 * @param string $href
 * @return array resultat
 */
function yellowlab_creer_json($href) {

	include_spip('inc/distant');
	include_spip('inc/flock');
	include_spip('inc/config');

	$config = lire_config('yellowlab');
	$url_yellowlab = $config['url_config'] . 'api/runs';
	$result = recuperer_url($url_yellowlab, array('methode' => 'POST', 'datas' => array('url' => $href)));

	$json = json_encode($result, true);
	ecrire_fichier(_DIR_VAR . 'yellowlab.json', $json);

	return false;
}
