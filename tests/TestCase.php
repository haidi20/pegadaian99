<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    // public function link()
    // {
    //     return '/e-desa/public';
    // }

    // public function testFutureDashboard()
    // {
    //     $this->browse(function (Browser $browser){
    //         $link = $this->link() .'/dashboard';
    //         $browser->visit('')
    //                 // ->value('input[name=username]', 'haidi')
    //                 ->type('username', 'pegawai')
    //                 ->type('password', 'samarinda')
    //                 ->click('#login')
    //                 ->assertPathIs($link)
    //                 ->assertSee('Dashboard');
    //     });
    // }

    // public function testfutureDusun()
    // {
    //     $this->browse(function (Browser $browser){
    //         $link = $this->link().'/dusun';
    //         $browser->click('#master')
    //                 ->click('#dusun')
    //                 ->assertPathIs($link)
    //                 // .btn-primary is button create
    //                 ->click('.btn-primary')
    //                 ->assertPathIs($link.'/create')
    //                 ->assertSee('Form Dusun')
    //                 ->type('nama', 'sempaja')
    //                 ->type('alamat', 'jl. p.m.noor')
    //                 // .btn-primary is button save
    //                 ->click('.btn-primary')
    //                 ->assertPathIs($link)
    //                 ->click('.btn-green')
    //                 ->assertSee('Form Dusun')
    //                 ->type('nama', 'kesejahteraan')
    //                 ->type('alamat', 'jl. p.m.noor')
    //                 // .btn-primary is button save
    //                 ->click('.btn-primary')
    //                 ->assertPathIs($link);
    //     });
    // }
}
