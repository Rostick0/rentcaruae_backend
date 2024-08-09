<?php

namespace App\Http\Controllers;

use App\Http\Requests\Operation\StoreCarRequest;
use App\Models\Car;
use App\Models\Operation;
use App\Utils\PeriodPrice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Rostislav\LaravelFilters\Filter;

class OperationController extends ApiController
{
    protected static function getWhere(Request $request = null)
    {
        $where = [];

        if (auth()->user()?->role !== 'admin') {
            // $where[] = ['user_id', '=', auth()?->id(), 'car'];
        }

        return $where;
    }

    public function __construct()
    {
        $this->model = new Operation;
        $this->store_request = new StoreCarRequest;
    }

    public function store(Request $request)
    {
        // данные для создания записи
        $create_data = [...$request->validate(
            ($this->store_request)->rules()
        )];

        $create_data[$this->string_user_id] = auth()->id();

        $create_data['price'] = PeriodPrice::get(Car::find($request->car_id), $request->period, $request->without_deposite);
        $data = $this->model::create($create_data);

        // $this::extendsMutation($data, $request);

        return new JsonResponse([
            'data' => Filter::one($request, $this->model, $data->id, [])
        ], 201);
    }
}
