<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class movementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\movements::class,50)->create();
    }
}
