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
            $this->tableArray('Question1','Pyetja Pare', 'Ke shtruar pytjen e pare ne TregomShqip!', 'bronze.png',
                10, 'easy')
        );

        DB::table('achievements')->insert(
            $this->tableArray('Answer1','Pergjigjja Pare','Ke dhene pergjigjjen e pare ne TregomShqip!', 'bronze.png',
                10, 'easy')
        );

        DB::table('achievements')->insert(
            $this->tableArray('Question5','Pyetja Peste','Ke shtruar pese pyetje ne TregomShqip!', 'silver.png',
                25, 'medium')
        );

        DB::table('achievements')->insert(
            $this->tableArray('Answer5','Pergjigjja Peste','Ke dhene pese pergjigjje ne TregomShqip!', 'silver.png',
            25, 'medium')
        );
    }

    public function tableArray( $identifier, $name, $description, $icon, $reputationAward, $difficulty){
        return [
           'identifier'      => $identifier,
           'name'            => $name,
           'description'     => $description,
           'icon'            => $icon,
           'reputationaward' => $reputationAward,
           'difficulty'      => $difficulty,
        ];
    }
}
