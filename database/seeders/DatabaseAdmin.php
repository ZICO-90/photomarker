<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class DatabaseAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'ahmed abdullah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("ahmed123"),
            'console' => 'admin seed',
        ]);
    }
}
