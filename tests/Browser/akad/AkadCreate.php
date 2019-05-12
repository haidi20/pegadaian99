<?php

namespace Tests\Browser\akad;

use Laravel\Dusk\Browser;
use Tests\Browser\Login;

class AkadCreate extends Login
{
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
                ->assertSee('JANGKA WAKTU AKAD')
                ->screenshot('UserCreateAkad')
                // user choose jangka waktu akad
                ->value('#nama_barang', 'Chevrolet')
                ->radio('jangka_waktu_akad', '30')
                ->radio('jenis_barang', 'kendaraan')
                // ->script('window.scrollTo(0, 400);')
                // ->radio('#id_15', '15')
                // ->clickLink('15 Hari')
                /**
                 * ?Click the submit button on the page
                 */
                // ->click('button[type="submit"]')
                ->screenshot('UserCreateAkad[FILL_FIELD]')
                // end ✗ radio not group
            ;
        });
    }
}
