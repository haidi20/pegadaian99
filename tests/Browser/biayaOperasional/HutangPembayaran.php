<?php

namespace Tests\Browser\biayaOperasional;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HutangPembayaran extends TambahData
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_bo_hutang_pembayaran()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $assertSee = 'DATA HUTANG';
            $jumlah = '500000';
            $jumlahSee = 'Rp. 500.000,00,-';
            $keterangan = 'Hutang kas ke saldo cabang'; // value='uraian'
            $tanggal_hutang = '2017-09-09';
            $status_hutangBL = 'Belum Lunas';
            $status_hutangSL = 'Sudah Lunas';
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
                ->clickLink('Hutang dan Pembayaran')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->assertSee($assertSee)
                // capture the task
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](1)')

                /**
                 * select('name', 'value-option')
                 * looking for view
                 */
                ->select('perpage', '10')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](2.1)')

                ->select('perpage', '25')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](2.2)')

                ->select('perpage', '50')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](2.3)')

                ->select('perpage', '100')
                ->press('Oke')
                ->assertSee($assertSee)
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](2.4)')
                // end of select

                /**
                 * searching
                 */
                //  [tanggal]
                ->select('by', 'jumlah')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $jumlah) //search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($jumlahSee) //text from data by search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.1)')

                //  [uraian|keterangan]
                ->select('by', 'uraian')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $keterangan) //search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.1)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($keterangan) //text from data by search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.2)')

                //  [tanggal_hutang]
                ->select('by', 'tanggal_hutang')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $tanggal_hutang) //search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.3)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($tanggal_hutang) //text from data by search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.3)')

                //  [status_hutang]
                ->select('by', 'status_hutang')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', $status_hutangBL) //search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.4)')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee($status_hutangBL) //text from data by search
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](3.6)')
                /**
                 * modal view [jquery]
                 * click('id')
                 */
                # only view
                ->click('#detail_1') //detail-view
                ->assertSee('Anda yakin data ini status menjadi LUNAS ?')
                ->press('Cancel')
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](4)-dialog-view')
                # action pressOk
                ->click('#detail_1') //detail-view
                ->assertSee('Anda yakin data ini status menjadi LUNAS ?')
                ->press('OK')
                ->screenshot('UserViewBiayaOperasional[HUTANG-PEMBAYARAN](4)-dialog-view')
                // end
            ;
        });
    }
}
