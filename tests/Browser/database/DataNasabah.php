<?php

namespace Tests\Browser\database;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Login;

class DataNasabah extends Login
{
    /**
     * declare
     * #path_url-02
     * url.com/cabang
     * path direct after login
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
    public function user_view_data_nasabah()
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
                 * #path_url-02 cabang_path()
                 * don't forget to put path link after execute link/move/change address.url
                 * in this case we have move from user_login
                 */
                ->assertPathIs($this->cabang_path())
                ->assertSee('Data Cabang')
                // going to Database
                ->clickLink('Database')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * move to Database -> Data Nasabah
                 */
                ->clickLink('Data Nasabah')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->assertSee('DATA TABLE NASABAH')
                ->screenshot('UserViewDataNasabah[1]view')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * pagination move -> |2|
                 */
                ->clickLink('6')
                /**
                 * select('name', 'value-option')
                 * user want show 50 data per page
                 */
                ->select('perpage', '50')
                ->screenshot('UserViewDataNasabah[2]view-page-6-and-view-perpage-50')
                /**
                 * user search by
                 * nama_lengkap && no_telp && alamat
                 */
                //  [nama_lengkap]
                ->select('by', 'nama_lengkap')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'SELVY SOVYANA') //search
                ->screenshot('UserViewDataNasabah[3.1]FilterView-nama-lengkap')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('JL. DR. SUTOMO NO.29') //text from data by search
                ->screenshot('UserViewDataNasabah[3.1]FilterSubmit-nama-lengkap')

                //  [no_telp]
                ->select('by', 'no_telp')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', '082250256655') //search
                ->screenshot('UserViewDataNasabah[3.2]FilterView-no-telp')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewDataNasabah[3.2]FilterSubmit-no-telp')

                //  [alamat]
                ->select('by', 'alamat')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'JL. TURI RAYA B 545 RT 075') //search
                ->screenshot('UserViewDataNasabah[3.3]FilterView-alamat')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('NURMAHAYATI') //text from data by search
                ->screenshot('UserViewDataNasabah[3.3]FilterSubmit-alamat')
                /**
                 * modal view [jquery]
                 * click('id')
                 */
                ->click('#detail_955') //detail-view
                ->assertSee('NURMAHAYATI')
                ->assertSee('Wanita')
                ->screenshot('UserViewDataNasabah[4]detail-info[1]')
                ->press('Oke')
                ->assertSee('DATA TABLE NASABAH')
                ->screenshot('UserViewDataNasabah[4]detail-info[2]ok-close')
                /**
                 * i will refresh mean's back to the Data nasabah
                 * todo edit
                 */
                // ->clickLink('Data Nasabah')
                // ->assertSee('DATA TABLE NASABAH')

                /**
                 * edit click
                 */
                ->click('a[href="http://127.0.0.1:8000/nasabah/edit/954"]')
                ->assertPathIs('/nasabah/edit/954')
                ->assertSee('Edit Data Nasabah')
                ->screenshot('UserViewDataNasabah[5.1]edit-data-nasabah')
                ->value('#no_identitas', '99999999999')
                // ->value('#alamat', 'JL. PANGERAN ANTASARIS') //edit data alamat with this value
                ->screenshot('UserViewDataNasabah[5.2]edit-data-nasabah-alamat')
                ->press('Proses')
                ->assertSee('Sukses! Data Nasabah telah di perbaharui dengan Atas Nama')
                ->screenshot('UserViewDataNasabah[5.3]edit-data-nasabah-alamat-submit')

                // end ✓ almost done
            ;
        });
    }
}
