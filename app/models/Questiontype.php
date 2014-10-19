<?php
/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/16/14
 * Time: 5:07 PM
 */
class QUESTION_TYPE
{
    const TEXT = "Text";
    const NUMBER = "Number";
    const DATE = "Date";
    const RADIO = "Radio";
    const DROPDOWN = "Drop down";
}

class Questiontype extends Eloquent {
    public $timestamps = false;
}