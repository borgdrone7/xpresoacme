<?php

class Useranswer extends Eloquent
{

    public $timestamps = false;

    public function question()
    {
        return $this->belongsTo('question');
    }

    public function meta()
    {
        return $this->belongsTo('meta');
    }

    public function answer()
    {
        if(!is_null($this->num)) return $this->num;
        if(!is_null($this->date)) return \Carbon\Carbon::createFromFormat('Y-m-d',$this->date)->toFormattedDateString();
        if(!is_null($this->text)) return $this->text;
        if(!is_null($this->meta)) return $this->meta->value;
    }
}

