<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Rostislav\LaravelFilters\Filters\QueryString;

class CarController extends ApiController
{
    protected static function extendsMutation($data, $request)
    {
        $data->update([
            'title' => $data->generation->model_car->brand->name . ' ' . $data->generation->model_car->name,
        ]);

        if ($request->has('images')) {
            $data->images()->delete();

            $images = array_map(function ($image_id) {
                return ['image_id' => $image_id];
            }, QueryString::convertToArray($request->images));

            $data->images()->createMany($images);
        }

        if ($request->has('car_options')) {
            $data->car_options()->delete();

            $car_options = array_map(function ($option_id) {
                return ['option_id' => $option_id];
            }, QueryString::convertToArray($request->car_options));

            $data->car_options()->createMany($car_options);
        }

        if ($request->has('security_deposit')) {
            $data->security_deposit()->firstOrCreate([
                'type' => 'security_deposit',
            ], [
                'price' => $request->security_deposit
            ]);
        }

        if ($request->has('free_per_day_security')) {
            $data->free_per_day_security()->firstOrCreate([
                'type' => 'free_per_day_security',
            ], [
                'price' => $request->free_per_day_security,
                'is_show' => true,
            ]);
        } else if ($request->has('is_free_deposite')) {
            $data->free_per_day_security()->firstOrCreate([
                'type' => 'free_per_day_security',
            ], [
                'is_show' => false,
            ]);
        }

        if ($request->has('price_sum')) {
            foreach ([1, 7, 30] as $index => $item) {
                $data->price()->firstOrCreate([
                    'type' => 'price',
                    'period' => $item,
                ], [
                    'price' => $request->price_sum[$index],
                    'mileage' => $request->price_mileage[$index],
                    'is_show' => $request->price_is_show[$index],
                ]);
            }
        }

        if ($request->has('price_leasing')) {
            foreach ([30, 90, 180, 270, 360] as $index => $item) {
                $data->price_leasing()->firstOrCreate([
                    'type' => 'price_leasing',
                    'period' => $item,
                ], [
                    'price' => $request->price_leasing[$index],
                    'mileage' => $request->mileage_leasing[$index],
                ]);
            }
        }

        if ($request->has('price_special')) {
            foreach ([1, 7, 30] as $index => $item) {
                $data->price_special()->firstOrCreate([
                    'type' => 'price_special',
                    'period' => $item,
                ], [
                    'price' => $request->price_special[$index],
                ]);
            }
        }
    }

    public function __construct()
    {
        $this->model = new Car;
        $this->store_request = new StoreCarRequest;
        $this->update_request = new UpdateCarRequest;
        $this->is_auth_id = true;
    }
}
