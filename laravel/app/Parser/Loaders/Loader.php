<?php

declare (strict_types=1);


namespace App\Parser\Loaders;

use App\Parser\Loaders\Contracts\XmlLoaderInterface;
use App\Parser\Loaders\Enums\LoaderTypes;
use Psr\Http\Client\ClientInterface;

class Loader
{

	public static function create(LoaderTypes $type, ClientInterface $client): XmlLoaderInterface
	{
		return match ($type) {
			LoaderTypes::XML => new XmlLoader($client),
			default => new XmlLoader($client)
		};
	}
}