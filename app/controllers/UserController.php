<?php

class UserController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        if($this->session->has('auth-user') == false) {

            $this->flash->error('You dont have permission');
            return $this->response->redirect('session/login');
        }
    }

    public function indexAction()
    {

        $user = new Users();
        $session = 'auth-user';

        $this->view->user = $user->getUser($session);


    }


}
