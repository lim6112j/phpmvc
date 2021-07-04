<?php


namespace app\controllers;

use app\core\Controller;
use app\core\Request;

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
    public function handleContact(Request $request): string
    {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        exit;
        return 'handling submitted data';
    }
    public function contact(): string
    {
        return $this->render('contact');
    }
}