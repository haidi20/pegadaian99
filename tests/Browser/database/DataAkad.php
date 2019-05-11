<?php

namespace Tests\Browser\database;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\database\DataNasabah;

class DataAkad extends DataNasabah
{

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function user_view_data_akad()
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
                 * move to CabangCreate | Tambah Cabang
                 */
                ->clickLink('Data Akad Nasabah')
                ->assertSee('Data Akad')
                ->assertSee('DEFAULT')
                ->screenshot('UserViewDataAkadNasabah[1]')
                // end
            ;
        });
    }
}
