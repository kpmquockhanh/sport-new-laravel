<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::query()->create([
            'name' => 'Administrator',
            'email' => 'Admin@admin.com',
            'password' => bcrypt('adminadmin'),
        ]);
    }
}
