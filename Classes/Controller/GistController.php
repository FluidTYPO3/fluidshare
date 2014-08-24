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
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

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
	 * @param integer $tag
	 * @param integer $extension
	 * @return void
	 */
	public function listAction($tag = NULL, $extension = NULL) {
		$query = $this->gistRepository->createQuery();
		$constraints = array(
			$query->equals('confirmed', TRUE)
		);
		if (NULL !== $tag) {
			$constraints[] = $query->contains('tags', $tag);
		}
		if (NULL !== $extension) {
			$constraints[] = $query->contains('extensions', $extension);
		}
		if (1 === count($constraints)) {
			$query->matching($constraints[0]);
		} elseif (0 < count($constraints)) {
			$query->matching($query->logicalAnd($constraints));
		}
		$gists = $query->execute();
		$this->view->assign('gists', $gists);
		$this->view->assign('tags', $this->tagRepository->findAll());
		$this->view->assign('extensions', $this->extensionRepository->findAll());
		// emulated previous request parameters for preselection in form
		$this->view->assign('submission', array(
			'tags' => array($tag),
			'extensions' => array($extension)
		));
	}

	/**
	 * @param Gist $gist
	 * @return void
	 */
	public function displayAction(Gist $gist) {
		$response = $this->fetchGistDataAndLoadStylesheet($gist);
		$this->view->assign('gist', $gist);
		$this->view->assign('response', $response);
		$this->view->assign('tags', $this->tagRepository->findAll());
		$this->view->assign('extensions', $this->extensionRepository->findAll());
	}

	/**
	 * @param Gist $gist
	 * @return void
	 */
	public function newAction(Gist $gist = NULL) {
		$this->view->assign('gist', $gist);
		$this->view->assign('tags', $this->tagRepository->findAll());
		$this->view->assign('extensions', $this->extensionRepository->findAll());
		if (NULL !== $this->request->getOriginalRequest()) {
			$this->view->assign('submission', $this->request->getOriginalRequest()->getArgument('gist'));
		}
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
		$this->addFlashMessage(LocalizationUtility::translate('messages.created', 'fluidshare'));
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

	/**
	 * @return null
	 */
	protected function getErrorFlashMessage() {
		return FALSE;
	}

}
