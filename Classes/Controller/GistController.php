<?php
namespace FluidTYPO3\Fluidshare\Controller;

use FluidTYPO3\Fluidshare\Domain\Model\Gist;
use FluidTYPO3\Fluidshare\Domain\Repository\ExtensionRepository;
use FluidTYPO3\Fluidshare\Domain\Repository\GistRepository;
use FluidTYPO3\Fluidshare\Domain\Repository\TagRepository;
use FluidTYPO3\Fluidshare\Fetcher\GistDataFetcher;
use FluidTYPO3\Fluidshare\Fetcher\Response;
use FluidTYPO3\Vhs\Asset;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * Class GistController
 *
 * @package FluidTYPO3\Fluidshare\Controller
 */
class GistController extends ActionController {

	/**
	 * @var GistRepository
	 */
	protected $gistRepository;

	/**
	 * @var TagRepository
	 */
	protected $tagRepository;

	/**
	 * @var ExtensionRepository
	 */
	protected $extensionRepository;

	/**
	 * @param GistRepository $gistRepository
	 * @return void
	 */
	public function injectGistRepository(GistRepository $gistRepository) {
		$this->gistRepository = $gistRepository;
	}

	/**
	 * @param TagRepository $tagRepository
	 * @return void
	 */
	public function injectTagRepository(TagRepository $tagRepository) {
		$this->tagRepository = $tagRepository;
	}

	/**
	 * @param ExtensionRepository $extensionRepository
	 * @return void
	 */
	public function injectExtensionRepository(ExtensionRepository $extensionRepository) {
		$this->extensionRepository = $extensionRepository;
	}

	/**
	 * @return void
	 */
	public function listAction() {
		$gists = $this->gistRepository->findAll();
		$this->view->assign('gists', $gists);
	}

	/**
	 * @param Gist $gist
	 * @return void
	 */
	public function displayAction(Gist $gist) {
		$response = $this->fetchGistDataAndLoadStylesheet($gist);
		$this->view->assign('gist', $gist);
		$this->view->assign('response', $response);
	}

	/**
	 * @param Gist $gist
	 * @return void
	 */
	public function newAction(Gist $gist = NULL) {
		if (NULL === $gist) {
			$gist = $this->objectManager->get('FluidTYPO3\Fluidshare\Domain\Model\Gist');
		}
		$this->view->assign('gist', $gist);
		$this->view->assign('tags', $this->tagRepository->findAll());
		$this->view->assign('extensions', $this->extensionRepository->findAll());
	}

	/**
	 * @param Gist $gist
	 * @return void
	 */
	public function confirmAction(Gist $gist) {
		$response = $this->fetchGistDataAndLoadStylesheet($gist);
		$this->view->assign('gist', $gist);
		$this->view->assign('response', $response);
	}

	/**
	 * @param Gist $gist
	 * @return void
	 */
	public function createAction(Gist $gist) {
		$this->gistRepository->add($gist);
		$this->redirect('list');
	}

	/**
	 * @param Gist $gist
	 * @return Response
	 */
	protected function fetchGistDataAndLoadStylesheet(Gist $gist) {
		$fetcher = new GistDataFetcher();
		$response = $fetcher->fetch($gist->getUrl());
		$stylesheet = ObjectAccess::getPropertyPath($response, 'json.stylesheet');
		Asset::createFromUrl($stylesheet);
		return $response;
	}

}
