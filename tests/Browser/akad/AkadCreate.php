<?php

namespace Tests\Browser\akad;

use Laravel\Dusk\Browser;
use Tests\Browser\cabang\CabangView;

class AkadCreate extends CabangView
{
    /**
     * A Dusk Create Akad
     * @test
     * @return void
     */
    public function user_create_akad()
    {
        // auth and view cabang
        $this->user_view_cabang();
        // then do this { multiple browse $first $sencond, but different path}
        $this->browse(function (Browser $browser) {
            $browser
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 */
                ->clickLink('Akad Baru')
                // don't forget to put path link after execute link/move/change address.url
                ->assertPathIs('/akad/create')
                ->assertSee('Akad Baru')
                /**
                 * ?Click the submit button on the page
                 */
                // ->click('button[type="submit"]')
                ->screenshot('UserCreateAkad')
                // end
            ;
        });
    }
}
