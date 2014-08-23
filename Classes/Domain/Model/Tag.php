<?php
namespace FluidTYPO3\Fluidshare\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain Model: Gist Tag record
 *
 * Flux TCA based model of Tags for Gist objects.
 *
 * @Flux\Icon icon(path: 'ext_icon.gif')
 * @Flux\Control\Hide
 * @Flux\Control\Delete
 * @package FluidTYPO3\Fluidshare\Domain\Model
 */
class Tag extends AbstractEntity {

	/**
	 * @Flux\Label
	 * @Flux\Form\Field input
	 * @Flux\Form\Sheet options
	 * @validate NotEmpty
	 * @validate Text
	 * @var string
	 */
	protected $name;

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

}
