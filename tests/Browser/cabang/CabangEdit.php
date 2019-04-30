<?php

namespace Tests\Browser\cabang;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\cabang\CabangView;

class CabangEdit extends CabangView
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_edit_cabang()
    {
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
                ->clickLink('Edit Cabang')
                // measure against , the bot seen page
                ->assertSee('DATA CABANG')
                // capture the task
                ->screenshot('UserView[EDIT](1)Cabang')
                // user change No Cabang
                ->value('#no_cabang', '99')
                ->screenshot('UserView[EDIT_FIELD](2)Cabang')
                ->press('Proses')
                /**
                 * #path_url-02 cabang_path() from CabangView.php
                 * don't forget to put path link after execute link/move/change address.url
                 * in this case we have move from Edit Cabang -> Data Cabang
                 */
                ->assertPathIs($this->cabang_path())
                ->assertSee('Sukses')
                ->screenshot('UserView[EDIT_SUBMIT](2)Cabang')
                // end
            ;
        });
    }
}
