<?php
namespace FluidTYPO3\Fluidshare\Fetcher;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class GistDataFetcher
 *
 * @package FluidTYPO3\Fluidshare\Fetcher
 */
class GistDataFetcher implements FetcherInterface {

	/**
	 * @var array
	 */
	protected $storage = array();

	/**
	 * @param string $url
	 * @param string $format
	 * @return Response
	 */
	public function fetch($url, $format = 'json') {
		if ($format !== substr($url, 0 - strlen($format))) {
			$url .= '.' . $format;
		}
		if (TRUE === isset($this->storage[$url])) {
			return $this->storage[$url];
		}
		$response = new Response();
		$body = file_get_contents($url);
		$response->setBody($body);
		return $this->storage[$url] = $response;
	}

}
