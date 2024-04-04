<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  App\Model\RoomCategory::factory(10)->create();
        \App\Models\RoomCategory::factory(10)->create();
    }
}
