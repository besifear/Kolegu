<?php

use Illuminate\Database\Seeder;

class AchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achievements')->insert(
            $this->tableArray('Pyetja Pare', 'Ke shtruar pytjen e pare ne TregomShqiip!',
                10, 'easy')
        );

        DB::table('achievements')->insert(
            $this->tableArray('Pergjigjja Pare','Ke dhene pergjigjjen e pare ne TregomShqiip!',
                10, 'easy')
        );

        DB::table('achievements')->insert(
            $this->tableArray('Pyetja Peste','Ke shtruar pese pyetje ne TregomShqiip!',
                25, 'medium')
        );

        DB::table('achievements')->insert(
            $this->tableArray('Pergjigjja Peste','Ke dhene pese pergjigjje ne TregomShqiip!',
            25, 'medium')
        );
    }

    public function tableArray($name, $description, $reputationAward, $difficulty){
        return [
            'name' => $name,
           'description' => $description,
           'reputationaward' => $reputationAward,
           'difficulty' => $difficulty,
        ];
    }
}
