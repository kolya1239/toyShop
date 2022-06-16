<?php

namespace Database\Seeders;

use App\Models\Toy;
use App\Models\Type;
use Illuminate\Database\Seeder;

class ToySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Toy::factory(50)->make()->each(function (Toy $toy){
            $toy->type()->associate(Type::inRandomOrder()->first());
            $toy->save();
        });
    }
}
