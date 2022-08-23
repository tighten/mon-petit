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
}
