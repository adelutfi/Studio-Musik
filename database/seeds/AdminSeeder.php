<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
          'nama' => 'Administrator',
          'username' => 'admin',
          'password' => bcrypt(12345678)
        ]);
    }
}
