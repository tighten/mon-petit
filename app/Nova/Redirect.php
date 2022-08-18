<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class Redirect extends Resource
{
    public static $model = \App\Models\Redirect::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'slug',
        'url',
    ];

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Slug')->sortable()
                ->default(function () {
                    $unique = uniqid();
                    return substr($unique, (strlen($unique) - 6), 5);
                })
                ->rules('required', 'max:5', 'string')
                ->creationRules('unique:redirects,slug')
                ->updateRules('unique:redirects,slug,{{resourceId}}'),
            Number::make('Visits')->sortable()
                ->exceptOnForms(),
            URL::make('URL', 'url')->sortable()
                ->rules('required', 'url'),
        ];
    }

    public function cards(NovaRequest $request): array
    {
        return [];
    }

    public function filters(NovaRequest $request): array
    {
        return [];
    }

    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
