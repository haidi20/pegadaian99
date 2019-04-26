<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Login extends DuskTestCase
{
    /**
     * declare
     * #path_url-01
     * url.com/login
     */
    public function login_path()
    {
        return '/login';
    }
    /**
     * A Dusk login test.
     * !write (at/symbol)test for long_function
     * @test
     * @return void
     * https://laracasts.com/discuss/channels/testing/dusk-chrome-driver-error-unknown-error-call-function-result-missing-value
     */
    public function user_login()
    {
        $this->browse(function (Browser $browser) {
            // #path_url-01 login_path()
            $browser->visit($this->login_path())
                // used to maximize the browser window:
                ->maximize()
                ->assertSee('Form Login')
                /**
                 * ?type()
                 * fill the field 'name', 'value'
                 */
                ->type('username', 'admin')
                ->type('password', 'admin123')
                /**
                 * ?press()
                 * click button with
                 * '.class', '#id' , 'name'
                 */
                ->press('.btn')
                // ->assertPathIs('/cabang')
                ->screenshot('UserAuthLogin')
                // end
            ;
        });
    }
}
