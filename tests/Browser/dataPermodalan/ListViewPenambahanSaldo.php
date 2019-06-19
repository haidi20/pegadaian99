<?php

namespace Tests\Browser\dataPermodalan;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListViewPenambahanSaldo extends TambahSaldo
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_view_list_penambahan_saldo()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $assertSee = 'Data Penambahan Modal';
            $tanggal = '2019-05-28';
            $uraian = 'MODAL AWAL CABANG 15'; // value='keterangan'
            $jumlah = '200000000';
            $jumlahSee = 'Rp. 200.000.000,00,-';
            $browser
                /**
                 * #path_url-02 cabang_path()
                 * don't forget to put path link after execute link/move/change address.url
                 * in this case we have move from user_login
                 */
                ->assertPathIs($this->cabang_path())
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 */
                ->clickLink('Data Permodalan')
                ->clickLink('List Penambahan Saldo')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->assertSee($assertSee)
                // capture the task
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](1)')

                /**
                 * select('name', 'value-option')
                 * looking for view
                 */
                ->select('perpage', '10')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](2)')

                ->select('perpage', '25')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](3)')

                ->select('perpage', '50')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](4)')

                ->select('perpage', '100')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](5)')
                // end of select

                /**
                 * searching
                 */
                //  [tanggal]
                ->select('by', 'tanggal')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $tanggal) //search
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](6)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($tanggal) //text from data by search
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](6.1)')

                //  [uraian|keterangan]
                ->select('by', 'keterangan')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $uraian) //search
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](7.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($uraian) //text from data by search
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](7.2)')

                //  [jumlah]
                ->select('by', 'jumlah')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $jumlah) //search
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](8.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($jumlahSee) //text from data by search
                ->screenshot('UserViewDataPermodalan[LIST-ADD-SALDO](8.2)')
                // end
            ;
        });
    }
}
