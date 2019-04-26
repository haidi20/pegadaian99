<?php

namespace Tests\Browser\akad;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
