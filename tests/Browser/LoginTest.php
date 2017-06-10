<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{


    use DatabaseMigrations;

    public function setUp()
    {
        Parent::setUp();
        $this->user = factory(\Aris\User::class)->make(['password' => bcrypt('pass123')]) ;
        $this->user->save();
    }

    /** @test */
    public function when_users_login_successfully_they_are_redirected_to_root()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', $this->user->email)
            ->type('password', 'pass123')
            ->press('Login')
            ->assertPathIs('/');
        });

        $this->user->delete();
    }
}
