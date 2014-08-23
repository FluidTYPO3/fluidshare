<?php
namespace FluidTYPO3\Fluidshare\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain Model: Extension
 *
 * Flux TCA based model of Extensions selectable as Gist facet
 *
 * @Flux\Icon icon(path: 'ext_icon.gif')
 * @Flux\Control\Hide
 * @Flux\Control\Delete
 * @package FluidTYPO3\Fluidshare\Domain\Model
 */
class Extension extends AbstractEntity {

	/**
	 * @Flux\Label
	 * @Flux\Form\Field input
	 * @Flux\Form\Sheet options
	 * @validate NotEmpty
	 * @validate Text
	 * @var string
	 */
	protected $extensionKey;

	/**
	 * @Flux\Form\Field input
	 * @Flux\Form\Sheet options
	 * @validate NotEmpty
	 * @validate Text
	 * @var string
	 */
	protected $extensionName;

	/**
	 * @param string $key
	 * @return void
	 */
	public function setExtensionKey($key) {
		$this->extensionKey = $key;
	}

	/**
	 * @return string
	 */
	public function getKey() {
		return $this->extensionKey;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setExtensionName($name) {
		$this->extensionName = $name;
	}

	/**
	 * @return string
	 */
	public function getExtensionName() {
		return $this->extensionName;
	}

}
