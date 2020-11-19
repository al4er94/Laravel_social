<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('OptionSeeder');
    }
}

class OptionSeeder extends Seeder
{
    public function run()
    {
         DB::table('options')->insert([
            'option_name' => 'nameGardening',
             'option_value' => 'Восход'
         ]);
         
    }
}
