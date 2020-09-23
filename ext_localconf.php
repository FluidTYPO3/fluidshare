<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('FluidTYPO3.Fluidshare', 'Display',
	array('Gist' => 'list,display'),
	array('Gist' => 'list')
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('FluidTYPO3.Fluidshare', 'Submit',
	array('Gist' => 'new,confirm,create'),
	array('Gist' => 'confirm,create')
);
