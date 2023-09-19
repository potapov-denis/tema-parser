<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class='py-12'>
        <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
            <div class='bg-white overflow-hidden shadow-sm sm:rounded-lg'>
                <div class='overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200'>
                    <div class='min-w-full align-middle'>
                        <form method='get' action="{{ route('dashboard') }}" class='mt-6 space-y-6'>
                            @csrf
                            <div>
                                <x-input-label for='' :value="__('Поиск')"/>
                                <select class='form-control' name='search_type'>
                                    @foreach ($filters as $key => $value)
                                    <option value="{{ $key }}"
                                        @if ($key == request()->get('search_type'))
                                        selected='selected'
                                        @endif
                                    >{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-text-input id='password_confirmation' name='search' type='text' class='mt-1 block w-full' value="{{request()->get('search')}}"/>
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class='mt-2'/>
                            </div>

                            <div class='flex items-center gap-4'>
                                <x-primary-button>{{ __('Поиск') }}</x-primary-button>
                            </div>
                        </form>

                        <form method='get' action="{{ route('export_csv', ['search_type' => request()->get('search_type'), 'search' => request()->get('search_type')]) }}"
                              class='mt-6
                        space-y-6'>
                            @csrf

                            <x-text-input type='hidden' name='export_search_type' value="{{request()->get('search_type')}}"/>
                            <x-text-input type='hidden' name='export_search' value="{{request()->get('search')}}"/>
                                <x-primary-button>{{ __('Экспорт') }}</x-primary-button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class='py-12'>
        <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
            <div class='bg-white overflow-hidden shadow-sm sm:rounded-lg'>
                <div class='overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200'>
                    <div class='min-w-full align-middle'>
                        <table class='min-w-full divide-y divide-gray-200 border'>
                            <thead>
                            <tr>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>ID</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Тип</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Площадь</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Цена</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Адрес</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Этажность</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Этаж</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Всего комнат</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Сдается комнат</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Интернет</span>
                                </th>
                                <th class='px-6 py-3 bg-gray-50 text-left'>
                                    <span class='text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'>Холодильник</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class='bg-white divide-y divide-gray-200 divide-solid'>
                            @foreach($offers as $offer)
                            <tr class='bg-white'>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    <a target="_blank" href="{{$offer->url}}">{{ $offer->internal_id }}</a>
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->type }}
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->property_type }} {{ $offer->area_value }} {{ $offer->area_unit }}
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->price_value }} {{ $offer->price_currency }} / {{ $offer->price_period }}
                                </td>
                                <td class='px-2 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->location_country }}, {{ $offer->location_region }}, {{ $offer->location_locality_name }}, {{ $offer->location_locality_name }}, {{
                                    $offer->location_address }}
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->floors_total }}
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->floor }}
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->rooms }}
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->rooms_offered }}
                                </td>

                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->internet }}
                                </td>
                                <td class='px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900'>
                                    {{ $offer->refrigerator }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class='mt-2'>
                        {{ $offers->appends(request()->input())->links(); }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
