<?php

use App\Unit;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Unit::class, 10)->create(['status' => 'available']);
    }
}
