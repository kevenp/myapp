<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);

        $user->name = 'kevin';
        $user->email = '517635148@qq.com';
        $user->password = bcrypt('k1w2p3');
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
