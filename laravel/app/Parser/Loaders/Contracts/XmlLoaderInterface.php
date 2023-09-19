<?php

namespace App\Parser\Loaders\Contracts;

use SimpleXMLElement;

interface XmlLoaderInterface extends LoaderInterface
{
	public function getPath();
	public function setPath(string $path): self;
	public function getStorageFile();
	public function setStorageFile(string $storage): self;
	/**
	 * @return SimpleXMLElement[]
	 */
	public function parse(): SimpleXMLElement|false;
}