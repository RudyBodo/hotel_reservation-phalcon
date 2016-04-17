<?php

class TestController extends \Phalcon\Mvc\Controller
{

    private function _registerSession($admin)
    {
        $this->session->set(
            'auth-admin',
            array(
                'id' => $admin->id,
                'username' => $admin->username
            )
        );
    }

    public function indexAction()
    {
        $form = new testForm;
        if($this->request->isPost()) {

            if($form->isValid($this->request->getPost()) != false) {

                $checkin = $this->request->getPost('checkin');
                $checkout = $this->request->getPost('checkout');
            }
        }
        $this->view->form = $form;
    }

    public function loginAction()
    {
        $username = 'rudybodo';
        $password = 'rudybodo123fsfssa';

        $a = new Users();
        $a->checkUser($username);
        $a->checkHashUser($username, $password);
    }

    public function calcAction() {

        $c = new Calc();
        $this->view->disable();
        var_dump($c->add());

    }

    public function regAction() {

        //instance object models
        $users = new User();

        $username = 'sulish';
        $fullname = 'andi sulish ramdhani';
        $email = 'andisulish@gmail.com';
        $address = 'Jalan Melati';
        $phone_number = '081223997987';
        $password = 'qwerty123';

        $a = new Users();
        $a->add($users, $username, $fullname, $email, $address, $phone_number, $password);

        $users->UserRoles = $a->assignRoles($users->id, 2);

         if(!$users->save()) {

            $this->flash->error($users->getMessages());
        }

        else {

            $this->flash->success("Register was successfully");
        }
    }
}
