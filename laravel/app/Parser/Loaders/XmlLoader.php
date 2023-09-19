<?php

declare (strict_types=1);


namespace App\Parser\Loaders;

use Exception;
use GuzzleHttp\Psr7\Request;
use App\Parser\Loaders\Contracts\XmlLoaderInterface;
use App\Parser\Loaders\Exceptions\GetRemoteFileException;
use App\Parser\Loaders\Exceptions\XmlParseException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use SimpleXMLElement;

class XmlLoader implements XmlLoaderInterface
{

	private string $path = 'https://static.sutochn123o.ru/doc/files/xml/yrl_searchapp.xml';
	private string $storageFile = './storage.xml';
	private ClientInterface $client;

	public function __construct(ClientInterface $client)
	{
		$this->client = $client;
	}

	public function setPath($path): self
	{
		$this->path = $path;
		return $this;
	}

	public function getPath(): string
	{
		return $this->path;
	}

	public function setStorageFile($storageFile): self
	{
		$this->storageFile = $storageFile;
		return $this;
	}

	public function getStorageFile(): string
	{
		return $this->storageFile;
	}

	public function get()
	{
		try {
			$request = new Request('GET', $this->path);
			file_put_contents($this->storageFile, $this->client->sendRequest($request)->getBody()->getContents());

		} catch (ClientExceptionInterface $e) {
			throw new GetRemoteFileException($e->getMessage());
		}

	}

	public function parse(): SimpleXMLElement|false {

		try {
			$xml = simplexml_load_file($this->storageFile);
		}
		catch (Exception) {
			throw new XmlParseException($e->getMessage());
		}

		return $xml;
	}
}