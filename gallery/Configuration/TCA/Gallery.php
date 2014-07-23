<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_gallery_domain_model_gallery'] = array(
	'ctrl' => $TCA['tx_gallery_domain_model_gallery']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'l10n_parent, l10n_diffsource, hidden, datetime, title, starttime, description, folder, album_cover',
	),
	'types' => array(
		//'1' => array('showitem' => 'l10n_parent, l10n_diffsource, hidden;;1, title, description, folder,album_cover,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access, starttime, endtime'),
		'1' => array('showitem' => 'l10n_parent, l10n_diffsource, hidden;;1, datetime, title, description, folder,album_cover'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_gallery_domain_model_gallery',
				'foreign_table_where' => 'AND tx_gallery_domain_model_gallery.pid=###CURRENT_PID### AND tx_gallery_domain_model_gallery.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 0,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'Titel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'Omschrijving',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'folder' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:gallery/Resources/Private/Language/locallang_db.xml:tx_gallery_domain_model_gallery.folder',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'folder',
				'size' => 5,
			),
		),
//		'album_cover' => array(
//			'exclude' => 0,
//			'label' => 'Album-omslag',
//			'config' => array(
//				'type' => 'group',
//				'internal_type' => 'file_reference',
//				'allowed' => 'gif,png,jpeg,jpg',
//				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
//				'uploadfolder' => 'fileadmin/userupload',
//				'show_thumbs'=> 1,
//				'size' => 1,
//				'minitems' => 0,
//				'maxitems' => 1,
//			)
//		),
		'datetime' => array(
			'exclude' => 0,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'Datum',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime,required',
				'default' => mktime(date('H'), date('i'), 0, date('m'), date('d'), date('Y'))
			)
		),
	),
);

?>