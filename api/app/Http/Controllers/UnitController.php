<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Http\Resources\UnitResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UnitController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return UnitResource::collection(Unit::all());
    }
    
    public function show(Request $request, Unit $unit)  : UnitResource
    {
        $unit = Unit::findOrFail($unit->id);
        return new UnitResource($unit);
    }
}
