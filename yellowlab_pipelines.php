<?php

/** Yellowlab.tools
 *
 * @plugin     Yellowlab.tools
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\yellowlab\pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Ajoute des scripts D3JS dans l'espace privé
 *
 * @param string $plugins 
 * @return string
**/
function yellowlab_d3js_plugins($plugins) {
	if (test_espace_prive()) {
		$plugins[] = 'gauge';
	}

	return $plugins;
}

/**
 * Afficher yellowlab milieu page site
 * @param array $flux
 * @return array
 */
function yellowlab_affiche_milieu($flux) {

	if (trouver_objet_exec($flux['args']['exec'] == 'site')) {
		$id_syndic = _request('id_syndic');
		
		$texte = recuperer_fond(
						'prive/squelettes/contenu/yellowlab',
						array(
							'id_syndic'=>$id_syndic
						)
		);

		if ($p=strpos($flux['data'], '<!--affiche_milieu-->')) {
			$flux['data'] = substr_replace($flux['data'], $texte, $p, 0);
		} else {
			$flux['data'] .= $texte;
		}
	}

	if (trouver_objet_exec($flux['args']['exec'] == 'configurer_identite')) {
		include_spip('inc/config');
		$url_site_spip = lire_config('adresse_site');

		$texte = recuperer_fond(
						'prive/squelettes/contenu/yellowlab',
						array(
							'url_site_spip'=>$url_site_spip
						)
		);

		if ($p=strpos($flux['data'], '<!--affiche_milieu-->')) {
			$flux['data'] = substr_replace($flux['data'], $texte, $p, 0);
		} else {
			$flux['data'] .= $texte;
		}
	}

	return $flux;
}
