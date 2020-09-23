<?php
namespace FluidTYPO3\Fluidshare\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Extension extends AbstractEntity {

	/**
	 * @validate NotEmpty
	 * @validate Text
	 * @var string
	 */
	protected $extensionKey;

	/**
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
	public function getExtensionKey() {
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
