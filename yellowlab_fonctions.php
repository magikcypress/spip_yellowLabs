<?php

/** Yellowlab.tools
 *
 * @plugin     Yellowlab.tools
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\yellowlab\fonctions      
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Récupére les données depuis l'api de yellowlab
 *
 * @param string $href
 * @return array resultat
 */
// function attrape_yellowlab($href) {
// 	// form URL
// 	// return API key
// 	// POST http://yellowlab.tools/api/runs
// 	// result
// 	// GET http://yellowlab.tools/api/runs/<runId>
// 	include_spip('inc/distant');
// 	include_spip('inc/config');

// 	$config = lire_config('yellowlab');
// 	$url_yellowlab = $config['url_config'] . 'api/runs';
// 	$result = recuperer_url($url_yellowlab, array('methode' => 'POST', 'datas' => array('url' => $href)));
// 	// $json = json_decode($result, true);

// 	$donnees = array();
// 	$donnees_rules = array();
// 	$result = $result['page'];
// 	$scoreProfiles = $result->{'params'};
// 	$globalScore = $result->{'scoreProfiles'}->{'generic'}->{'globalScore'};

// 	if ($scoreProfiles) {
// 		foreach ($scoreProfiles as $valueScore) {
// 			foreach ($valueScore as $cle => $valeur) {
// 				array_push($donnees, array($cle => $valeur));
// 				if (is_array($valeur)) {
// 					foreach ($valeur as $key => $val) {
// 						$rules = $result->{'rules'}->{'' .$val . ''};
// 						array_push($donnees, $rules);
// 					}
// 				}
// 			}
// 		}
// 	}
// 	return array('donnees' => $donnees, 'globalscore' => $globalScore);
// }

/**
 * Récupére les données depuis l'api de yellowlab
 *
 * @param string $href
 * @return array resultat
 */
function attrape_yellowlab($href) {

	include_spip('inc/distant');
	include_spip('inc/config');

	$config = lire_config('yellowlab');
	$url_yellowlab = $config['url_config'] . 'api/runs';
	$result = recuperer_url($url_yellowlab, array('methode' => 'POST', 'datas' => array('url' => $href)));
	$json = json_encode($result, true);
	
	if ($result['status'] == 200) {

		if ($result['page']) {
			$donnees = array();
			$json = json_decode($result['page'], true);
			$runId = $json['runId'];
			$globalscore = $json['scoreProfiles']['generic']['globalScore'];
			$scoreProfiles = $json['scoreProfiles']['generic']['categories'];
			if ($scoreProfiles) {
				foreach ($scoreProfiles as $valueScore) {
					foreach ($valueScore as $cle => $valeur) {
						array_push($donnees, array($cle => $valeur));
						if (is_array($valeur)) {
							foreach ($valeur as $key => $val) {
								$rules = $json['rules'][$val];
								array_push($donnees, $rules);
							}
						}
					}
				}
			}
		}
	}

	$tableau = array('runid' => $runId, 'globalscore' => $globalscore, 'donnees' => $donnees);
	return $tableau;
}
