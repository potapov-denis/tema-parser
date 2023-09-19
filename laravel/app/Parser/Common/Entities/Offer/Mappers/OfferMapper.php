<?php

declare(strict_types=1);

namespace App\Parser\Common\Entities\Offer\Mappers;

use App\Models\OfferModel;
use App\Parser\Common\Entities\Offer\Offer;
use DateTimeImmutable;
use SimpleXMLElement;

class OfferMapper
{

	public static function fromXml(SimpleXMLElement $element):  Offer
	{
		return new Offer(
		id: null,
		internal_id: (int) $element->attributes()->{'internal-id'},
		type: (string) $element->{'type'},
		property_type: (string) $element->{'property-type'},
		category: (string) $element->{'category'},
		url: (string) $element->{'url'},
		payed_adv: (bool) $element->{'payed-adv'},
		manually_added: (bool) $element->{'manually_added'},
		creation_date:  DateTimeImmutable::createFromFormat('Y-m-d\TH:i:sP', (string) $element->{'creation-date'}),
		last_update_date: DateTimeImmutable::createFromFormat('Y-m-d\TH:i:sP', (string) $element->{'last-update-date'}),
		location_country: (string) $element->{'location'}->{'country'},
		location_region: (string) $element->{'location'}->{'region'},
		location_locality_name: (string) $element->{'location'}->{'locality-name'},
		location_address: (string) $element->{'location'}->{'address'},
		location_latitude: (float) $element->{'location'}->{'latitude'},
		location_longitude: (float) $element->{'location'}->{'longitude'},
		sales_agent_name: (string) $element->{'sales-agent'}->{'name'},
		sales_agent_agency_id: (int) $element->{'sales-agent'}->{'agency-id'},
		price_value: (float) $element->{'price'}->{'value'},
		price_currency: (string)$element->{'price'}->{'currency'},
		price_period: (string)$element->{'price'}->{'period'},
		images: (string) json_encode($element->{'images'}),
		renovation: (string) $element->{'renovation'},
		description: (string) $element->{'description'},
		area_value: (float) $element->{'area'}->{'value'},
		area_unit: (string) $element->{'area'}->{'unit'},
		rooms: (int) $element->{'rooms'},
		rooms_offered: (int) $element->{'rooms-offered'},
		internet: (string) $element->{'internet'},
		television: (int) $element->{'television'},
		washing_machine: (int) $element->{'washing-machine'},
		refrigerator: (int) $element->{'refrigerator'},
		floor: (int) $element->{'floor'},
		floors_total: (int) $element->{'floors-total'},
		rent_pledge: (int) $element->{'rent-pledge'},
		param: (string) $element->{'param'}
		);
	}

	public static function toEloquent(Offer $offer):  OfferModel
	{
		$offerEloquent = new OfferModel();
		if ($offer->id) {
			$offerEloquent = OfferModel::query()->findOrFail($offer->id);
		}
		$offerEloquent->internal_id = $offer->internal_id;
		$offerEloquent->type = $offer->type;
		$offerEloquent->property_type = $offer->property_type;
		$offerEloquent->category = $offer->category;
		$offerEloquent->url = $offer->url;
		$offerEloquent->payed_adv = $offer->payed_adv;
		$offerEloquent->manually_added = $offer->manually_added;
		$offerEloquent->creation_date = $offer->creation_date->format('Y-m-d H:i:s');
		$offerEloquent->last_update_date = $offer->last_update_date->format('Y-m-d H:i:s');
		$offerEloquent->location_country = $offer->location_country;
		$offerEloquent->location_region = $offer->location_region;
		$offerEloquent->location_locality_name = $offer->location_locality_name;
		$offerEloquent->location_address = $offer->location_address;
		$offerEloquent->location_latitude = $offer->location_latitude;
		$offerEloquent->location_longitude = $offer->location_longitude;
		$offerEloquent->sales_agent_name = $offer->sales_agent_name;
		$offerEloquent->sales_agent_agency_id = $offer->sales_agent_agency_id;
		$offerEloquent->price_value = $offer->price_value;
		$offerEloquent->price_currency = $offer->price_currency;
		$offerEloquent->price_period = $offer->price_period;
		$offerEloquent->images = $offer->images;
		$offerEloquent->renovation = $offer->renovation;
		$offerEloquent->description = $offer->description;
		$offerEloquent->area_value = $offer->area_value;
		$offerEloquent->area_unit = $offer->area_unit;
		$offerEloquent->rooms = $offer->rooms;
		$offerEloquent->rooms_offered = $offer->rooms_offered;
		$offerEloquent->internet = $offer->internet;
		$offerEloquent->television = $offer->television;
		$offerEloquent->washing_machine = $offer->washing_machine;
		$offerEloquent->refrigerator = $offer->refrigerator;
		$offerEloquent->floor = $offer->floor;
		$offerEloquent->floors_total = $offer->floors_total;
		$offerEloquent->rent_pledge = $offer->rent_pledge;
		$offerEloquent->param = $offer->param;

		return $offerEloquent;
	}
}