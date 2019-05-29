<?php

namespace Tests\Browser\biayaOperasional;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DataPengeluaran extends TambahData
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_looking_for_data_pengeluaran()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $userSee = 'beli kuota';
            // search data
            $tanggal_atk = '2019-05-29';
            $keterangan = $userSee;
            $jumlah = '100000';
            $jumlahRp = 'Rp. 100.000,00,-';
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
                ->clickLink('Data Pengeluaran')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen

                ->clickLink('79')
                ->assertSee('Biaya Operasional')
                // capture the task
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](1)')
                /**
                 * select('name', 'value-option')
                 * looking for view
                 */
                ->select('perpage', '10')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](2.1)')

                ->select('perpage', '25')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](2.2)')

                ->select('perpage', '50')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](2.3)')

                ->select('perpage', '100')
                ->press('Oke')
                ->assertSee($userSee)
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](2.4)')
                // end of select

                /**
                 * searching
                 */
                //  [tanggal_atk]
                ->select('by', 'tanggal_atk')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $tanggal_atk) //search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($tanggal_atk) //text from data by search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.2)')

                //  [tanggal_atk]
                ->select('by', 'tanggal_atk')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $tanggal_atk) //search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($tanggal_atk) //text from data by search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.2)')

                //  [keterangan]
                ->select('by', 'keterangan')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $keterangan) //search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.3)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($keterangan) //text from data by search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.4)')

                //  [jumlah_atk]
                ->select('by', 'jumlah_atk')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $jumlah) //search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.5)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($jumlahRp) //text from data by search
                ->screenshot('UserViewBiayaOperasional[DATA_PENGELUARAN](3.6)')
                // end
            ;
        });
    }
}
