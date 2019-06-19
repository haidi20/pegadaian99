<?php

namespace Tests\Browser\biayaOperasional;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BukuAdmin extends TambahData
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_looking_for_bku_admin_datas()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $userSee = 'BKU Kas';
            $pagination = '640';
            //value for field
            $tanggal = '2019-05-07';
            $uraian = 'PELUNASAN A/N YUSRANSYAH';
            $debit = '1000000';
            $debitSee = 'Rp. 1.000.000,00,-';
            $kredit = '120000';
            $kreditSee = 'Rp. 1.200.000,00,-';
            $saldo = '1800000';
            $saldoSee = 'Rp. 1.800.000,00,-';
            // end of value for field
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
                ->clickLink('Biaya Operasional')
                ->clickLink('BKU Admin')
                ->clickLink($pagination) //pagination
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->assertSee($userSee)
                // capture the task
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](1)')
                /**
                 * select('name', 'value-option')
                 * looking for view
                 */
                ->select('perpage', '10')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](2.1)')

                ->select('perpage', '25')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](2.2)')

                ->select('perpage', '50')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](2.3)')

                ->select('perpage', '100')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](2.4)')
                // end of select
                /**
                 * searching
                 */
                //  [tanggal]
                ->select('by', 'tanggal')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $tanggal) //search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($tanggal) //text from data by search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.1)')

                //  [uraian]
                ->select('by', 'uraian')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $uraian) //search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($uraian) //text from data by search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.2)')

                //  [debit]
                ->select('by', 'debit')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $debit) //search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.3)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($debitSee) //text from data by search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.3)')

                //  [kredit]
                ->select('by', 'kredit')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $kredit) //search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.4)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($kreditSee) //text from data by search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.6)')

                //  [saldo]
                ->select('by', 'saldo')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $saldo) //search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.7)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($saldoSee) //text from data by search
                ->screenshot('UserViewBiayaOperasional[BKU-ADMIN](3.9)')

                // end
            ;
        });
    }
}
