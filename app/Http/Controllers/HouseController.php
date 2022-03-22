<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\HouseCollection;
use App\Http\Resources\HouseResource;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index(SearchRequest $request)
    {
        $res = House::query()
            ->when($request->input('name'), fn ($q) => $q->where('name', 'like', $request->input('name').'%'))
            ->when($request->input('price_start'), fn ($q) => $q->where('price', '>=', $request->input('price_start')))
            ->when($request->input('price_end'), fn ($q) => $q->where('price', '<=', $request->input('price_end')))
            ->when($request->input('bedrooms'), fn ($q) => $q->where('bedrooms', $request->input('bedrooms')))
            ->when($request->input('bathrooms'), fn ($q) => $q->where('bathrooms', $request->input('bathrooms')))
            ->when($request->input('storeys'), fn ($q) => $q->where('storeys', $request->input('storeys')))
            ->when($request->input('garages'), fn ($q) => $q->where('garages', $request->input('garages')))
            ->get();
        return new HouseCollection($res);
    }
}
