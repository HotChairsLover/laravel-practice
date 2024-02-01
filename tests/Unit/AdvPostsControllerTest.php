<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

class AdvPostsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetPosts()
    {
        $this->refreshTestDatabase();

        $response = $this->get('/api/posts');

        $response->assertStatus(200);

        $response->assertJsonCount(13);

        assertTrue(count($response['data']) <= 100);
    }


}
