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


    }

    public function reserveAction($Id) {

        //check existing hotel
        $hotels = Hotels::findFirstById($Id);
        if (!$hotels) {

            $this->flash->error('Hotel not exist');
            break;
        }

        if($this->request->isPost()) {


        }


    }

}

