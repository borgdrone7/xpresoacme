<?php
/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/16/14
 * Time: 3:52 PM
 */
use Symfony\Component\Console\Tests\Descriptor\ObjectsProvider;

class AcmeController extends BaseController {
    public $title;
    public $title_small;
    public function __construct() {
        $this->title='Title not set';
        $this->title_small='small title not set';
    }
}