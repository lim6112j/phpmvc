<?php


namespace app\controllers;


use app\core\Controller;
use app\middlewares\LoginMiddleware;

class ActionController extends Controller
{

    /**
     * ActionController constructor.
     */
//    public function __construct()
//    {
//        $this->registerMiddleware(LoginMiddleware::getInstance());
//    }

    public function sms_auth()
    {
//        $login_array= $this->getMiddleWareData()[LoginMiddleware::class];
        include_once '../actions/SmsAuth.php';
    }
    public function member_join()
    {
        include_once '../actions/member_join.php';
    }
    public function affiliate_auth() {
        include_once '../actions/affiliate_auth.php';
    }

    public function affiliate_verify()
    {
        include_once '../actions/affiliate_verify.php';
    }

    public function email_async()
    {
        include_once '../actions/email_async.php';
    }
}