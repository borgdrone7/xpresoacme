<?php
/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/16/14
 * Time: 5:07 PM
 */

class Question extends Eloquent {
    public function questiontype()
    {
        return $this->belongsTo('Questiontype');
    }
    public function metas()
    {
        return $this->hasMany('Meta');
    }
}