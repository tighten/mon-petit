<?php

namespace Tests\Unit;

use App\Models\TrackingLink;
use Tests\TestCase;

class TrackingLinkTest extends TestCase
{
    /** @test */
    public function can_create_tracking_link_with_only_required_params()
    {
        $utm = TrackingLink::factory()->create([
            'base_url' => 'http://www.example.com',
            'campaign' => 'blog_post',
            'source' => 'twitter',
            'medium' => null,
            'content' => null,
            'term' => null,
        ]);

        $this->assertModelExists($utm);
    }

    /** @test */
    public function content_attribute_will_be_mutated_to_snake_case()
    {
        $utm = TrackingLink::factory()->create([
            'content' => 'Star Wars',
        ]);

        $this->assertSame('star_wars', $utm->fresh()->content);
    }

    /** @test */
    public function term_attribute_will_be_mutated_to_snake_case()
    {
        $utm = TrackingLink::factory()->create([
            'term' => 'Star Wars',
        ]);

        $this->assertSame('star_wars', $utm->fresh()->term);
    }

    /** @test */
    public function can_create_tracking_link_with_query_string_in_base_url()
    {
        $utm = TrackingLink::factory()->create([
            'base_url' => 'http://www.example.com',
        ]);

        $this->get($utm->utm_url)
            ->assertOk();
    }

}
