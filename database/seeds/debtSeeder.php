<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class debtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\debts::class,100)->create();
    }
}
