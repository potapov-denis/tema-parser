<?php

declare(strict_types=1);

namespace App\Parser\Common\Entities\Offer;

use App\Parser\Common\Domain\AggregateRoot;
use DateTimeImmutable;


class Offer extends AggregateRoot
{
	public function __construct(
		public readonly ?int $id,
		public readonly int $internal_id,
		public readonly ?string $type,
		public readonly ?string $property_type,
		public readonly ?string $category,
		public readonly ?string $url,
		public readonly bool $payed_adv = false,
		public readonly bool $manually_added = true,
		public readonly DateTimeImmutable $creation_date,
		public readonly DateTimeImmutable $last_update_date,
		public readonly ?string $location_country,
		public readonly ?string $location_region,
		public readonly ?string $location_locality_name,
		public readonly ?string $location_address,
		public readonly ?float $location_latitude,
		public readonly ?float $location_longitude,
		public readonly ?string $sales_agent_name,
		public readonly ?int $sales_agent_agency_id,
		public readonly ?float $price_value,
		public readonly ?string $price_currency,
		public readonly ?string $price_period,
		public readonly ?string $images,
		public readonly ?string $renovation,
		public readonly ?string $description,
		public readonly ?float $area_value,
		public readonly ?string $area_unit,
		public readonly ?int $rooms,
		public readonly ?int $rooms_offered,
		public readonly ?string $internet,
		public readonly ?int $television,
		public readonly ?int $washing_machine,
		public readonly ?int $refrigerator,
		public readonly ?int $floor,
		public readonly ?int $floors_total,
		public readonly ?int $rent_pledge,
		public readonly ?string $param
	) {
	}


	public function toArray(): array
	{

		return [
		'id' => $this->id,
		'internal_id' => $this->internal_id,
		'type' => $this->type,
		'property_type' => $this->property_type,
		'category' => $this->category,
		'url' => $this->url,
		'payed_adv' => $this->payed_adv,
		'manually_added' => $this->manually_added,
		'creation_date' => $this->creation_date,
		'last_update_date' => $this->last_update_date,
		'location_country' => $this->location_country,
		'location_region' => $this->location_region,
		'location_locality_name' => $this->location_locality_name,
		'location_address' => $this->location_address,
		'location_latitude' => $this->location_latitude,
		'location_longitude' => $this->location_longitude,
		'sales_agent_name' => $this->sales_agent_name,
		'sales_agent_agency_id' => $this->sales_agent_name,
		'price_value' => $this->price_value,
		'price_currency' => $this->price_currency,
		'price_period' => $this->price_period,
		'images' => $this->images,
		'renovation' => $this->renovation,
		'description' => $this->description,
		'area_value' => $this->area_value,
		'area_unit' => $this->area_unit,
		'rooms' => $this->rooms,
		'rooms_offered' => $this->rooms_offered,
		'internet' => $this->internet,
		'television' => $this->television,
		'washing_machine' => $this->washing_machine,
		'refrigerator' => $this->refrigerator,
		'floor' => $this->floor,
		'floors_total' => $this->floors_total,
		'rent_pledge' => $this->rent_pledge,
		'param' => $this->param
		];
	}


}
