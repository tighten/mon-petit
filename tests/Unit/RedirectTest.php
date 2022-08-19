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

    /** @test */
    public function valid_slug_will_redirect_to_url()
    {
        $redirect = Redirect::factory()->create();

        $this->get(config('app.url') . '/' . $redirect->slug)
            ->assertRedirect($redirect->url);
    }

    /** @test */
    public function invalid_slug_will_return_error()
    {
        $redirect = Redirect::factory()->make();

        $this->get(config('app.url') . '/' . $redirect->slug)
            ->assertNotFound();
    }

    /** @test */
    public function can_track_redirect_visit()
    {
        $redirect = Redirect::factory()->create();

        $this->get(config('app.url') . '/' . $redirect->slug);
        $this->assertEquals(1, $redirect->fresh()->visits);
    }
}
