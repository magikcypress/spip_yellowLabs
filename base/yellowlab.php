<?php
/**
 * Base pour YellowLab
 *
 * @plugin     YellowLab
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\Yellowlab\base
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

function yellowlab_declarer_tables_objets_sql($tables) {
	// On ajoute un champ score_yellowlab et date_yellowlab dans spip_syndic
	$tables['spip_syndic']['field']['score_yellowlab'] = 'varchar(255) NOT NULL';
	$tables['spip_syndic']['field']['date_yellowlab'] = 'datetime NOT NULL';

	return $tables;
}
