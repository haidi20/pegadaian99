<?php

namespace Tests\Browser\dataPembayaran;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;

class BukuView extends Login
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_view_bku()
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
                ->clickLink('BKU')
                ->assertSee('BKU Umum')
                ->screenshot('UserViewDataPembayaran[1]view')
                /**
                 * DROP DOWN MENU HOW MUCH USER WOULD SHOW DATA
                 * select('name', 'value')
                 */
                ->select('perpage', '100')
                ->screenshot('UserViewDataPembayaran[2.1]view-4perpage-100')
                ->select('perpage', '50')
                ->screenshot('UserViewDataPembayaran[2.2]view-3perpage-50')
                ->select('perpage', '25')
                ->screenshot('UserViewDataPembayaran[2.3]view-2perpage-25')
                ->select('perpage', '10')
                ->screenshot('UserViewDataPembayaran[2.4]view-1perpage-10')
                // test pagination
                ->clickLink('6')
                ->screenshot('UserViewDataPembayaran[3]view-pagination')
                /**
                 * search by
                 * Tanggal	    Uraian	    Debit	            Kredit	        Saldo
                 * 2018-07-25 | B.ADM | Rp. 140.000,00,- | Rp. 150.000,00,- | Rp. 5.000.000,00,-
                 */
                ->assertSee('PEMISAHAN B.TITIP & B.ADM')
                // end
            ;
        });
    }
}
