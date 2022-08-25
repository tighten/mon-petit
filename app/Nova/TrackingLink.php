<?php

namespace App\Nova;

use App\Models\Setting;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class TrackingLink extends Resource
{
    public static $model = \App\Models\TrackingLink::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'campaign',
        'source',
        'medium',
        'content',
        'term',
    ];

    public function fields(NovaRequest $request)
    {
        $settings = Setting::whereIn('key', ['campaigns', 'sources', 'mediums'])->pluck('value', 'key');

        return [
            ID::make()->sortable(),
            Text::make('Base URL', 'base_url')
                ->rules('required', 'url'),
            Select::make('Campaign')
                ->options($settings['campaigns'])
                ->rules('required', 'string')
                ->sortable()
                ->filterable(),
            Select::make('Source')
                ->options($settings['sources'])
                ->rules('required', 'string')
                ->sortable()
                ->filterable(),
            Select::make('Medium')
                ->options($settings['mediums'])
                ->rules('required', 'string')
                ->sortable()
                ->filterable(),
            Text::make('Content')
                ->rules('nullable', 'string')
                ->sortable()
                ->help('Input will be snake cased when added to the URL.'),
            Text::make('Term')
                ->rules('nullable', 'string')
                ->sortable()
                ->help('Input will be snake cased when added to the URL.'),
            Text::make('UTM URL', 'utm_url')
                ->exceptOnForms(),
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
