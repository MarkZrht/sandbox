<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Gallery',
	array(
		'Gallery' => 'list, detail',
		
	),
	// non-cacheable actions
	array(
		'Gallery' => '',
		
	)
);

?>