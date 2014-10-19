<?php
/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/16/14
 * Time: 5:07 PM
 */

class Question extends Eloquent {
    public $timestamps = false;
    public function questiontype()
    {
        return $this->belongsTo('Questiontype');
    }
    public function metas()
    {
        return $this->hasMany('Meta');
    }

    public function locked()
    {
        return (Useranswer::where("question_id", "=", $this->id)->count())>0;
    }
}