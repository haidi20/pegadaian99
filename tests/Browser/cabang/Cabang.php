<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Auth\User;
// use LoginTest
use Tests\Browser\Login;

class Cabang extends Login
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
    public function a_user_cabang_view()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        // second todo
        $this->browse(function ($browser) {
            $browser
                // #path_url-02 cabang_path()
                ->assertPathIs($this->cabang_path())
                // ->loginAs(51)
                // ->visit('/cabang')
                // ->assertSee('Data Cabang')
                // ->maximize()
                // ->assertSee('Data Cabang')
                ->screenshot('CabangView')
                // end
            ;
        });
    }
}
