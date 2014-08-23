<?php
namespace FluidTYPO3\Fluidshare\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Domain Model: Gist record
 *
 * Flux TCA based model of Gist objects.
 *
 * @Flux\Icon icon(path: 'ext_icon.gif')
 * @Flux\Control\Hide
 * @Flux\Control\Delete
 * @package FluidTYPO3\Fluidshare\Domain\Model
 */
class Gist extends AbstractEntity {

	/**
	 * @Flux\Label
	 * @Flux\Form\Field input(size: 100)
	 * @Flux\Form\Sheet options
	 * @validate NotEmpty
	 * @validate Text
	 * @var string
	 */
	protected $title;

	/**
	 * @Flux\Form\Field input(size: 100)
	 * @Flux\Form\Sheet options
	 * @validate NotEmpty
	 * @validate RegularExpression(regularExpression="/^https\:\/\/gist\.github\.com\//")
	 * @var string
	 */
	protected $url;

	/**
	 * @Flux\Form\Field text
	 * @Flux\Form\Sheet options
	 * @validate NotEmpty
	 * @validate Text
	 * @var string
	 */
	protected $summary;

	/**
	 * @Flux\Form\Field checkbox
	 * @Flux\Form\Sheet options
	 * @var boolean
	 */
	protected $confirmed = FALSE;

	/**
	 * @Flux\Form\Field relation(size: 5, maxItems: 99, manyToMany: 'tx_fluidshare_gist_tag_mm', table: 'tx_fluidshare_domain_model_tag')
	 * @Flux\Form\Sheet options
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FluidTYPO3\Fluidshare\Domain\Model\Tag>
	 */
	protected $tags;

	/**
	 * @Flux\Form\Field relation(size: 5, maxItems: 99, manyToMany: 'tx_fluidshare_gist_extension_mm', table: 'tx_fluidshare_domain_model_extension')
	 * @Flux\Form\Sheet options
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FluidTYPO3\Fluidshare\Domain\Model\Extension>
	 */
	protected $extensions;

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

	/**
	 * @param string $summary
	 * @return void
	 */
	public function setSummary($summary) {
		$this->summary = $summary;
	}

	/**
	 * @return string
	 */
	public function getSummary() {
		return $this->summary;
	}

	/**
	 * @param boolean $confirmed
	 * @return void
	 */
	public function setConfirmed($confirmed) {
		$this->confirmed = $confirmed;
	}

	/**
	 * @return boolean
	 */
	public function isConfirmed() {
		return $this->confirmed;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FluidTYPO3\Fluidshare\Domain\Model\Tag> $tags
	 * @return void
	 */
	public function setTags($tags) {
		$this->tags = $tags;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FluidTYPO3\Fluidshare\Domain\Model\Tag>
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FluidTYPO3\Fluidshare\Domain\Model\Extension> $extensions
	 * @return void
	 */
	public function setExtensions($extensions) {
		$this->extensions = $extensions;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FluidTYPO3\Fluidshare\Domain\Model\Extension>
	 */
	public function getExtensions() {
		return $this->extensions;
	}

}
