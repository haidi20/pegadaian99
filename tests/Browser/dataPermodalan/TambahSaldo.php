<?php

namespace Tests\Browser\dataPermodalan;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;

class TambahSaldo extends Login
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_view_tambah_saldo()
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
                // going to Data Permodalan
                ->clickLink('Data Permodalan')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * move to Data Permodalan -> Tambah Saldo
                 */
                ->clickLink('Tambah Saldo')
                /**
                 * measure against , the bot seen a page ,
                 * for capture laters -> finalize js loading screen
                 * [finalize_js_loading_screen]
                 */
                ->assertSee('JENIS MODAL')
                ->screenshot('UserViewDataPermodalan[1]view')
                // end ✗
            ;
        });
    }
}
