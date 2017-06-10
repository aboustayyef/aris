<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsTest extends TestCase
{
    use DatabaseMigrations;

	public function setUp()
	{
		Parent::setUp();
		$this->user = factory(\Aris\User::class)->make() ;
	}

    /** @test */
    public function everyone_can_see_the_latest_list_of_news()
    {
        $this->response = $this->get('/news');
        $this->response->assertStatus(200);
    }

    /** @test */
    public function unauthentic_users_trying_to_create_news_should_be_redirected_to_login()
    {
    	$this->response = $this->get('/news/create');
    	$this->response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_access_news_creation_page(){
    	$this->response = $this->actingAs($this->user)->get('/news/create');
    	$this->response->assertStatus(200);
    	$this->response->assertSeeText('Create Story');
    }

}
