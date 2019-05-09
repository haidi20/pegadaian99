<?php

namespace Tests\Browser;

use Tests\Browser\Login;
use Laravel\Dusk\Browser;

class LogOut extends Login
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function user_logout()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        // open browser
        $this->browse(function (Browser $browser) {
            $browser
                ->assertSee('Data Cabang')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 */
                ->clickLink('Logout')
                // don't forget to put path after execute link/move/change address.url
                ->assertPathIs('/login')
                ->assertSee('Form Login')
                // fill some field , for the toast end of execute
                ->value('#username', 'berhasil logout')
                // ->type('username', 'berhasil Logout')
                // capture the task
                ->screenshot('UserAuthLogout')
                // end
            ;
        });
    }
}
