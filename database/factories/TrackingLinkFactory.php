<?php

namespace Database\Factories;

use App\Models\TrackingLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackingLinkFactory extends Factory
{
    protected string $model = TrackingLink::class;

    public function definition(): array
    {
        return [
            'base_url' => $this->faker->url,
            'campaign' => $this->faker->word,
            'source' => $this->faker->word,
            'medium' => $this->faker->word,
            'content' => $this->faker->word,
            'term' => $this->faker->word,
        ];
    }
}
