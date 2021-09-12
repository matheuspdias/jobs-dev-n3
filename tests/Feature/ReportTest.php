<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ReportTest
 * @package Tests\Feature
 */
class ReportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post('/api/v1/reports', [
            'external_id' => 'ASV3455645FSAS',
            'title' => 'NEWS TITLE',
            'url' => 'http://www.test.com',
            'summary' => 'test test test test test test test test test test test test test test test'
        ]);

        $response->assertStatus(201);
    }
}
