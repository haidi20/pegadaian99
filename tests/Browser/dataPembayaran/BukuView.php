<?php

namespace Tests\Browser\dataPembayaran;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;
use App\Models\Bku;

class BukuView extends Login
{
    public function data_view_assert()
    { }
    // public function data_uraian()
    // {
    //     $uraian = Bku::all();
    //     $uraian->uraian->first();
    //     // $uraian = DB::Table('bku')->select('uraian')->first();
    //     return $uraian;
    // }
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_view_bku()
    {
        // $uraian = factory(Bku::class)->create([
        //     'uraian' => 'AKAD A/N JULIYATI',
        // ]);
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $assert = 'PELUNASAN A/N YUSRANSYAH'; //for see finalize js loading
            $assert_search = 'B.ADM'; //for uraian - tanggal - uraian - kredit - saldo
            $assert_debit = '10000'; // Rp. 10.000,00,-
            $assert_kredit = '1500000'; // for search kredit + assert
            $assert_saldo = '885000'; // for search saldo + assert
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
                /**
                 * measure against , the bot seen a page ,
                 * for capture laters -> finalize js loading screen
                 * [finalize_js_loading_screen]
                 */
                ->assertSee('BKU Umum')
                ->screenshot('UserViewDataPembayaran[1]view')
                /**
                 * DROP DOWN MENU HOW MUCH USER WOULD SHOW DATA
                 * select('name', 'value')
                 */
                ->select('perpage', '100')
                // button OKE search
                ->press('Oke')
                // [finalize_js_loading_screen  ]
                ->assertSee($assert)
                ->screenshot('UserViewDataPembayaran[2.1]view-4perpage-100')

                ->select('perpage', '50')
                // button OKE search
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee($assert)
                ->screenshot('UserViewDataPembayaran[2.2]view-3perpage-50')

                ->select('perpage', '25')
                // button OKE search
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee($assert)
                ->screenshot('UserViewDataPembayaran[2.3]view-2perpage-25')

                ->select('perpage', '10')
                // button OKE search
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee($assert)
                ->screenshot('UserViewDataPembayaran[2.4]view-1perpage-10')
                /**
                 * search by
                 * Tanggal	    Uraian	    Debit	            Kredit	        Saldo
                 * 2018-07-25 | B.ADM | Rp. 140.000,00,- | Rp. 150.000,00,- | Rp. 5.000.000,00,-
                 */

                // Select tanggal
                ->select('by', 'tanggal')
                ->value('#q', '2018-07-25')
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee($assert_search)
                ->screenshot('UserViewDataPembayaran[3.1]view-search-by-tanggal')

                // Select Uraian
                ->select('by', 'uraian')
                ->value('#q', $assert_search)
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee('Rp. 10.000,00,-')
                ->screenshot('UserViewDataPembayaran[3.2]view-search-by-uraian')

                // Select Debit
                ->select('by', 'debit')
                ->value('#q', $assert_debit)
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee($assert_search)
                ->screenshot('UserViewDataPembayaran[3.3]view-search-by-debit')

                // Select Kredit
                ->select('by', 'kredit')
                ->value('#q', $assert_kredit)
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee('Rp. 1.500.000,00,-')
                ->screenshot('UserViewDataPembayaran[3.4]view-search-by-kredit')

                // Select Saldo
                ->select('by', 'saldo')
                ->value('#q', $assert_saldo)
                ->press('Oke')
                // [finalize_js_loading_screen]
                ->assertSee('B.TITIP')
                ->screenshot('UserViewDataPembayaran[3.5]view-search-by-saldo')
                // end ✓ almost done
            ;
        });
    }
}
