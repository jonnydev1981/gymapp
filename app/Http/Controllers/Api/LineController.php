<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Lines;
use Illuminate\Http\Request;

class LineController extends Controller
{
    protected $linesRepository;

    public function __construct()
    {
        $this->linesRepository = new Lines();
    }

    public function index()
    {
        $linesFetch =
            $this
                ->linesRepository
                ->all();

        if ($linesFetch->hasError()) {
            return response()->json($linesFetch->getItems(), 500);
        }

        return response()->json($linesFetch->getItems(), 200);
    }

    public function store(Request $request)
    {
        $linesStore =
            $this
                ->linesRepository
                ->store($request->all());

        if ($linesStore->hasError()) {
            return response()->json($linesStore->getItems(), 500);
        }

        return response()->json($linesStore->getItems(), 201);
    }

    public function show($id)
    {
        $lineFetch =
            $this
                ->linesRepository
                ->show($id);

        if ($lineFetch->hasError()) {
            return response()->json($lineFetch->getItems(), 500);
        }

        return response()->json($lineFetch->getItems(), 200);
    }

    public function update($id, Request $request)
    {
        $lineUpdate =
            $this
                ->linesRepository
                ->update($id, $request->all());

        if ($lineUpdate->hasError()) {
            return response()->json($lineUpdate->getItems(), 500);
        }

        return response()->json($lineUpdate->getItems(), 200);
    }

    public function delete($id)
    {
        $lineDelete =
            $this
                ->linesRepository
                ->delete($id);

        if ($lineDelete->hasError()) {
            return response()->json($lineDelete->getItems(), 500);
        }

        return response()->json($lineDelete->getItems(), 200);
    }
}
