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
    //this is control name, cn is shorthand to reduce clutter in blade code
    public function cn()
    {
        return 'ans_'.$this->id;
    }
    public function type()
    {
        return $this->question->questiontype->name;
    }
    public function metas_list()
    {
        return Meta::where('question_id', '=', $this->question_id)->orderBy('value', 'asc')->lists('value', 'id');
    }
    public function set_new_value($value)
    {

    }
}

