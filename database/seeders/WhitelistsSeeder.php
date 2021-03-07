<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WhitelistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Whitelists::factory(10)->create();
    }
}
