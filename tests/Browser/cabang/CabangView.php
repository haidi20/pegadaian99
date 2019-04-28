<?php

namespace Tests\Browser\cabang;

use Laravel\Dusk\Browser;
use Tests\Browser\Login;

class CabangView extends Login
{
    /**
     * declare
     * #path_url-02
     * url.com/cabang
     */
    public function cabang_path()
    {
        return '/cabang';
    }

    /**
     * A Dusk cabang view data.
     * @test
     * @return void
     */
    public function user_view_cabang()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        // second todo
        $this->browse(function (Browser $browser) {
            $browser
                /**
                 * #path_url-02 cabang_path()
                 * don't forget to put path link after execute link/move/change address.url
                 * in this case we have move from user_login
                 */
                ->assertPathIs($this->cabang_path())
                ->assertSee('Data Cabang')
                // ->loginAs(51)
                // ->visit('/cabang')
                // ->assertSee('Data Cabang')
                // ->maximize()
                // ->assertSee('Data Cabang')
                // capture the task
                ->screenshot('UserViewCabang')
                // end
            ;
        });
    }
}
