<?php

namespace Tests\Browser\dataPermodalan;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;

class TambahSaldo extends Login
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
    public function a_user_view_tambah_saldo()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $myMoney = '1000000';
            $browser
                // path direct link after log in is www.url.com/cabang
                ->assertPathIs($this->cabang_path())
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
                /**
                 * select('name', 'value-option')
                 * ?Hutang Cabang
                 * ?Hutang Peresonal
                 * ?Penambahan Kas Saldo
                 */
                ->select('jenis_modal', 'hutang_cabang')
                /**
                 * Hutang Cabang
                 * cabang select
                 */
                ->select('cabang', '58e13893dc44a') //suhartik-sutomo
                ->value('#jumlah', $myMoney)
                ->value('#keterangan', 'hutang cabang')
                ->screenshot('UserViewDataPermodalan[2.1]hutang-cabang-fill-value')
                // button Prosess ['submit|type']
                ->press('Proses')
                ->assertSee('Sukses! Data hutang cabang berhasil di tambah')
                ->screenshot('UserViewDataPermodalan[2.2]hutang-cabang-submit')

                /**
                 * Hutang Personal
                 * fill-value-onProcess
                 */
                ->select('jenis_modal', 'hutang_personal')
                ->value('#jumlah', $myMoney)
                ->value('#keterangan', 'Hutang Personal')
                ->screenshot('UserViewDataPermodalan[3.1]hutang-personal-fill-value')
                // button Prosess ['submit|type']
                ->press('Proses')
                ->assertSee('Sukses! Data hutang personal berhasil di tambah')
                ->screenshot('UserViewDataPermodalan[3.2]hutang-personal-submit')

                /**
                 * Hutang Penambahan Kas Saldo
                 * fill-value-onProcess
                 */
                ->select('jenis_modal', 'penambahan_kas_saldo')
                ->value('#jumlah', $myMoney)
                ->value('#keterangan', 'Penambahan Kas Saldo')
                ->screenshot('UserViewDataPermodalan[4.1]penambahan-kas-saldo-fill-value')
                // button Prosess ['submit|type']
                ->press('Proses')
                ->assertSee('Sukses! Data penambahan kas saldo berhasil di tambah')
                ->screenshot('UserViewDataPermodalan[4.2]penambahan-kas-saldo-submit')
                // end ✓ almost done
            ;
        });
    }
}
