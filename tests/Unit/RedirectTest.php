<?php

namespace Tests\Unit;

use App\Models\Redirect;
use Tests\TestCase;

class RedirectTest extends TestCase
{
    /** @test */
    public function can_save_redirect_to_database()
    {
        $redirect = Redirect::factory()->create();

        $this->assertModelExists($redirect);
    }
}
