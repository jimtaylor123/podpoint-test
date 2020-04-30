<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Http\Resources\UnitResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UnitController extends Controller
{
    /**
     * Get all units
     *
     * @return AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        return UnitResource::collection(Unit::all());
    }
    
    /**
     * Get a particular unit
     *
     * @param Request $request
     * @param Unit $unit
     * @return UnitResource
     */
    public function show(Request $request, Unit $unit)  : UnitResource
    {
        $unit = Unit::findOrFail($unit->id);
        return new UnitResource($unit);
    }
}
