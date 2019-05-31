<?php

namespace Tests\Browser\dataPermodalan;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RefundSaldo extends TambahSaldo
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_refund_a_saldo()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $jumlah = '20000';
            $keterangan = 'Barangnya anu';
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
                 */
                ->clickLink('Refund Saldo')
                // waitForText('$selector','$second = 5')
                ->waitForText('Refund Saldo', 5) //for complete jsload min-5-second-for-screenshot
                ->screenshot('UserViewDataPermodalan[Refund-Saldo][1]')
                /**
                 * field rincian
                 */
                ->value('#jumlah', $jumlah)
                ->value('#keterangan', $keterangan)
                ->screenshot('UserViewDataPermodalan[Refund-Saldo][2.1]fill-field')
                // button Prosess ['submit|type']
                ->press('Proses')
                ->assertSee('Sukses! Data refund saldo berhasil di tambah')
                ->screenshot('UserViewDataPermodalan[Refund-Saldo][2.2]sukses-added')
                // end ✓ almost done
            ;
        });
    }
}
