<?php
namespace FluidTYPO3\Fluidshare\Fetcher;

interface FetcherInterface {

	/**
	 * @param string $url
	 * @param string $format
	 * @return string|NULL
	 */
	public function fetch($url, $format = 'json');

}
