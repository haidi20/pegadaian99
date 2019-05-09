<?php

namespace Tests\Browser\database;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;

class DataAkad extends Login
{

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function user_view_data_akad()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        // $this->user_login();
        $this->browse(function (Browser $browser) {
            $browser
                /**
             * #path_url-02 cabang_path()
             * don't forget to put path link after execute link/move/change address.url
             * in this case we have move from user_login
             */

                // end
            ;
        });
    }
}
