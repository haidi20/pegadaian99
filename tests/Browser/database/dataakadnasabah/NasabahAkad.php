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
                 * move to Database -> Data Akad Nasabah
                 */
                ->clickLink('Nasabah Akad')
                ->assertSee('NASABAH AKAD')
                // measure against , the bot seen a page ,
                // for capture laters -> finalize js loading screen
                ->screenshot('UserViewDataAkadNasabah[1]')
                //
            ;
        });
    }
}
