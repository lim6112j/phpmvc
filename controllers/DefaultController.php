<?php


namespace app\controllers;

use app\core\Controller;

/**
 * Class DefaultController
 * @package app\controllers
 */
class DefaultController extends Controller
{

    /**
     * @return mixed
     */
    public function home()
    {
        $params = [
            'data' => $this->getMiddleWareData()
        ];
        // $this->setLayout('default');
        return $this->render('home', $params);
    }
}