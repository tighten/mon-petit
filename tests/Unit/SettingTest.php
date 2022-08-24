<?php

namespace Tests\Unit;

use App\Models\Setting;
use Tests\TestCase;

class SettingTest extends TestCase
{
    /** @test */
    public function can_store_setting_in_json_by_passing_array()
    {
        $setting = Setting::factory()->create();

        $this->assertIsArray($setting->value);

        $this->assertDatabaseHas('settings', [
            'value' => json_encode($setting->value),
        ]);
    }

    /** @test */
    public function settings_seeded_with_campaigns()
    {
        $this->assertDatabaseHas('settings', [
            'key' => 'campaigns',
        ]);
    }

    /** @test */
    public function settings_seeded_with_sources()
    {
        $this->assertDatabaseHas('settings', [
            'key' => 'sources',
        ]);
    }

    /** @test */
    public function settings_seeded_with_mediums()
    {
        $this->assertDatabaseHas('settings', [
            'key' => 'mediums',
        ]);
    }
}
