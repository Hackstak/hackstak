<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::insert([
          'first' => 'root', 'last' => 'root', 'email' => 'test@gmail.com', 'phone' => '5555555555',
          'username' => 'root', 'password' => bcrypt('secret'), 'admin' => '1', 'birthday' => Carbon::now()->format('Y-m-d'),
          'school_year' => 'freshman', 'shirt_size' => 'L', 'major' => 'Basket Weaving', 'gender' => 'other', 'school' => 'test',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s')

          ]);
    }
}
