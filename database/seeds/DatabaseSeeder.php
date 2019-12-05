<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//解除模型保护
    	Model::unguard();

        $this->call(UsersTableSeeder::class);

        //加入模型保护
        Model::reguard();
    }
}
