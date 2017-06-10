<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTest extends TestCase
{
    private $response;
    
    public function setUp()
    {
    	Parent::setUp();
    	$this->response = $this->get('/');
    }

    /** @test */
    public function the_homepage_is_accessible()
    {
        $this->response->assertStatus(200);
    }

    /** @test */
    public function the_homepage_shows_slogan()
    {
    	$this->response->assertSeeText('The Gateway to Knowledge');
    }

}
