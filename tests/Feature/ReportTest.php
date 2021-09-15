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
        $data = [
            'external_id' => 'ASV3455645FSAS',
            'title' => 'NEWS TITLE',
            'url' => 'http://www.test.com',
            'summary' => 'test test test test test test test test test test test test test test test'
        ];

        $response = $this->post('/api/v1/reports', $data);

        $response->assertStatus(201);
    }

    /**
     * A basic update report test example.
     *
     * @return void
     */
    public function testUpdateReport()
    {
        $response = $this->put('/api/v1/reports/1', [
            'external_id' => 'ASV3455645FSAS',
            'title' => 'NEWS TITLE UPDATED',
            'url' => 'http://www.test.com/updated',
            'summary' => 'Summary updated'
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic not found id report test example.
     *
     * @return void
     */
    public function testNotFoundReport()
    {
        $response = $this->get('/api/v1/reports/99');

        $response->assertStatus(400);
    }
}
