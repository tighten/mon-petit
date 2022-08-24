<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Setting extends Resource
{
    public static $model = \App\Models\Setting::class;

    public static $title = 'key';

    public static $search = [
        'id',
        'key',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Key')->sortable()
                ->required()
                ->rules('required', 'string', 'max:50'),
            KeyValue::make('Value')->keyLabel('Pascal Case')
                ->valueLabel('Snake Case')
                ->actionText('Add Item')
                ->required()
                ->rules('required', 'json'),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
