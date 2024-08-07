<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\CompanySchedule;
use App\Utils\AccessUtil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Rostislav\LaravelFilters\Filter;

class CompanyController extends ApiController
{
    public function __construct()
    {
        $this->model = new Company;
        $this->update_request = new UpdateCompanyRequest;
    }

    public function update(Request $request, int $id)
    {
        if ($this->update_request && !($this->update_request)->authorize()) return AccessUtil::errorMessage();

        $validate_rules = $request->validate(($this->update_request)->rules($request->all()));
        $data = $this->model::findOrFail($id);

        if (AccessUtil::cannot('update', $data)) return AccessUtil::errorMessage();

        if (isset($validate_rules['company'])) $data->update($validate_rules['company']);
        if (isset($validate_rules['user'])) $data?->owner()->update($validate_rules['user']);

        if (isset($validate_rules['company_schedules'])) {
            $validate_company_schedules = array_map(
                fn ($start, $end, $is_show) => [
                    'start' => $start,
                    'end' => $end,
                    'is_show' => $is_show,
                ],
                $validate_rules['company_schedules']['start'],
                $validate_rules['company_schedules']['end'],
                $validate_rules['company_schedules']['is_show'],
            );

            foreach ($data->company_schedules as $index => $item) {
                $item->update($validate_company_schedules[$index]);
            }
        }

        return new JsonResponse([
            'data' => Filter::one($request, $this->model, $id, [])
        ]);
    }
}
