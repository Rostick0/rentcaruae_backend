<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistinctValue\IndexDistinctValueRequest;
use App\Models\Brand;
use App\Models\Generation;
use App\Models\ModelCar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rostislav\LaravelFilters\Filter;

class DistinctValueController extends Controller
{
    public static function getBuilder($table)
    {
        $tables = [
            'brands' => new Brand,
            'model_cars' => new ModelCar,
            'generations' => new Generation,
        ];

        return $tables[$table] ?? DB::table($table);
    }

    public function index(IndexDistinctValueRequest $request)
    {
        return new JsonResponse(
            Filter::query($request, DistinctValueController::getBuilder($request->table))
                ->select($request->column)
                ->distinct($request->column)
                ->paginate($request->limit ?? 50)
        );
    }
}
