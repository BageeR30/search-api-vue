<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test length of searched dataset
     *
     * @dataProvider dataCountProvider
     * @return void
     */
    public function test_search_count($name, $price_start, $price_end, $bedrooms, $bathrooms, $storeys, $garages, $expected)
    {
        $params = http_build_query(array_filter(compact('name', 'price_start', 'price_end', 'bedrooms', 'bathrooms', 'storeys', 'garages')));
        $response = $this->getJson('/api/house?' . $params);

        $response->assertStatus(200)->assertJsonCount($expected, 'data');
    }

    public function dataCountProvider()
    {
        return [
            ['The', '', '', '', '', '', '', 9],
            ['The C', '', '', '', '', '', '', 2],
            ['The Cg', '', '', '', '', '', '', 0],
            ['The Co', '', '', '', '', '', '', 1],
            ['', '', '', '', '', '', '', 9],
            ['', 390600, '', '', '', '', '', 5],
            ['', '', '', 4, '', '', '', 6],
            ['', '', '', 4, 2, '', '', 3],
            ['', '', '', 4, 2, 2, 2, 2],
        ];
    }
}
