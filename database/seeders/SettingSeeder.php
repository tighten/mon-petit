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
                'blog_post' => 'Blog Post',
                'advertisement' => 'Advertisement',
                'podcast' => 'Podcast',
                'promo' => 'Promo',
            ],
        ]);

        Setting::create([
            'key' => 'sources',
            'value' => [
                'twitter' => 'Twitter',
                'linkedin' => 'LinkedIn',
                'facebook' => 'Facebook',
                'youtube' => 'YouTube',
                'laravel' => 'Laravel',
                'livewire' => 'Livewire',
                'github' => 'GitHub',
                'laravel_news' => 'Laravel News',
                'calebporzio' => 'calebporzio.com',
                'mattstauffer' => 'mattstauffer.COM',
                'jigsaw' => 'Jigsaw',
                'laracasts' => 'Laracasts',
            ],
        ]);

        Setting::create([
            'key' => 'mediums',
            'value' => [
                'post' => 'Post',
                'banner' => 'Banner',
                'email' => 'Email',
                'link' => 'Link',
                'search' => 'Search',
                'sponsor' => 'Sponsor',
            ],
        ]);
    }
}
