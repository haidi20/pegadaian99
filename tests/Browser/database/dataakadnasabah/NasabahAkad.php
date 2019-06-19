<?php

namespace Tests\Browser\database\dataakadnasabah;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\database\DataNasabah;

class NasabahAkad extends DataNasabah
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */

    public function user_view_nasabah_akad()
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
                // measure against , the bot seen a page
                ->assertSee('Data Cabang')
                // going to Database
                ->clickLink('Database')
                ->clickLink('Data Akad Nasabah')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 */
                ->clickLink('Nasabah Akad')
                ->assertSee('NASABAH AKAD')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->screenshot('UserViewDataNasabahAkad[1]')
                /**
                 * select('name', 'value-option')
                 * user want show 50 data per page
                 */
                ->select('perpage', '25')
                ->press('Oke')
                ->assertSee('RENDYANSYAH') //assert for load & stop js to get good capture/screenshot
                ->screenshot('UserViewDataNasabahAkad[1]page-load')
                //
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * pagination move -> |2|
                 */
                ->clickLink('»')
                ->assertSee('ANTONIUS E. LAPO') //assert for load & stop js to get good capture/screenshot
                ->screenshot('UserViewDataNasabahAkad[1]page-pagination')
                /**
                 * searching
                 */
                //  [nama_lengkap]
                ->select('by', 'nama_lengkap')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'ZAINU NILA RAHMA WATI	') //search
                ->screenshot('UserViewNasabahAkad[3.1]FilterView-nama-lengkap')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('JL. DR. SUTOMO NO.29') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.1]FilterSubmit-nama-lengkap')

                //  [no_telp]
                ->select('by', 'no_telp')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', '08115802033') //search
                ->screenshot('UserViewNasabahAkad[3.2]FilterView-no-telp')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.2]FilterSubmit-no-telp')
                //

                //  [no_id]
                ->select('by', 'no_id')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'C99-03-170718-002') //search
                ->screenshot('UserViewNasabahAkad[3.3]FilterView-no-id')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.3]FilterSubmit-no-id')
                /**
             * FUNCTION SEARCH DOESN'T WORK
                //  [jaminan]
                ->select('by', 'jaminan')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'OPPO F7 RAM 4/64') //search
                ->screenshot('UserViewNasabahAkad[3.4]FilterView-jaminan')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.4]FilterSubmit-jaminan')

                //  [pinjaman]
                ->select('by', 'pinjaman')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'C99-03-170718-002') //search
                ->screenshot('UserViewNasabahAkad[3.2]FilterView-no-id')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.2]FilterSubmit-no-id')

                //  [tunggakan]
                ->select('by', 'tunggakan')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'C99-03-170718-002') //search
                ->screenshot('UserViewNasabahAkad[3.2]FilterView-no-id')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.2]FilterSubmit-no-id')

                //  [tanggal_akad]
                ->select('by', 'tanggal_akad')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'C99-03-170718-002') //search
                ->screenshot('UserViewNasabahAkad[3.2]FilterView-no-id')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.2]FilterSubmit-no-id')

                //  [jatuh_tempo]
                ->select('by', 'jatuh_tempo')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'C99-03-170718-002') //search
                ->screenshot('UserViewNasabahAkad[3.2]FilterView-no-id')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.2]FilterSubmit-no-id')

                //  [prosedur]
                ->select('by', 'prosedur')
                // some case value more prefered use ID not CLASS , sometime make anError
                ->value('#q', 'C99-03-170718-002') //search
                ->screenshot('UserViewNasabahAkad[3.2]FilterView-no-id')
                // press ('value-of-button')
                ->press('Oke')
                ->assertSee('DEVI YULISTIA ANGGRENI') //text from data by search
                ->screenshot('UserViewNasabahAkad[3.2]FilterSubmit-no-id')
             */
                //
            ;
        });
    }
}
