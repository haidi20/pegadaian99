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
                // going to cabang->edit cabang
                ->clickLink('Cabang')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * move to CabangCreate | Edit Cabang
                 */
                ->clickLink('Edit Cabang')
                // measure against , the bot seen page
                ->assertSee('DATA CABANG')
                // capture the task
                ->screenshot('UserView[EDIT](1)Cabang')

                // before edit cabang , choose the cabang from drop down menu admin
                ->clickLink('Pilih Cabang')
                ->assertPathIs('/setting/cabang')
                ->assertSee('PILIH CABANG')
                ->assertSee('Nomor Cabang')
                /**
                 * DROP DOWN MENU PILIH CABANG
                 * select('name', 'value')
                 * 03
                 */
                ->select('id_cabang', '5a49d1e6d31fb')
                ->screenshot('UserView[EDIT](2)Cabang_PILIH')
                ->press('Proses')
                ->assertSee('Sukses')
                ->screenshot('UserView[EDIT](3)Cabang_PILIH')

                // back to edit cabang, against
                ->clickLink('Cabang')
                ->clickLink('Edit Cabang')
                // measure against , the bot seen page
                ->assertSee('DATA CABANG')
                // capture task view edit cabang
                ->screenshot('UserView[EDIT](4)Cabang')
                // user change value of field data list cabang from select cabang
                ->value('#investor', 'Yogi Arif Widodo')
                ->value('#nama_cabang', 'Bhayangan')
                ->value('#telp_cabang', '021791021791')
                ->value('#alamat_cabang', 'Dubai Emirat Arab')
                ->screenshot('UserView[EDIT](5)_FIELD')
                ->press('Proses')
                /**
                 * #path_url-02 cabang_path() from CabangView.php
                 * don't forget to put path link after execute link/move/change address.url
                 * in this case we have move from Edit Cabang -> Data Cabang
                 */
                ->assertPathIs($this->cabang_path())
                ->assertSee('Sukses')
                ->screenshot('UserView[EDIT](6)Cabang_SUBMIT')
                // end
            ;
        });
    }
}
