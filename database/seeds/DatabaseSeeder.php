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
        $this->call(AchievementsTableSeeder::class);
        $this->call(EverythingTableSeeder::class);
        $this->call(QuestionGoodSeeder::class);
    }
}
