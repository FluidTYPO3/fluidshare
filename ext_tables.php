<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('FluidTYPO3.Fluidshare', 'Display', 'LLL:EXT:fluidshare/Resources/Private/Language/locallang.xlf:plugin.display');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('FluidTYPO3.Fluidshare', 'Submit', 'LLL:EXT:fluidshare/Resources/Private/Language/locallang.xlf:plugin.submit');

\FluidTYPO3\Flux\Core::registerAutoFormForModelObjectClassName('FluidTYPO3\Fluidshare\Domain\Model\Gist');
\FluidTYPO3\Flux\Core::registerAutoFormForModelObjectClassName('FluidTYPO3\Fluidshare\Domain\Model\Tag');
\FluidTYPO3\Flux\Core::registerAutoFormForModelObjectClassName('FluidTYPO3\Fluidshare\Domain\Model\Extension');
