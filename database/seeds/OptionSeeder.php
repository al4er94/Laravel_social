<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('options')->insert([
            'option_name' => 'nameGardening',
            'option_value' => 'Восход'
         ]);
         
    }
}
