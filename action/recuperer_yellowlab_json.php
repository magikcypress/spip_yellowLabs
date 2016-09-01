<?php

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('yellowlab_fonctions');
include_spip('inc/flock');

/**
 * Récupérer le json de page speed dans un fichier json dant local/pagespeed
 * 
 * @param string $arg l'URL cible
 * @return string
 */
function action_recuperer_yellowlab_json_dist() {

	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	if (is_numeric($arg)) {
		$site = sql_fetsel('id_syndic, url_site', 'spip_syndic', 'id_syndic=' . intval($arg));
		$result = attrape_yellowlab($site['url_site']);
	} else {
		$result = attrape_yellowlab($arg);
		$arg = 'courant';
	}

	$json = json_encode($result, true);
	$dir_var = sous_repertoire(_DIR_VAR, 'yellowlab');

	ecrire_fichier($dir_var . 'yellowlab_' . $arg . '.json', $json);
	sql_updateq('spip_syndic', array('score_yellowlab' => $result['globalscore'], 'date_yellowlab' => date('Y-m-d H:i:s')), 'id_syndic=' . intval($arg));

	return true;

}
