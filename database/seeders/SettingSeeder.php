<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'key' => 'campaigns',
            'value' => [
                'blog_post',
                'advertisement',
                'podcast',
                'promo',
            ],
        ]);

        Setting::create([
            'key' => 'sources',
            'value' => [
                'twitter',
                'linkedin',
                'facebook',
                'youtube',
                'laravel',
                'livewire',
                'github',
                'laravel_news',
                'freek',
                'calebporzio',
                'mattstauffer',
                'jigsaw',
                'laracasts',
            ],
        ]);

        Setting::create([
            'key' => 'mediums',
            'value' => [
                'post',
                'banner',
                'email',
                'link',
                'search',
                'sponsor',
            ],
        ]);
    }
}
