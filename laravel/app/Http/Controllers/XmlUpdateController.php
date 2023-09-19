<?php

namespace App\Http\Controllers;

use App\Parser\Common\Entities\Offer\Mappers\OfferMapper;
use App\Models\OfferModel;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller as BaseController;
use App\Parser\Loaders\Enums\LoaderTypes;
use App\Parser\Loaders\Loader;

class XmlUpdateController extends BaseController
{
	public function updateXML()
	{
		try {
			set_time_limit(0);
			OfferModel::truncate();
			$client = new Client();
			$loader = Loader::create(LoaderTypes::XML, $client)
				->setPath('https://static.sutochno.ru/doc/files/xml/yrl_searchapp.xml')
				->setStorageFile('./storage.xml');

			$loader->get();
			$resource = $loader->parse();

			foreach ($resource as $element) {
				if ($element->attributes()->{'internal-id'}) {
					$offer = OfferMapper::fromXml($element);
					$offerModel = OfferMapper::toEloquent($offer);
					$offerModel->save();

				}
			}


		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
}
