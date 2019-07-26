<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
// use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = 'admin';
        $user->password = bcrypt('admin123');
        $user->level    = 'admin';
        $user->save();
    }
}
