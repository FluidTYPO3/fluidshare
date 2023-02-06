<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('Fluidshare', 'Display',
	[\FluidTYPO3\Fluidshare\Controller\GistController::class => 'list,display'],
	[\FluidTYPO3\Fluidshare\Controller\GistController::class => 'list']
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('Fluidshare', 'Submit',
	[\FluidTYPO3\Fluidshare\Controller\GistController::class => 'new,confirm,create'],
	[\FluidTYPO3\Fluidshare\Controller\GistController::class => 'confirm,create']
);
