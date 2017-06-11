<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsTest extends TestCase
{
    use DatabaseMigrations;
    private $response;

	public function setUp()
	{
		Parent::setUp();
		$this->user = factory(\Aris\User::class)->make() ;
	}

    /** @test */
    public function home_page_contains_list_of_news_item()
    {
        $this->response = $this->get('/');
        $this->response->assertSee('news_item_wrapper');
    }

    /** @test */
    public function everyone_can_access_the_latest_news_page()
    {
        $this->response = $this->get('/news');
        $this->response->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_users_trying_to_create_news_should_be_redirected_to_login()
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

    /** @test */
    public function authenticated_users_can_create_news_items()
    {
        $this->news = factory(\Aris\News::class)->make();
        $this->response = $this->actingAs($this->user)->post('news', ['title' => $this->news->title, 'date' => $this->news->date, 'content' => $this->news->content]);
        $this->response->assertRedirect();

        $this->createdNewsItem = \Aris\News::Where('title', $this->news->title)->first();
        $this->assertInstanceOf(\Aris\News::class, $this->createdNewsItem);

    }


}
