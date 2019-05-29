<?php

namespace Tests\Browser\biayaOperasional;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;

class TambahData extends Login
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
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_tambah_data_biaya_operasioanl()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            /**
             * data create
             */
            $jumlah = 100000;
            $keterangan = 'Beli Stempel';
            // end of data create

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
                 * move to CabangCreate | Tambah Cabang
                 */
                ->clickLink('Biaya Operasional')
                ->clickLink('Tambah Data')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->assertSee('FORM BELANJA ATK')
                // capture the task
                ->screenshot('UserViewBiayaOperasional[TAMBAH_DATA](1)')
                // fill the field
                ->value('#jumlah', $jumlah)
                ->value('#keterangan', $keterangan)
                ->screenshot('UserViewBiayaOperasional[TAMBAH_DATA](2)')
                // press('$button') //for button [submit]
                ->press('Proses')
                // waitFor() | assertSee | ended js-load-page
                ->assertSee('Sukses! Data Atk berhasil di tambah')
                ->screenshot('UserViewBiayaOperasional[TAMBAH_DATA](3)')
                // end
            ;
        });
    }
}
