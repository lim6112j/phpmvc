<?php


namespace app\controllers;

use app\core\Controller;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * SiteController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function home()
    {
        $params = [
            'name' => 'ben lim'
        ];
        return $this->render('home', $params);
    }
    /**
     * @return string
     */
    public function handleContact(): string
    {
        return 'handling submitted data';
    }
    public function contact(): string
    {
        return $this->render('contact');
    }
}