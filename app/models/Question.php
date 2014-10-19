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
        return count(DB::select('select * from useranswers where question_id=? and coalesce(meta_id, num, text, date) is not null', array($this->id)))>0;
        //in case non answere questions count too, this may be used
        //return (Useranswer::where("question_id", "=", $this->id)->count())>0;
    }
}