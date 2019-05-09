<?php

namespace Tests\Browser\cabang;

use Laravel\Dusk\Browser;
use Tests\Browser\Login;

class CabangView extends Login
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
     * A Dusk cabang view data.
     * @test
     * @return void
     */
    public function user_view_cabang()
    {
        /**
         * first todo
         * todo auth|login|middleware
         * alternative use ->loginAs(Model::find(id))
         */
        $this->user_login();
        // second todo
        $this->browse(function (Browser $browser) {
            $browser
                /**
                 * #path_url-02 cabang_path()
                 * don't forget to put path link after execute link/move/change address.url
                 * in this case we have move from user_login
                 */
                ->assertPathIs($this->cabang_path())
                ->assertSee('Data Cabang')
                // capture the task
                ->screenshot('UserViewCabang[1]')
                /**
                 * DROP DOWN MENU PILIH CABANG
                 * select('name', 'value')
                 * 03
                 */
                ->select('perpage', '50')
                ->screenshot('UserViewCabang[2]')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 * pagination move -> |2|
                 */
                // ->clickLink('2')
                // measure againts browser assert
                // ->assertSee('OKA - SUTOMO')
                // capture the task
                // ->screenshot('UserViewCabangPagination[2]')
                /**
                 * sorting
                 * modal setiap cabang
                 * !!button oke redundant
                 * field data value('name|class|id', '$value')
                 */
                ->value('#q', 'OMO')
                ->select('by', 'nama_cabang')
                // button OKE search
                ->click('#btn-search')
                // // ->clickLink('Oke')
                ->assertSee('516.000,00')

                // // capture the task
                ->screenshot('UserViewCabangSearch[3]')
                // end
            ;
        });
    }
}
