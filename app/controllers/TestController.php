<?php

class TestController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $user = User::findFirstByUsername('rudybodo');

        print_r($user->UserRoles);

    }

}




