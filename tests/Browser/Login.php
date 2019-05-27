<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Login extends DuskTestCase
{
    /**
     * declare
     * #path_url-01
     * url.com/login
     */
    public function login_path()
    {
        return '/login';
    }
    /**
     * all-of-path-admin-panel
     */
    public function akad_baru_path()
    {
        return 'Akad Baru';
    }
    /**
     * A Dusk login test.
     * !write (at/symbol)test for long_function
     * @test
     * @return void
     * https://laracasts.com/discuss/channels/testing/dusk-chrome-driver-error-unknown-error-call-function-result-missing-value
     */
    public function user_login()
    {
        /**
         * Cabang path &
         * Database path &
         * Data Pembayaran &
         * Data Permodalan &
         * Biaya Operasional &
         * later's will use
         */
        $cabang_path = 'Cabang';
        $cabang_path_tambah = 'Tambah Cabang';
        $cabang_path_edit = 'Edit Cabang';
        $cabang_path_view = 'Data Cabang';

        $this->browse(function (Browser $browser) {
            // $input = [
            //     "username" => "admin"
            //     // ,
            //     // "sex" => "Male"
            // ];
            // #path_url-01 login_path()
            $browser->visit($this->login_path())
                // used to maximize the browser window:
                ->maximize()
                ->assertSee('Form Login')
                /**
                 * ?type()
                 * fill the field 'name', 'value'
                 */
                ->type('username', 'admin')
                ->type('password', 'admin123')
                /**
                 * ?press()
                 * click button with
                 * '.class', '#id' , 'name'
                 */
                ->press('.btn')
                ->assertSee('Data Cabang')
                // capture the task
                ->screenshot('UserAuthLogin')
                // end
            ;
        });
    }
}
