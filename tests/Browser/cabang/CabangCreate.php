<?php

namespace Tests\Browser\cabang;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\cabang\CabangView;

class CabangCreate extends CabangView
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_create_cabang()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        $this->browse(function (Browser $browser) {
            $browser
                /**
                 * #path_url-02 cabang_path() from CabangView.php
                 * don't forget to put path link after execute link/move/change address.url
                 * in this case we have move from user_login
                 */
                ->assertPathIs($this->cabang_path())
                ->assertSee('Data Cabang')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * move to CabangCreate | Tambah Cabang
                 */
                ->clickLink('Tambah Cabang')
                // measure against , the bot seen page
                ->assertSee('DATA CABANG')
                // capture the task
                ->screenshot('UserView[TAMBAH](1)Cabang')
                /**
                 * user field form data
                 */
                ->value('#investor', 'Yogi Arif Widodo')
                ->value('#modal_awal', '200000000')
                ->value('#no_cabang', '15')
                ->value('#nama_cabang', 'PEG99')
                ->value('#telp_cabang', '081545778612')
                ->value('#alamat_cabang', 'Loa Janan Loa Duri')
                ->screenshot('UserView[TAMBAH](2)Cabang_FIELD')
                ->press('Proses')
                ->screenshot('UserView[TAMBAH](3)Cabang_SUBMIT')
                // end ✓ almost done
            ;
        });
    }
}
