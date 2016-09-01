<?php

/**
 * Administrations pour Yellowlab
 *
 * @plugin     Yellowlab
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\Yellowlab\administrations
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Installation/maj des tables yellowlab
 *
 * @param string $nom_meta_base_version
 * @param string $version_cible
 */
function yellowlab_upgrade($nom_meta_base_version, $version_cible) {
	
	$maj = array();

	$maj['create'] = array(
		// Ajout de champs dans spip_syndic
		array('maj_tables', array('spip_syndic'))
	);

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}

/**
 * Desinstallation/suppression des tables yellowlab
 *
 * @param string $nom_meta_base_version
 */
function yellowlab_vider_tables($nom_meta_base_version) {

	sql_alter('TABLE spip_syndic DROP COLUMN score_yellowlab');
	sql_alter('TABLE spip_syndic DROP COLUMN date_yellowlab');
	effacer_meta('yellowlab');
	effacer_meta($nom_meta_base_version);
}
