<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\customers::class,50)->create();
    }
}
