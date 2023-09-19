<?php

namespace App\Http\Controllers;

use App\Parser\Common\Entities\Offer\Mappers\OfferMapper;
use App\Models\OfferModel;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Parser\Loaders\Enums\LoaderTypes;
use App\Parser\Loaders\Loader;

class ExportController extends BaseController
{
	public function exportCSV(Request $request)
	{

		$fileName = 'offers.csv';


		if ($request->export_search && $request->export_search_type) {
			$offers = OfferModel::where($request->export_search_type, 'like', '%'.$request->export_search.'%')->get();
		}
		else {
			$offers = OfferModel::find(1)->get();
		}

		$headers = [
			'Content-type'        => 'text/csv',
			'Content-Disposition' => "attachment; filename=$fileName",
			'Pragma'              => 'no-cache',
			'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
			'Expires'             => '0'
		];

		$columns = [
			'ID',
			'Тип сдачи',
			'Описание',
			'Площадь единицы',
			'Площадь'
		];

		$callback = function () use ($offers, $columns) {
			$file = fopen('php://output', 'w');
			fputcsv($file, $columns);

			foreach ($offers as $offer) {

				/*
				 *  	$offer->internal_id;
						$offer->type;
						$offer->property_type;
						$offer->category;
						$offer->url;
						$offer->payed_adv;
						$offer->manually_added;
						$offer->creation_date->format('Y-m-d H:i:s');
						$offer->last_update_date->format('Y-m-d H:i:s');
						$offer->location_country;
						$offer->location_region;
						$offer->location_locality_name;
						$offer->location_address;
						$offer->location_latitude;
						$offer->location_longitude;
						$offer->sales_agent_name;
						$offer->sales_agent_agency_id;
						$offer->price_value;
						$offer->price_currency;
						$offer->price_period;
						$offer->images;
						$offer->renovation;
						$offer->description;
						$offer->area_value;
						$offer->area_unit;
						$offer->rooms;
						$offer->rooms_offered;
						$offer->internet;
						$offer->television;
						$offer->washing_machine;
						$offer->refrigerator;
						$offer->floor;
						$offer->floors_total;
						$offer->rent_pledge;
						$offer->param;

				 */

				$row['0'] = $offer->internal_id;
				$row['1'] = $offer->type;
				$row['2'] = $offer->description;
				$row['3'] = $offer->area_unit;
				$row['4'] = $offer->area_value;

				fputcsv($file, [
					$row['0'],
					$row['1'],
					$row['2'],
					$row['3'],
					$row['4']
				]);
			}

			fclose($file);
		};





		return response()->stream($callback, 200, $headers);

	}
}
