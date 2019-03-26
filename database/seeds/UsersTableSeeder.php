<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::insert([
        // 	'username' 	=> 'admin',
        // 	'password'	=> bcrypt('admin'),
        // 	'level'		=> 'admin',
        // 	'created_at'=> Carbon::now(),
        // 	'updated_at'=> Carbon::now(),
        // ]);

        $user = new User;
        $user->username = 'admin';
        $user->password = bcrypt('admin123');
        $user->level    = 'admin';
        $user->created_at= Carbon::now();
        $user->updated_at= Carbon::now();
        $user->save();
    }
}
