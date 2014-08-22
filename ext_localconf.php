<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('FluidTYPO3.Fluidshare', 'Display',
	array('Gist' => 'list,show'),
	array()
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('FluidTYPO3.Fluidshare', 'Submit',
	array('Gist' => 'new,create'),
	array('Gist' => 'create')
);
