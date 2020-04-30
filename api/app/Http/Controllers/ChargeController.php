<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Charge;
use App\Http\Resources\UnitResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ChargeStore;
use App\Http\Requests\ChargeUpdate;

class ChargeController extends Controller
{
    public function store(ChargeStore $request, Unit $unit) : JsonResponse
    {
        $charge = (new Charge())->create([
            'unit_id' => $unit->id,
            'start' => now()
        ]);

        $unit->update(['status' => 'charging']);

        return (new UnitResource($unit->fresh()))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(ChargeUpdate $request, Unit $unit, Charge $charge) : JsonResponse
    {
        $charge->update(['end' => now()]);
        $unit->update(['status' => 'available']);

        return (new UnitResource($unit))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}
