<?php

namespace Tests\Browser\akad;

use Laravel\Dusk\Browser;
use Tests\Browser\Login;

class AkadCreate extends Login
{
    public function radio_click()
    {
        /**
         * Scrolls page to a specific element.
         *
         * Leaves a buffer at the top to account for a fixed header.
         */
        Browser::macro('scrollTo', function ($id) {
            $this->script("document.getElementById('$id').scrollIntoView()");
            $this->script('window.scroll(0, window.scrollY - 50)');

            return $this;
        });
    }
    /**
     * A Dusk Create Akad
     * @test
     * @return void
     */
    public function user_create_akad()
    {
        // auth and view cabang
        $this->user_login();

        // then do this { multiple browse $first $sencond, but different path}
        $this->browse(function (Browser $browser) {
            $browser
                ->assertPathIs('/cabang')
                ->assertSee('Data Cabang')
                /**
                 * ?clickLink('param')
                 * the function for this
                 * <a href='x'> param </a>
                 */
                ->clickLink('Akad Baru')
                // don't forget to put path link after execute link/move/change address.url
                ->assertPathIs('/akad/create')
                ->assertSee('Akad Baru')
                ->screenshot('UserViewCreateAkad')
                // user fillup any value...
                /**
                 * user select option jangka waktu akad
                 * select('$field','$value')
                 */
                ->select('jangka_waktu_akad', '30')

                ->value('#nama_barang', 'Chevrolet')
                /**
                 * radio select
                 * radio ('$field','$value')
                 */
                /**
                ->script("document.getElementById('.jenis_barang').scrollIntoView()")
                ->script('window.scroll(0, window.scrollY - 50)')
                ->waitFor('#id_jenis_barang')
                ->resize(1920, 3000)
                ->click('#id_jenis_barang', 'kendaraan')
                ->radio('#id_jenis_barang', 'kendaraan')
                ->script('window.scrollTo(0, 400);')
                ->radio('#id_15', '15')
                ->clickLink('15 Hari')
                /**
                 *
                 * ?Click the submit button on the page
                 */
                // ->click('button[type="submit"]')
                ->screenshot('UserCreateAkad[FILL_FIELD]')
                // end ✗ radio not group
            ;
        });
    }
}
