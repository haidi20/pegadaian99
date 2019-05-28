<?php

namespace Tests\Browser\cabang;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\cabang\CabangView;

class CabangCreate extends CabangView
{
    public function investor()
    {
        $avoidsamedata = rand(0, 99);
        $investor = "King Yogi$avoidsamedata";
        return $investor;
    }
    public function number_cabang()
    {
        $number_cabang = rand(0, 99);
        return $number_cabang;
    }
    public function nama_cabang()
    {
        $number = $this->number_cabang();
        $nama_cabang = "CAB$number";
        return $nama_cabang;
    }
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
                // after that , make the bot seen a page
                ->assertSee('Data Cabang')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * move to CabangCreate | Tambah Cabang
                 */
                ->clickLink('Tambah Cabang')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->assertSee('DATA CABANG')
                // capture the task
                ->screenshot('UserView[TAMBAH](1)Cabang')
                /**
                 * user field form data
                 * value ('name|id|class', 'value')
                 */
                ->value('#investor', $this->investor())
                ->value('#modal_awal', '200000000')
                ->value('#no_cabang', $this->number_cabang())
                ->value('#nama_cabang', $this->nama_cabang())
                ->value('#telp_cabang', '081545778612')
                ->value('#alamat_cabang', 'Loa Janan Loa Duri')
                ->screenshot('UserView[TAMBAH](2)Cabang_FIELD')
                // press ('value-of-button')
                ->press('Proses')
                // ->assertSee('Maaf')
                ->assertSee('Sukses! Data Cabang telah di Menambahkan dengan Nomor Cabang') // $no_cabang dan $nama_cabang , getData(laters...)
                ->screenshot('UserView[TAMBAH](3)Cabang_SUBMIT')
                // end ✓ almost done
            ;
        });
    }
}
