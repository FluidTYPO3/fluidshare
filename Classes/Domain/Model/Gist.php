<?php
namespace FluidTYPO3\Fluidshare\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain Model: Gist record
 *
 * Flux TCA based model of Gist objects.
 *
 * @Flux\Control\Hide
 * @Flux\Control\Delete
 * @package FluidTYPO3\Fluidshare\Domain\Model
 */
class Gist extends AbstractEntity {

	/**
	 * @Flux\Label
	 * @Flux\Form\Sheet options
	 * @Flux\Form\Field input(size: 60)
	 * @var string
	 */
	protected $title;

	/**
	 * @Flux\Form\Field input(size: 100)
	 * @Flux\Form\Sheet options
	 * @var string
	 */
	protected $url;

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

}
