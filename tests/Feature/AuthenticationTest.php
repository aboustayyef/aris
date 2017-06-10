<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
	{
		Parent::setUp();
		$this->user = factory(\Aris\User::class)->make(['password' => bcrypt('pass123')]) ;
	}

	/** @test */
	public function anyone_can_access_login_form()
	{
		$response = $this->get('/login');
		$response->assertStatus(200);
		$response->assertSee('Login');
	}

	/** @test */
    public function when_logged_in_users_go_to_login_page_they_are_redirected_to_the_root_page()
    {
        $response = $this->actingAs($this->user)->get('/login');
        $response->assertRedirect('/');
    }

    /** @test */
    public function when_users_log_in_succesfully_the_are_redirected_to_the_root_page()
    {
    	// we will be using Laravel dusk for this one
    }
}
