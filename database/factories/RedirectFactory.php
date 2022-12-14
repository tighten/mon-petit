<?php

namespace Database\Factories;

use App\Models\Redirect;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedirectFactory extends Factory
{
    protected string $model = Redirect::class;

    public function definition(): array
    {
        return [
            'slug' => substr(now()->timestamp, 0, 8),
            'url' => $this->faker->url(),
            'visits' => 0,
            'deleted_at' => null,
        ];
    }
}
