<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Tests\Browser\Login;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogOut extends Login
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function user_logout()
    {
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $browser
                ->assertSee('Data Cabang')
                ->clickLink('Logout')
                ->assertPathIs('/login')
                ->assertSee('Form Login')
                // ->type('username', 'berhasilLogout')
                ->screenshot('UserAuthLogout')
                // end
            ;
        });
    }
}
