<?php

namespace App\Http\Controllers;

use App\Models\OfferModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	public function index(Request $request)
	{
		$filters = [
			'internal_id' => 'ID',
			'type' => 'Тип сдачи',
			'location_country' => 'Страна',
			'location_region' => 'Регион',
			'location_locality_name' => 'Город',
			'location_address' => 'Адрес',
			'description' => 'Описание',



		];

		if ($request->search_type  && $request->search_type !== '---') {
			$offers=OfferModel::where($request->search_type, 'like', '%'.$request->search.'%')->paginate(25);
		}
		else {
			$offers=OfferModel::paginate(25);
		}
		return view('dashboard', ['offers' => $offers, 'filters' => $filters]);

	}
}
