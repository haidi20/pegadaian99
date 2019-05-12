<?php

namespace Tests\Browser\dataPembayaran;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;

class Pendapatan extends Login
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_view_data_pendapatan()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $browser
                // path direct link after log in is www.url.com/cabang
                ->assertPathIs('/cabang')
                ->assertSee('Data Cabang')
                // going to Data Pembayaran
                ->clickLink('Data Pembayaran')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * move to Data Pembayaran -> BKU
                 */
                ->clickLink('Pendapatan')
                /**
                 * measure against , the bot seen a page ,
                 * for capture laters -> finalize js loading screen
                 * [finalize_js_loading_screen]
                 */
                ->assertSee('Data B.Titip & Admin')
                ->screenshot('UserViewPendapatan[1]view')
                // end ✗
            ;
        });
    }
}
