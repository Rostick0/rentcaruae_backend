<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Rostislav\LaravelFilters\Filter;

class GenerationController extends ApiController
{
    // protected static function getWhere(Request $request = null)
    // {
    //     // $where = [];

    //     // if (auth()->user()?->role !== 'admin') {
    //     //     $where[] = ['is_show', '=', '1'];
    //     // }

    //     // return $where;
    // }

    public function __construct()
    {
        $this->model = new Generation;
    }

    public function index(Request $request)
    {
        $data = Filter::query($request, $this->model, $this->fillable_block, $this::getWhere($request), $this->q_request);

        if ($request->year) {
            $data->where('year_from', '<=', $request->year)
                ->where('year_to', '>=', $request->year);

            $data->union(
                Filter::query($request, $this->model, $this->fillable_block, $this::getWhere($request), $this->q_request)->where('year_from', '<=', Carbon::now()->format('Y'))
                    ->whereNull('year_to')
            );

            $data->union(
                Filter::query($request, $this->model, $this->fillable_block, $this::getWhere($request), $this->q_request)->whereNull('year_from')
                    ->whereNull('year_to')
            );
        }

        return new JsonResponse(
            $data->paginate($request->limit ?? 20)
        );
    }
}
