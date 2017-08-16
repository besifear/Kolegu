<?php

namespace App\Http\Controllers\Traits;

use App\Achievement;
use App\UserAchievement;
use Illuminate\Support\Facades\Auth;

/**
 * trait RewardsAchievements
 * @package App\Http\Controllers\Traits
 */
trait RewardsAchievements{

    /**
     * @var App\Achievement;
     */
    private $achievement;
    /**
     * @var string
     */
    private $flashMessage = 'Pyetja juaj eshte shtruar!';
    /**
     * @var App\User
     */
    private $user;

    /**
     * Checks for achievements that will be rewarded when asking a question
     */
    public function checkForQuestionAchievements($user){
        $this->user = $user;
        $this->sumAchievementCheck('Question','Pyetja Pare', 1);
        $this->sumAchievementCheck('Question','Pyetja Peste', 5);
    }

    /**
     * @param $model           | The model from which the user needs to have a specific number to get the achievement.
     * @param $achievementName | Name of the achievement
     * @param $sum             | The sum of the instances of that model that must exist to get this achievement
     * [1] Checks if this achievement should be awarded
     * [2] Set's the flash message that will be shown to the user
     * [3] Set's in motion the process of rewarding an Achievement
     */
    public function sumAchievementCheck($model, $achievementName, $sum){
        $this->achievement = Achievement::findByName($achievementName);
        //[1]
        if($this->user->numberOf($model) == $sum && $this->notAchieved($this->achievement))
        {
            //[2]
            $this->setFlashMessage();
            //[3]
            $this->rewardAchievement();
        }
    }

    /**
     * @param $achievement | The achievement that we want to award
     * @return bool        | Returns true if the user doesn't have this achievement.
     * Checks if the user already has this achievement.
     */
    public function notAchieved($achievement){
        return ! UserAchievement::where([
            ['user_id', $this->user->id],
            ['achievement_id', $achievement->id ]
        ])->exists();
    }

    /**
     * Set's the flash message that will be shown to the user.
     */
    public function setFlashMessage(){
        $this->flashMessage = $this->achievement->description . ' Urime, ke fituar '
            . $this->achievement->reputationaward . ' reputation!';
    }

    /**
     * Calls the method to create an userAchievement.
     * Calls the method to reward the reputation to the user for getting this achievement.
     * Sets the achievement attribute to null.
     */
    public function rewardAchievement(){
        $this->giveAchievementToUser();
        $this->rewardUserForThisAchievement();
        $this->achievement = null;
    }

    /**
     * Creates an UserAchievement
     */
    public function giveAchievementToUser(){
        UserAchievement::create([
            'achievement_id' => $this->achievement->id,
            'user_id'        => $this->user->id
        ]);
    }

    /**
     * Adds the reputation reward from the achievement to the user's reputation.
     */
    public function rewardUserForThisAchievement(){
        $this->user->reputation += $this->achievement->reputationaward;
        $this->user->save();
    }
}