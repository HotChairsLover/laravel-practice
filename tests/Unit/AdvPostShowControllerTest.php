<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

class AdvPostShowControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowPost()
    {
        $this->refreshTestDatabase();
        $this->seed();

        $randId = rand(1, 100);

        $response = $this->get('/api/posts/'.$randId);

        $response->assertStatus(200);

        assertTrue(count($response['data']) == 13);
    }
}
