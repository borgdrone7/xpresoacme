<?php

/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/15/14
 * Time: 8:58 PM
 */
class ADMIN_MENU
{
    const LANDING = "Landing";
    const QUESTIONS = "Questions";
    const ADD_QUESTION = "Questions add";
    const LIST_QUESTION = "Questions list";
    const STATS = "Stats";
    const USERLANDING = "User Landing";
}
class USER_MENU
{
    const LANDING = "Landing";
    const QUESTIONNAIRE = "Questionnaire";
    const OVERVIEW = "OVERVIEW";
    const RESET = "Reset questionnaire";
    const LOGIN = "Login";
    const LOGOUT = "Logout";
}

interface iMenu
{
    public function showMenu();
}
