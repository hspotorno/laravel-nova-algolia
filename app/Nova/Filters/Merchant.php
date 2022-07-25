<?php

namespace App\Nova\Filters;

use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Models\Merchant as MerchantModel;

class Merchant extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';


    /**
     * Set the default options for the filter.
     *
     * @return array
     */
    public function default()
    {
        return [MerchantModel::select('id')->first()->id];
    }

    /**
     * Apply the filter to the given query.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query->where('products.merchant_id', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function options(NovaRequest $request)
    {
        $merchants = MerchantModel::select(['id', 'name'])->get();
        $ret = collect([]);
        $merchants->each(function ($merchant) use ($ret) {
            $ret[$merchant->name] = $merchant->id;
        });
        return $ret;
    }
}
