<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TrackingLink extends Model
{
    use HasFactory;

    protected $appends = ['utm_url'];

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Str::of($value)->slug('_'),
        );
    }

    protected function term(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Str::of($value)->slug('_'),
        );
    }

    protected function utmUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                $params = [];

                $params['utm_campaign'] = $this->campaign;
                $params['utm_source'] = $this->source;

                if($this->medium) {
                    $params['utm_medium'] = $this->medium;
                }
                if($this->content) {
                    $params['utm_content'] = $this->content;
                }
                if($this->term) {
                    $params['utm_term'] = $this->term;
                }

                if(parse_url($this->base_url, PHP_URL_QUERY)) {
                    return $this->base_url . '&' . http_build_query($params);
                }

                return $this->base_url . '?' . http_build_query($params);
            },
        );
    }
}
