<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Toy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToyMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Toy::all()->each(function(Toy $toy){
            $randomFields= Material::all()->random( rand(0, 5) )->pluck('id');
            $toy->materials()->attach($randomFields);
            $toy->save();
        });
    }
}
